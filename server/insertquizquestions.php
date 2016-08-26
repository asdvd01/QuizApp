<?php
include 'connect.php';
session_start();
if(!isset($_SESSION["username"]))
	header("location:login.php");
if(isset($_POST["qno"])&&isset($_POST["start"])&&isset($_POST["end"])&&isset($_POST["ques"])&&isset($_POST["op1"])&&isset($_POST["op2"])&&isset($_POST["op3"])&&isset($_POST["op4"])&&isset($_POST["ans"]))
{
	$qno=(int)$_POST["qno"];
	 $start=$_POST["start"];
	 $end=$_POST["end"];
	if(isset($_POST["time"]))
	{
		$time=(int)$_POST["time"];
		$stmt=$pdo->prepare('UPDATE `quizes` SET `time`= ?, `start`=?,`end`=? WHERE `id`= ?');
		$stmt->execute(array($time,$start,$end,$qno));
		//if(!$stmt)
			
	}
	
	$ques=$_POST["ques"];
	$ans=$_POST["ans"];
	$op1=$_POST["op1"];
	$op2=$_POST["op2"];
	$op3=$_POST["op3"];
	$op4=$_POST["op4"];
	$table="qa_".$qno;
	$stmt=$pdo->prepare('INSERT INTO '.$table.'(`q`, `a`, `op1`, `op2`, `op3`, `op4`) VALUES (?,?,?,?,?,?)');
	for($i=0;$i<count($ques);$i++)
	{
		$stmt->execute(array($ques[$i],$ans[$i]-1,$op1[$i],$op2[$i],$op3[$i],$op4[$i]));
	}
	header("location:createquiz.php");
}
?>