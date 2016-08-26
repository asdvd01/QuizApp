<?php
include 'connect.php';
session_start();
if(!isset($_SESSION["username"]))
	header("location:index.php");
if(isset($_SESSION["perm"])&& $_SESSION["perm"]=="a")
	$flag="true";
else
	$flag="false";
?>

<html>
	<head>
		<title>DashBoard</title>
		<link rel="shortcut icon" type="image/png" href="images/nitrlogo3.png"/>
      	<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection">
      	<link type="text/css" rel="stylesheet" href="font/icon.css"  >
      	<link type="text/css" rel="stylesheet" href="css/dt.css"  >      	
      	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    </head>

    <body>
    	<style>
    
    	</style>
    	
    	<div class="container">
      <!--Import jQuery before materialize.js-->

      <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/moment.js"></script>
      <script type="text/javascript" src="js/dt.js"></script>
      <script>
      $( document ).ready(function() {
      	  $('#end').bootstrapMaterialDatePicker({ weekStart : 0 ,format : 'YYYY-MM-DD HH:mm'});
		 $('#start').bootstrapMaterialDatePicker({ weekStart : 0 ,format : 'YYYY-MM-DD HH:mm'}).on('change', function(e, date)
		 {
			$('#end').bootstrapMaterialDatePicker('setMinDate', date);
		 });
		$('.materialize-textarea').trigger('autoresize');
		$('select').material_select();

      });
      </script>
	 <script type="text/javascript">
	 function startquiz(id)
	 {	  
	 	var x="#"+id+"start";
	 	var y="#"+id+"stop";
	 	$.ajax({
            url: 'quizstart.php',
            type: 'POST',
            data:{"id":id,"avail":1},
            success: function(data)
            {     
            	
            		$(x).hide();
            		$(y).show();
            }
        });
	}
	function stopquiz(id)
	 {	  
	 	var x="#"+id+"start";
	 	var y="#"+id+"stop";
	 	$.ajax({
            url: 'quizstart.php',
            type: 'POST',
            data:{"id":id,"avail":0},
            success: function(data)
            {    
            	$(y).hide();
            	$(x).show();
            	
            }
        });
	}
	function submitadd()
	 {	  
	 	var x=$("#uname").val();
	 	var y=$("#fname").val();
	 	var z=$("#pass").val();
	 	$.ajax({
            url: 'adduser.php',
            type: 'POST',
            data:{"uname":x,"fname":y,"pass":z},
            success: function(data)
            {    
            	//$(".error").html(data);
            	Materialize.toast(data, 4000);
            	
            }
        });
	 }
        function refresh() {
   			$.ajax({
            url: 'quizzes.php',
            type: 'POST',
            data:{},
            success: function(data)
            {    
            	//$(".error").html(data);
            	//alert(data);
            	$("#test2").html(data);
            	
            }
        });
		}
		$( document ).ready(function() {
   			setInterval(refresh, 3000);
		});	
	
	 </script>
	<?php
	if(!(isset($_POST["nquiz"])&&isset($_POST["sub"])&&isset($_POST["nq"])&&isset($_POST["tquiz"])))
	{
	echo'<div class="row">
    <div class="col s9">
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#test1">Create Quiz</a></li>
        <li class="tab col s3"><a  href="#test2">Available Quiz</a></li>';
        if($flag=="true")
        {
        echo '<li class="tab col s3"><a  href="#test3">Add User</a></li>';
    	}
        echo '
      </ul>
    </div>
    <div class="col s2">';
    echo '
     <!-- Dropdown Trigger -->

  <a style="padding:inherit;" class="waves-effect waves-light dropdown-button btn"  data-activates="dropdown1"><i class="material-icons tiny right">view_list</i>Account</a>

  <!-- Dropdown Structure -->
  <ul id="dropdown1" class="dropdown-content">
    <li><a style="font-size:0.8rem;" href="logout.php">LOGOUT</a></li>
    <li class="divider"></li>
    <li><a style="font-size:0.8rem;" href="changepass.php">Change Password</a></li>
    <li class="divider"></li>
    <li><a style="font-size:0.8rem;" href="changeuid.php">Change Username</a></li>
  </ul>';

  echo '
    </div></div>
    <div class="row">
    <div id="test1" class="col s8 offset-s2"><form method="post" action="#">
    <div class="row">
      <div class="input-field col s6">
			<input type="text" name="nquiz" id="nquiz" required />
			<label for="nquiz" >Name of Quiz</label>
			</div></div>
		<div class="row">
      <div class="input-field col s6">
			<input type="text" name="sub" id="sub" required/>
			<label for="sub">Subject</label>
			</div></div>
		<div class="row">
      <div class="input-field col s6">
			<input type="number" name="nq" id="nq" required />
			<label for="nq">Number of Questions</label>
			</div></div>
		<div class="row">
		 <div class="input-field col s6">		
			<select name="tquiz" id="tquiz">
				<option value="" disabled selected>Choose your option</option>
				<option>Time bound</option>
				<option>No Time Bound</option>
			</select>
			<label>Type of Quiz</label>
			 </div></div>
			 
			 		<div class="row">
		 <div class="col s6">
			<button class="waves-effect waves-light btn" type="submit" >Create</button>
			</div>
			</div>
		</form></div>
    <div id="test2" class="col s12">';
    $stmt=$pdo->prepare("select * from `quizes`");
	$stmt->execute();
	$r=$stmt->fetchAll(PDO::FETCH_ASSOC);
	echo '<table><tr><th>Quiz ID</th><th>Name</th><th>Users</th><th>Subject</th><th>Questions</th><th>Start Time</th><th>End Time</th><th>Time(in Mins)</th><th>Available</th><th>Scores</th></tr>';
	foreach ($r as $row) {
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

    echo '</table></div>
  ';
  if($flag=="true")
  {

  	echo '
    <div id="test3" class="col s8 offset-s2">
    <div class="row">
      <div class="input-field col s6">
			<input type="text" name="uname" id="uname" required />
			<label for="uname" >User Name</label>
			</div></div>
		<div class="row">
      <div class="input-field col s6">
			<input type="text" name="fname" id="fname" required/>
			<label for="fname">Full Name</label>
			</div></div>
		<div class="row">
      <div class="input-field col s6">
			<input type="password" name="pass" id="pass" required/>
			<label for="pass">Password</label>
			</div></div>
	
			 
			 		<div class="row">
		 <div class="col s6">
			<button class="waves-effect waves-light btn" onClick="submitadd()" >Create User</button>
			</div>
			</div>
		</div></div>';
	}
	
	}
	else if(isset($_POST["nquiz"])&&isset($_POST["sub"])&&isset($_POST["nq"])&&isset($_POST["tquiz"]))
	{
		$nquiz=(string)$_POST["nquiz"];
		$sub=(string)$_POST["sub"];
		$nq=(int)$_POST["nq"];
		$tquiz=(string)$_POST["tquiz"];
		if($tquiz=="Time bound")
			$type="t";
		else
			$type="u";
		$stmt=$pdo->prepare("INSERT INTO `quizes`(`name`, `sub`, `type`, `ques`) VALUES (?,?,?,?)");
		$stmt->execute(array($nquiz,$sub,$type,$nq));
	    $quizno=$pdo->lastInsertId();
	    $tbname="qa_".$quizno;
	    $tbname2="scores_".$quizno;
	    $pdo->exec("create table ".$tbname." ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,q VARCHAR(200), a INT(2),op1 VARCHAR(100),op2 VARCHAR(100),op3 VARCHAR(100),op4 VARCHAR(100) )");
	    $pdo->exec("create table ".$tbname2."( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(200),roll VARCHAR(20) ,score INT(20),start INT(20),end INT(20) )");
	    echo '<div class="row">
    <div class="col s9">
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#test1">Create Quiz</a></li>
        <li class="tab col s3"><a  href="#test2">Available Quiz</a></li>
        ';
        if($flag=="true")
        {
        echo '<li class="tab col s3"><a  href="#test3">Add User</a></li>';
    	}
        echo '
      </ul>
    </div>
    <div class="col s2">';
     echo '
     <!-- Dropdown Trigger -->

  <a style="padding:inherit;" class="waves-effect waves-light dropdown-button btn"  data-activates="dropdown1"><i class="material-icons tiny right">view_list</i>Account</a>

  <!-- Dropdown Structure -->
  <ul  id="dropdown1" class="dropdown-content">
    <li><a style="font-size:0.8rem;" href="logout.php">LOGOUT</a></li>
    <li class="divider"></li>
    <li><a style="font-size:0.8rem;" href="changepass.php">Change Password</a></li>
    <li class="divider"></li>
    <li><a style="font-size:0.8rem;" href="changeuid.php">Change Username</a></li>
  </ul>';
    echo '</div>
    </div>
    <div class="row">
    <div id="test1" class="col s8 offset-s2"><form method="post" action="insertquizquestions.php">
    
	    ';
	    echo '<input type="hidden" name="qno" value="'.$quizno.'" />';
	    if($type=="t")
	    	echo '<div class="row">
      				<div class="input-field col s6"><input type="number" name="time" id="time" required />
      					<label for="time" >Quiz Duration(in mins)</label> 
      			    </div>
      			  </div>';
	 echo' 
	 	<h6>Enter Start Date and Time</h6>
      	<input type="text" name="start" id="start" required/>
      	<h6>Enter End Date and Time</h6>
      	<input type="text" name="end" id="end" required />';
	    for($i=0;$i<$nq;$i++)
	    {
	    	echo '<div class="row">
      <div class="input-field col s12">';
	    	echo '<textarea class="materialize-textarea" type="text" id="q'.$i.'" name="ques['.(string)($i).']" required></textarea>';
	    	echo '<label style="padding-bottom:5px;" for="q'.$i.'">Question '.(string)($i+1).'</label></div></div>';
	    	echo '<div class="row">
      <div class="input-field col s3">
      <label for="op1['.(string)($i).']">Option 1</label>';
	    	echo '<input type="text" id="op1['.(string)($i).']" name="op1['.(string)($i).']" required /></div>';
	    	echo '<div class="input-field col s3">
      <label for="op2['.(string)($i).']">Option 2</label><input type="text" id="op2['.(string)($i).']" name="op2['.(string)($i).']" required /></div>';
	    	echo '<div class="input-field col s3">
      <label for="op3['.(string)($i).']">Option 3</label><input type="text" id="op3['.(string)($i).']" name="op3['.(string)($i).']" required /></div>';
	    	echo '<div class="input-field col s3">
      <label for="op4['.(string)($i).']">Option 4</label><input type="text" id="op4['.(string)($i).']" name="op4['.(string)($i).']" required /></div></div>';
	    	echo '<div class="row">
      <div class="input-field col s6"><label for="ans['.(string)($i).']">Correct Answer</label>';
	    	echo '<input type="number" min="1" max="4" id="ans['.(string)($i).']" name="ans['.(string)($i).']" required /></div></div>';
	    }
	    echo '
	    <div class="row">
	<button class="btn waves-effect waves-light" id="submit" name="submit" type="submit">Submit
    <i class="mdi-content-send right"></i>
  </button>
	    </form></div></div>
	<div id="test2" class="col s12">';
    $stmt=$pdo->prepare("select * from `quizes`");
	$stmt->execute();
	$r=$stmt->fetchAll(PDO::FETCH_ASSOC);
		echo '<table><tr><th>Quiz ID</th><th>Name</th><th>Users</th><th>Subject</th><th>Questions</th><th>Start Time</th><th>End Time</th><th>Time(in mins)</th><th>Available</th><th>Scores</th></tr>';
	foreach ($r as $row) {
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

    echo '</table></div>
	    ';
	    if($flag=="true")
  {

  	echo '
    <div id="test3" class="col s8 offset-s2"><form method="post" action="adduser.php">
    <div class="row">
      <div class="input-field col s6">
			<input type="text" name="uname" id="uname" required />
			<label for="uname" >User Name</label>
			</div></div>
		<div class="row">
      <div class="input-field col s6">
			<input type="text" name="fname" id="fname" required/>
			<label for="fname">Full Name</label>
			</div></div>
		<div class="row">
      <div class="input-field col s6">
			<input type="password" name="pass" id="pass" required/>
			<label for="pass">Password</label>
			</div></div>
	
			 
			 		<div class="row">
		 <div class="col s6">
			<button class="waves-effect waves-light btn" type="submit" >Create User</button>
			</div>
			</div>
		</div>';
	}

	}
	?>
</div>
 
	</body>

</html>