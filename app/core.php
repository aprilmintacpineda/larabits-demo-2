<?php
ob_start();
session_start();

require __dir__ . '/autoload.php';
require __dir__ . '/../routes/web.php';
require __dir__ . '/helpers/index.php';

Request::serve(!empty($_GET['path']) ? trim($_GET['path'], '/') : '/');

ob_end_flush();