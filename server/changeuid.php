 <?php
include 'connect.php';
session_start();
if(!isset($_SESSION["username"]))
	header("location:index.php");
if(isset($_POST["pass"])&&isset($_POST["uname"])&&isset($_POST["fname"]))
{
	$nm=(string)$_SESSION["username"];
	$p=(string)$_POST["pass"];
	$fnm=(string)$_POST["fname"];
	$unm=(string)$_POST["uname"];
	//echo $p.$fnm.$unm;
	if($fnm=="" or $unm=="" or $p=="")
	{
		echo "Please fill out all fields";
	}
	else
	{
		$p=sha1($p);
		$stmt=$pdo->prepare('SELECT * FROM `login` WHERE `usernm`=? and `pass`=?');
		$stmt->execute(array($nm,$p));
		$r=$stmt->fetchAll(PDO::FETCH_ASSOC);
		//echo $nm." ".$np." ".$op;
		if(count($r)==1)
		{
			$id=$r[0]["id"];
			$stmt=$pdo->prepare('UPDATE `login` SET `usernm`=? , `userid`=? WHERE `id`=?');
			if($stmt->execute(array($fnm,$unm,$id)))
				{
					$_SESSION["username"]=$fnm;
					echo "Successfully Updated User Name";
				}
			else
				echo "Error in updating User Name";
		}
		else
			echo "Wrong Password";
	}
}
else
{
	echo '
		<html>
			<head>
				<title>Change Username</title>
				<link rel="shortcut icon" type="image/png" href="images/nitrlogo3.png"/>
			    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
			    <link type="text/css" rel="stylesheet" href="font/icon.css"  >

			    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		    </head>
		    <body>
		    	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		      	<script type="text/javascript" src="js/materialize.min.js"></script>
			 	<script type="text/javascript">
			 	function submitadd()
			 	{	  
			 		var x=$("#pass").val();
			 		var y=$("#uname").val();
			 		var z=$("#fname").val();
			 		//alert(x+y+z);
		 			$.ajax({
		 			url: "#",
		 			type: "POST",
		 			data:{"pass":x,"uname":y,"fname":z},
		 			success: function(data)
		 			{    
	            	//$(".error").html(data);
	            		Materialize.toast(data, 4000);
	            	}
	        		});
			 	}
			 </script>
		    	<div class="container">
		    		<div class="row">
		    				<div class="col s2 offset-s8">
		    					<a href="createquiz.php" class="waves-effect waves-light btn blue">Go Back</a>
		    				</div>
				    		<div class="col s2">
							    <!-- Dropdown Trigger -->

									  <a style="padding:inherit;" class="waves-effect waves-light dropdown-button btn"  data-activates="dropdown1"><i class="material-icons tiny right">view_list</i>Account</a>

									  <!-- Dropdown Structure -->
									  <ul id="dropdown1" class="dropdown-content">
									    <li><a style="font-size:0.8rem;" href="logout.php">LOGOUT</a></li>
									    <li class="divider"></li>
									    <li><a style="font-size:0.8rem;" href="changepass.php">Change Password</a></li>
									    <li class="divider"></li>
									    <li><a style="font-size:0.8rem;" href="changeuid.php">Change Username</a></li>
									  </ul>
		    				</div>
		    			</div>
		    			<form action="javascript:submitadd()">
		 			<div class="row">
		      			<div class="input-field col s6">
							<input type="password" name="pass" id="pass" required />
							<label for="pass" >Password</label>
			   			</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input type="text" name="fname" id="fname" required/>
							<label for="fname">Full Name</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input type="text" name="uname" id="uname" required/>
							<label for="uname">User ID</label>
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<button class="waves-effect waves-light btn" type="submit" >Change</button>
						</div>
					</div>
					</form>
				</div>
			</body>
		</html>
		';
}
