<?php
	include 'connect.php';
	session_start();
	if(!isset($_SESSION["username"]))
		header("location:index.php");
    $stmt=$pdo->prepare("select * from `quizes`");
	$stmt->execute();
	$r=$stmt->fetchAll(PDO::FETCH_ASSOC);
	echo '<table style="font-weight: bold;"><tr><th>Quiz ID</th><th>Name</th><th>Users</th><th>Subject</th><th>Questions</th><th>Start Time</th><th>End Time</th><th>Time(in Mins)</th><th>Available</th><th>Scores</th></tr>';
	foreach ($r as $row) 
	{
		echo '<tr><td>'.$row["id"].'</td><td>'.$row["name"].'</td><td>'.$row["NumUsers"].'</td><td>'.$row["sub"].'</td><td>'.$row["ques"].'</td><td>'.$row["start"].'</td><td>'.$row["end"].'</td>';
		if($row["type"]=="t")
		echo	'<td>'.$row["time"].'</td>';
		else
		echo    '<td>No Limit</td>';
		if($row["avail"]=="0")
			echo '<td><a id="'.$row["id"].'start" class="waves-effect waves-light btn" onClick="startquiz('.$row["id"].')">Start</a><a style="display:none;" id="'.$row["id"].'stop" class="waves-effect waves-light red btn" onClick="stopquiz('.$row["id"].')">Stop</a></td>';
		else if($row["avail"]=="1")
			echo '<td><a style="display:none;" id="'.$row["id"].'start" class="waves-effect waves-light btn" onClick="startquiz('.$row["id"].')">Start</a><a  id="'.$row["id"].'stop" class="waves-effect waves-light red btn" onClick="stopquiz('.$row["id"].')">Stop</a></td>';
		echo '<td><a href="scores.php?qid='.$row["id"].'" class="waves-effect waves-light btn blue">SCORES</a></td></tr>';
	}

    echo '</table>
  ';