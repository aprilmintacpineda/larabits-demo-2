<?php

class MalformedParameterException extends Exception {
  public function __construct($message = 'This is the default message for this exception. If you are seeing this, please open an issue and paste the stack trace.') {
    parent::__construct($message, 1001, null);
  }
}