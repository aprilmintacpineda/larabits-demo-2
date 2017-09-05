<?php

/**
 * RouteServiceProvider
 *
 * stores all the routes
 */

class Route {
  protected static $get_routes = [],
                   $post_routes = [];

  public static function get($path, $controller) {
    self::$get_routes[$path] = [
      'controller' => $controller,
      'method' => 'get'
    ];
  }

  public static function post($path, $controller) {
    self::$post_routes[$path] = [
      'controller' => $controller,
      'method' => 'post'
    ];
  }

  public static function getController($path, $post) {
    if($post) {
      if(array_key_exists($path, self::$post_routes)) {
        return self::$post_routes[$path];
      } else if(array_key_exists('404', self::$post_routes)) {
        return self::$post_routes['404'];
      }
    } else {
      if(array_key_exists($path, self::$get_routes)) {
        return self::$get_routes[$path];
      } else if(array_key_exists('404', self::$get_routes)) {
        return self::$get_routes['404'];
      }
    }

    throw new RouteNotFoundException;
  }
}