<?php
session_start();

$text = $_GET['txt'];

$servername = 'localhost';
$dbname = 'my_database';
$username = 'root';
$password = '';

$pdo = new PDO('mysql:host=localhost;dbname=my_database', 'root', '');

$query = 'SELECT * FROM task_10 WHERE text=:txt';
$statement = $pdo->prepare($query);
$statement->execute(['txt'=>$text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($task)){

	$_SESSION['danger'] = 
	'<div class="alert alert-danger fade show" role="alert">
	Подобная запись уже имеется в базе               
	</div>';

} else {
	$query = 'INSERT into task_10 VALUES (null, :txt)';
    $statement = $pdo->prepare($query);
    $statement -> execute(['txt'=>$text]);
var_dump($statement); die;
    $_SESSION['success'] = '<div class="alert alert-success fade show" role="alert">
                                       Успешно сохранено.
                                    </div>';

}



header('Location: /task_11.php')
?>
