<?php
session_start();

$servername = "localhost";
$dbname = "my_database";
$username = 'root';
$password = '';


$pdo = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

$_SESSION['text'] = $_POST['text'];




///var_dump($_SESSION['text']);




header('Location: task_13.php')


?>