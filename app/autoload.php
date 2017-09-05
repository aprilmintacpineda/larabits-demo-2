<?php

spl_autoload_register(function($class) {
  $paths = [
    'providers' => __dir__ . '/providers/' . $class . '.php',
    'controllers' => __dir__ . '/../controllers/' . $class . '.php',
    'http' => __dir__ . '/http/' . $class . '.php',
    'exceptions' => __dir__ . '/exceptions/' . $class . '.php',
    'console' => __dir__ . '/console/' . $class . '.php'
  ];

  foreach($paths as $key => $value) {
    if(file_exists($value)) {
      require $value;
    }
  }
});