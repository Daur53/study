<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$hashed_pass = password_hash($password, PASSWORD_DEFAULT);




$servername = 'localhost';
$dbname = 'my_database';
$username = 'root';
$pass = '';

$pdo = new PDO('mysql:host=localhost;dbname=my_database', 'root', '');

$query = 'SELECT * FROM task_15 WHERE email=:email ';
$statement = $pdo->prepare($query);
$statement->execute(['email'=>$email]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($task)){

	$_SESSION['danger'] = 
	'<div class="alert alert-danger fade show" role="alert">
                                        Почта уже имеется
                                    </div>';

} else {
	$query = 'INSERT into task_15 VALUES (null, :email, :password)';
    $statement = $pdo->prepare($query);
    $statement -> execute(['email'=>$email, 'password' => $hashed_pass]);


    $_SESSION['success'] = '<div class="alert alert-success fade show" role="alert">
                                       Вы зарегистрированы.
                                    </div>';

}



header('Location: /task_15_reg.php')




?>