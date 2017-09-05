<?php

require 'quotes_assoc_array.php';

class Artisan {
  public static function server($doc_root) {
    echo "Development server up and running on localhost:8000\n";
    echo "Press Ctrl-C to quit\n";
    exec('php -S localhost:8000 -t ' . $doc_root);
  }

  public static function inspire() {
    echo "\n" . get_quote() . "\n";
  }
}