<?php
include 'connect.php';
session_start();
if(!isset($_SESSION["username"]))
	header("location:index.php");
if(isset($_SESSION["perm"])&& $_SESSION["perm"]=="a")
{
	if(isset($_POST["uname"])&&isset($_POST["fname"])&&isset($_POST["pass"]))
	{
		$u=(string)($_POST["uname"]);
		$f=(string)($_POST["fname"]);
		$p=(string)($_POST["pass"]);
		$p=sha1($p);
		$x="n";
		$stmt=$pdo->prepare("INSERT INTO `login`(`userid`, `usernm`, `pass`, `previlege`) VALUES (?,?,?,?)");
		if($stmt->execute(array($u,$f,$p,$x)))
		echo "Sucessfully Added User";
		else
		echo "Error";
	}
	else
	{
		echo "Error in Input";
	}
	
}
else header("location:index.php");
?>