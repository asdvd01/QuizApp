<?php
	/*$con = mysql_connect("localhost","root","");
    if (!$con)
    {
		die('Could not connect: ' . mysql_error());
    }

	mysql_select_db("db_quiz", $con);*/
	//$v1=$_REQUEST['roll'];
	//$v2=$_REQUEST['name'];
	//$v3=$_REQUEST['subject_code'];
	//$v1='111';
	
	//echo $v1;
 include 'connect.php';
		$stmt=$pdo->prepare('SELECT * from qa_questions');
		$stmt->execute();
		$r=$stmt->fetchAll(PDO::FETCH_ASSOC);
		$params['Questions'] = array();
		$temp=null;
	foreach($r as $row)
        {
			$temp['Question'] = $row['question'];
			$temp['CorrectAnswer'] = (int)$row['answer'];
			
			$temp['Answers'] = array();
			
			$ans['Answer'] = $row['option1']; 
			$temp['Answers'][] = $ans;
			
			$ans['Answer'] = $row['option2']; 
			$temp['Answers'][] = $ans;
			
			$ans['Answer'] = $row['option3']; 
			$temp['Answers'][] = $ans;
			
			$ans['Answer'] = $row['option4']; 
			$temp['Answers'][] = $ans;
			
 			/*$temp['Answers'][] = $row['option2'];
			$temp['Answers'][] = $row['option3'];
			$temp['Answers'][] = $row['option4'];*/
			
			
			$params['Questions'][] = $temp;
			/*$temp=(string)$j;
			$r[$temp]=$row['courseID'];
			$j=$j+1;
            $temp=(string)$j;
			$r[$temp]=$row['coursename'];
			$j=$j+1;
            $check="true";*/
            // print(json_encode($r));
        }
		
		if(!count($r)==0)
        {            
			$r["status"]="true";
			
            print(json_encode($params));     
        }
        else
        {
			$r["status"]="false";
            print(json_encode($r));
            // die('Could not connect: ' . mysql_error());    
        } 
		

	$pdo=null;
               
?>	