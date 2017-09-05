<?php

function generate_csrf_token() {
  $token = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz9876543210ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
  $_SESSION['csrf_token'] = $token;

  return $token;
}