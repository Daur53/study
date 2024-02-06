<?php
$servername='localhost';
$dbname='my_database';
$username='root';
$pass='';

$id = $_GET['id'];

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);

$query = "SELECT * FROM task_17 WHERE id=:id";

$stmt = $pdo -> prepare($query);
$stmt -> bindparam(':id', $id);
$stmt ->execute();
$img = $stmt -> fetchAll(PDO::FETCH_ASSOC);


$filename = "img/demo/gallery/".$img['name'];

if(file_exists($filename)){
	unlink($filename);
}else{
	echo "File not found";
}

$delete = "DELETE FROM task_17 WHERE id=:id";

$stmt = $pdo -> prepare($delete);
$stmt -> bindparam('id', $id);
$stmt -> execute();




header('Location: task_18.php')




?>