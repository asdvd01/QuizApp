<?php
include 'connect.php';
session_start();
if(!isset($_SESSION["username"]))
  header("location:index.php");
if(!isset($_GET["qid"]))
  header("location:createquiz.php");
?>
<html>
	<head>
		<title>Quiz Scores</title>
    <link rel="shortcut icon" type="image/png" href="images/nitrlogo3.png"/>
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  </head>

  <body>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <div class="container">
      <div class="row">
    <div class="col s8">
      <h3>QUIZ SCORES</h3>
    </div>
  <div class="col s2">
    <a href="createquiz.php" class="waves-effect waves-light blue btn">BACK</a>
    </div>
  <div class="col s2">
    <a href="logout.php" class="waves-effect waves-light btn">LOGOUT</a>
    </div>
  </div>
      <?php
        $qid=(int)$_GET["qid"];
        $tab="scores_".$qid;
        $stmt=$pdo->prepare("select * from ".$tab);
        $stmt->execute(array());
        $r=$stmt->fetchAll(PDO::FETCH_ASSOC);
        echo '<table><tr><th>Name</th><th>Roll Number</th><th>Score</th><th>Time Taken</th></tr>';
        foreach($r as $row)
        {
          echo '<tr><td>'.$row["name"].'</td><td>'.$row["roll"].'</td><td>'.$row["score"].'</td><td>'.((int)(($row["end"]-$row["start"])/60)).'min'.((int)(($row["end"]-$row["start"])%60)).'s</td></tr>';
        }
        echo '</table>';
      ?>
    
    </div>
  </body>
</html>