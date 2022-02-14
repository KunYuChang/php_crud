<?php

include 'connect.php';

$id = $_GET['deleteid'];

$sql = "DELETE FROM user WHERE id=$id";

$result = mysqli_query($con, $sql);

if ($result) {
    // echo "delete succesfully";
    header('location:read.php');
} else {
    die(mysqli_error($con));
}
