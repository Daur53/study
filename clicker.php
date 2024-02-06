<?php
session_start();



$num = $_SESSION['count'];
if($_POST['type'] == 1){
if($_SESSION['count'] >= 1){

	$_SESSION['count'] = $num + 1;

}else{
	$_SESSION['count'] = 1;
}}else{
	unset($_SESSION['count']);
	$_SESSION['count'] = 0;
}

///var_dump($_POST['type']); die;

header('Location: task_14.php')
?>