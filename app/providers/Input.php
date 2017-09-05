<?php

class Input {
  public static function all() {
    return $_POST;
  }

  public static function get($index) {
    return $_POST[$index];
  }
}