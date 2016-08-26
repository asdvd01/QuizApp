<?php
include 'connect.php';
session_start();
 $stmt=$pdo->prepare('UPDATE `quizes` SET `avail` = ? WHERE `id` = ?');
 if(isset($_SESSION["username"])&&isset($_POST["id"])&&isset($_POST["avail"]))
 {
 	$id=(int)$_POST["id"];
 	$avail=(int)$_POST["avail"];
 	if($stmt->execute(array($avail,$id)))
 		echo "started";
 	else 
 		echo "stopped";
 }
?>