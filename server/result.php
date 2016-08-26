<?php
	/*$con = mysql_connect("localhost","root","");
    if (!$con)
    {
		die('Could not connect: ' . mysql_error());
    }

	mysql_select_db("db_quiz", $con);*/
	include 'connect.php';
	$v1=(string)$_REQUEST['roll'];
	$v2=(int)$_REQUEST['marks_obtained'];
	$v3=(int)$_REQUEST['quiz_id'];
	//$v3=$_REQUEST['subject_code'];
	//$v1='111';
	;
	if($v1==NULL)
	{
		$r["re"]="Enter the Roll";
        print(json_encode($r));
       // die('Could not connect: ' . mysql_error());
    }
	else if(!isset($v2))
	{
		$r["re"]="Score not found";
        print(json_encode($r));
        //die('Could not connect: ' . mysql_error());
	}
	else
	{   
		$id=(int)$v3;
		$stmt=$pdo->prepare("select start,end,avail from quizes where `id`=?");
		$stmt->execute(array($id));
		$r=$stmt->fetchAll(PDO::FETCH_ASSOC);
		$date=date("Y-m-d H:i:s");
		$avail=(int)$r[0]["avail"];
		if(($r[0]["start"]<=$date&&$r[0]["end"]>=$date)||$avail==1)
		{
		$stmt=$pdo->prepare("UPDATE `quizes` SET `NumUsers`=`NumUsers`-1 WHERE `id`=?");
		$stmt->execute(array($id));
		$tabname="scores_".$id;
		//$i=mysql_query("INSERT INTO qa_result (roll, marks_obtained) VALUES ('$v1', '$v2')",$con);
		$stmt = $pdo->prepare ("UPDATE ".$tabname." SET `score`=?,`end`=? WHERE `roll`=?");
		$i=$stmt->execute(array($v2,time(),$v1));
        if($i)
        {
			$s["re"]="true";
            print(json_encode($s));
            // die('Could not connect: ' . mysql_error());    
        } 
		else
		{
			$s["re"]="ERROR";
            print(json_encode($s)); 
			
		}
		}
		else
		{
			$s["re"]="Quiz not Availaible Time Over";
            print(json_encode($s)); 
		}
	}
	$pdo=null;
               
?>	