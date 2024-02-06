<?php

$numbers = [1,2,3,4,5];

$x='asdоо с';

 foreach($numbers as $number){
echo $number[$x];

 }

 exit;

var_dump($_FILES['file']);

exit;
for($i = 0; $i < (count($_FILES['file']['name'])); $i++){

	upload_file($_FILES['file']['name'][$i], $_FILES['file']['tmp_name'][$i]);
}


function upload_file($file, $file_tmp) {
$filename = uniqid().'.'.end(explode(".", $file));

$dir = "img/demo/gallery/".$filename;
move_uploaded_file($file_tmp, $dir);
$servername = "localhost";
$dbname = "my_database";
$username = "root";
$password = "";
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$query = 'INSERT INTO task_17 VALUES (NULL, :file)';

$stmt = $pdo -> prepare($query);
$stmt -> execute(['file' => $filename]);

}

;

header('Location: task_19.php')








?>