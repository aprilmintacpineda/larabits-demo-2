<?php

class AboutController {
  public function index() {
    View::render('about', [
      'message' => 'This is the $message variable in about.'
    ]);
  }
}