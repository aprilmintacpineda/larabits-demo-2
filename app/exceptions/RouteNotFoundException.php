<?php

class RouteNotFoundException extends Exception {
  public function __construct() {
    parent::__construct('The route you are looking for was not defined.', 404, null);
  }
}