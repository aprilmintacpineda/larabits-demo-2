<?php

if(!isset($_GET['path'])) {
  $_GET['path'] = trim($_SERVER['REQUEST_URI'], '/');
}

require __dir__ . '/app/core.php';