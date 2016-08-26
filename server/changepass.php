 <?php
include 'connect.php';
session_start();
if(!isset($_SESSION["username"]))
	header("location:index.php");
if(isset($_POST["opass"])&&isset($_POST["npass"]))
{
	$nm=(string)$_SESSION["username"];
	$op=(string)$_POST["opass"];
	$np=(string)$_POST["npass"];
	if($nm=="" or $op=="" or $np=="")
	{
		echo "Please fill out all fields";
	}
	else
	{
		$op=sha1($op);
		$np=sha1($np);
		$stmt=$pdo->prepare('SELECT * FROM `login` WHERE `usernm`=? and `pass`=?');
		$stmt->execute(array($nm,$op));
		$r=$stmt->fetchAll(PDO::FETCH_ASSOC);
		//echo $nm." ".$np." ".$op;
		if(count($r)==1)
		{
			$id=$r[0]["id"];
			$stmt=$pdo->prepare('UPDATE `login` SET `pass`=? WHERE `id`=?');
			if($stmt->execute(array($np,$id)))
				echo "Successfully Updated Password";
			else
				echo "Error in updating Password";
		}
		else
			echo "Wrong Old Password";
	}
}
else
{
	echo '
		<html>
			<head>
				<title>Change Password</title>
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
			 		var x=$("#opass").val();
			 		var y=$("#npass").val();
			 		var z=$("#npass2").val();
			 		//alert(x+y+z);
			 		if(y==z)
			 		{
			 			$.ajax({
			 			url: "#",
			 			type: "POST",
			 			data:{"opass":x,"npass":y},
			 			success: function(data)
			 			{    
		            	//$(".error").html(data);
		            		Materialize.toast(data, 4000);
		            	}
		        		});
			 		}
			 		else
			 		{
			 			Materialize.toast("New Passwords Donot Match", 4000);

			 		}
			 		
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
							<input type="password" name="opass" id="opass" required />
							<label for="opass" >Old Passwprd</label>
			   			</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input type="password" name="npass" id="npass" required/>
							<label for="npass">New Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input type="password" name="npass2" id="npass2" required/>
							<label for="npass2">Re-enter Password</label>
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<button class="waves-effect waves-light btn" type="submit" >Change Password</button>
						</div>
					</div>
					</form>
				</div>
			</body>
		</html>
		';
}
