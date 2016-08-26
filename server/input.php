<?php
	/*$con = mysql_connect("localhost","root","");
    if (!$con)
    {
		die('Could not connect: ' . mysql_error());
    }

	mysql_select_db("db_quiz", $con);
	*/
	include 'connect.php';
	$v1=(string)$_REQUEST['roll'];
	//$v2=(string)$_REQUEST['name'];
	$v3=(int)$_REQUEST['quiz_id'];
	//$v1='111';
	$stmt=$pdo->prepare("select `name` from `roll` where `roll` = ?");
	$stmt->execute(array($v1));
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	
	//echo $v1;
	/*if($v2==NULL)
	{
		$r["re"]="No Name Input";
        print(json_encode($r));
       // die('Could not connect: ' . mysql_error());
    }*/
	if($v1==NULL)
	{
		$a["status"]="No Roll Input";
		$b["result"][]=$a;
        print(json_encode($b));
        //die('Could not connect: ' . mysql_error());
    }
	else if($v3==NULL)
	{
		$a["status"]="No Quiz Id Input";
        $b["result"][]=$a;
        print(json_encode($b));
        //die('Could not connect: ' . mysql_error());
    }
    else if(count($result)<=0)
    {
    	$a["status"]="Enter Correct Roll Number";
        $b["result"][]=$a;
        print(json_encode($b));
    }
	else
	{    
		$v2=(string)$result[0]["name"];
		$id=(int)$v3;
		$stmt=$pdo->prepare("select start,end,avail,time from quizes where `id`=?");
		$stmt->execute(array($id));
		$r=$stmt->fetchAll(PDO::FETCH_ASSOC);
		$date=date("Y-m-d H:i:s");
		$avail=(int)$r[0]["avail"];
		$time=(int)$r[0]["time"];
		//echo $r[0]["start"].$date.$r[0]["end"];
		if(($r[0]["start"]<=$date&&$r[0]["end"]>=$date)||$avail==1)
		{
			
			$tabname='scores_'.$id;
			$stmt=$pdo->prepare('SELECT * FROM `'.$tabname.'` WHERE `roll`=?');
			$stmt->execute(array($v1));
			$r=$stmt->fetchAll(PDO::FETCH_ASSOC);
			$cnt=count($r);
			if($cnt==0)
			{
				$stmt=$pdo->prepare('INSERT INTO '.$tabname.' (`name`,`roll`,`start`) VALUES (?,?,?)');
				$stmt->execute(array($v2,$v1,time()));
				$stmt=$pdo->prepare("UPDATE `quizes` SET `NumUsers`=`NumUsers`+1 WHERE `id`=?");
				$stmt->execute(array($id));
				$tabname='qa_'.$id;
				$stmt=$pdo->prepare("select * from ".$tabname);
				$stmt->execute();
				$r=$stmt->fetchAll(PDO::FETCH_ASSOC);
				//print(json_encode($r));
				$params['Questions'] = array();
				$temp=null;
				foreach($r as $row)
		        {
					$temp['Question'] = $row['q'];
					$temp['CorrectAnswer'] = (int)$row['a'];
					
					$temp['Answers'] = array();
					
					$ans['Answer'] = $row['op1']; 
					$temp['Answers'][] = $ans;
					
					$ans['Answer'] = $row['op2']; 
					$temp['Answers'][] = $ans;
					
					$ans['Answer'] = $row['op3']; 
					$temp['Answers'][] = $ans;
					
					$ans['Answer'] = $row['op4']; 
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
				$x['result'][][]=$params;
				$t['time']=$time;
				$x['result'][]=$t;
				if(!count($r)==0)
		        {            
					$y["status"]="true";
					$x["result"][]=$y;
		            print(json_encode($x));   
				//print(json_encode($params));  
		        }
			}
			else
			{
				$s["status"]='You have already given this quiz';
				$x["result"][]=$s;
				print(json_encode($x));
			}
		}
        else
        {
			
			$s["status"]='Quiz not availaible at this time';
			$x["result"][]=$s;
			print(json_encode($x));
			
            
            // die('Could not connect: ' . mysql_error());    
        } 
		//print(json_encode($r));

	$pdo=null;
	}
	//mysql_close($con);
               
?>	