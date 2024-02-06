<?php 

session_start();

$email = $_POST['email'];
$password = $_POST['password'];




$servername = 'localhost';
$dbname = 'my_database';
$username = 'root';
$pass = '';

$pdo = new PDO('mysql:host=localhost;dbname=my_database', 'root', '');

$query = 'SELECT * FROM task_15 WHERE email=:email';
$statement = $pdo->prepare($query);
$statement->execute(['email'=>$email]);
$task = $statement->fetch(PDO::FETCH_ASSOC);



$check_result = password_verify($password, $task['password']);


///var_dump($check_result);die;

if(!empty($task)){
	if($check_result===true){

	
    
    $_SESSION['user'] = ['email' => $task['email'], 'id' => $task['id']];
    
    header('Location: /task_16.php');

} else {
	$_SESSION['danger'] = 
	'<div class="alert alert-danger fade show" role="alert">
                                        Неверный пароль!
                                    </div>';
   header('Location: /task_15.php');


}}else{

	$_SESSION['danger'] = 
	'<div class="alert alert-danger fade show" role="alert">
                                        Такого пользователя не существует.
                                    </div>';
    header('Location: /task_15.php');
}







?>