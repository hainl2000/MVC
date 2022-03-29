<?php
require_once('connectDB.php');

if (isset($_GET['controller'])) {
  $controller = $_GET['controller'];
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {
    $action = 'index';
  }
} else {
  $controller = 'product';
  $action = 'show';
}
require_once('./Application/Routes/route.php');