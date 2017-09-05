<?php

class HomeController {
  public function index() {
    View::render('home', [
      'message' => 'This is the $message variable in home.'
    ]);
  }
}