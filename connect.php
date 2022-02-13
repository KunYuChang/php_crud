<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

$con = mysqli_connect('localhost', 'root', 'password', 'php_crud');

if (mysqli_connect_errno()) {
    echo 'Failed to connect to MySQL' . mysqli_connect_errno();
}
