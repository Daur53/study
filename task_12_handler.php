<?php
session_start();

$email = $_POST['email'];
$pass = $_POST['password'];

$servername = 'localhost';
$dbname = 'my_database';
$username = 'root';
$password = '';

$pdo = new PDO('mysql:host=localhost;dbname=my_database',"root","");


$query = 'SELECT * FROM task_12 WHERE email = :email';
$statement = $pdo->prepare($query);
$statement->execute(['email'=>$email]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($task)){
		$_SESSION['alert-danger'] = 'Этот эл адрес уже занят другим пользователем';
		

}else{

$query = 'INSERT INTO `task_12`(`email`, `password`) VALUES (:email, :password)';
$stmt = $pdo->prepare($query);
$stmt -> execute(['email' => $email, 'password' => $pass]);
$_SESSION['alert-success'] = 'Вы успешно зарегистрированы';
}

//var_dump($task); die;



//var_dump($stmt); die;

header('Location: task_12.php')

?>