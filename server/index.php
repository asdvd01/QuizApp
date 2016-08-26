
<html>
	<head>
		<title>LOG IN</title>
		<link rel="shortcut icon" type="image/png" href="images/nitrlogo3.png"/>
	<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="font/icon.css"  >
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    
      
    </head>

    <body>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
	<?php
include 'connect.php';
session_start();
if(isset($_POST["uid"])&&isset($_POST["pass"]))
{
	$uid=(string)$_POST["uid"];
	$pass=(string)$_POST["pass"];
	$pass=sha1($pass);
	$stmt=$pdo->prepare('select * from `login` where `userid` = ? and `pass` = ? ');
	$stmt->execute(array($uid,$pass));
	$r=$stmt->fetchAll(PDO::FETCH_ASSOC);
	if(count($r)==1)
	{
		$_SESSION["username"]=$r[0]["usernm"];
		$_SESSION["perm"]=$r[0]["previlege"];
		header("location:createquiz.php");
	}
	else
		echo '<script type="text/javascript"> Materialize.toast("Wrong Username or Password", 4000);</script>';
}
?>
    	<div class="container" style="margin-top:60px;">
		<!-------------------->
		<div class="row">
        <div class="offset-s3 col s9 offset-m3 m6">
          <div class="card-panel">
            <div class="card-image">
             <!-- <span class="card-title">LOGIN</span>-->
             <!-------------------->
			 <div class="row">
		<center>
		<img style="height:100px;width:100px;" src="images/nitrlogo3.png" />
		</center>
		</div>
	</div>
			<form method="post" action="#">
			    <div class="row ">
      				<div class="input-field offset-s3 col s6">
						<i class="material-icons prefix">account_circle</i>
						<input id="uid" type="text"  name="uid" required/>
						<label for="uid">Enter Username</label>
					</div>
				</div>
			    <div class="row ">
      				<div class="input-field offset-s3 col s6">
						<i class="material-icons prefix">vpn_key</i>
						<input id="pass" type="password" name="pass" required/>
						<label for="pass" >Enter Password</label>
					</div>
				</div>
				<div class="row">
				<div class="offset-s4 col s6">
				<button class="waves-effect waves-light btn" type="submit" >LOGIN</button>
				</div></div>
			</form>
		</div>
			 <!-------------------->
            </div>
          </div>
        </div>
      </div>
	  <!-------------------->
		
	</body>
</html>