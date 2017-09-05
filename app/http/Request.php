<?php

class Request {
  public static function serve($path = '/') {
    try {
      $route = Route::getController($path, !empty($_POST));
      if(!preg_match('/(^[a-zA-Z]+@{1}[a-zA-Z]+$)/', $route['controller'])) {
        throw new MalformedParameterException('Route::'. $route['method'] . ' expects parameter 2 to follow the pattern ControllerClassName@methodName.');
      }

      $target_controller = explode('@', $route['controller']);
      $controller = $target_controller[0];
      $method = $target_controller[1];

      $controller = new $controller();
      return $controller->$method();
    } catch(Exception $e) {
      View::error($e);
    }
  }
}