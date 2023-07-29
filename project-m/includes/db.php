<?php
$conn = mysqli_connect('localhost','root','','muhasabe');

if(!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}
?>