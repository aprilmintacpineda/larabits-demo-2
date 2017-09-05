<?php

/**
 * RouteServiceProvider
 *
 * stores all the routes
 */

class Route {
  protected static $route_collection = [];

  public static function get($path, $controller) {
    self::$route_collection[$path] = [
      'controller' => $controller,
      'method' => 'get'
    ];
  }

  public static function post($path, $controller) {
    self::$route_collection[$path] = [
      'controller' => $controller,
      'method' => 'post'
    ];
  }

  public static function getRoutes() {
    return self::$route_collection;
  }

  public static function getController($path) {
    if(array_key_exists($path, self::$route_collection)) {
      return self::$route_collection[$path];
    } else if(array_key_exists('404', self::$route_collection)) {
      return self::$route_collection['404'];
    }

    throw new RouteNotFoundException;
  }
}