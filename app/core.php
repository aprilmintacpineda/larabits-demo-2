<?php
ob_start();

require __dir__ . '/autoload.php';
require __dir__ . '/../routes/web.php';

Request::serve(!empty($_GET['path']) ? $_GET['path'] : '/');

ob_end_flush();