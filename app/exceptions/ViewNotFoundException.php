<?php

class ViewNotFoundException extends Exception {
  public function __construct() {
    parent::__construct('The view you specified was not found in the views directory. Make sure that all your views have .php extension and your spelling is correct.', 1001, null);
  }
}