<?php
$server ="localhost";
$username ="root";
$password ="";
$dbname="clothify";

$con= mysqli_connect($server , $username , $password , $dbname);
if (!$con) {
    die("connection lost". mysqli_connect_error());
}
// echo "success, connected to DB"
?>