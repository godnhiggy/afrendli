<?php
session_start();
//if(!$_SESSION["success"]){header('location: login.php');}
$userName = $_SESSION["userName"];
$teamName = $_SESSION["teamName"];
$teamId = $_SESSION["teamId"];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>afrendli score game</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  body {
    background-color: #2196F3; /* for browsers with no support of gradient */

  }
  table {margin-left: auto;
         margin-right: auto;}
         a.color {
           color: black;
           font-size: 12px;
         }
         .grid-container {
           display: grid;
           grid-template-columns: auto auto auto auto;
           grid-gap: 3px;
           background-color: #2196F3; /* for browsers with no support of gradient */
           background-image: linear-gradient(grey, white );
           padding: 3px;
           justify-content: center;
           }

         .grid-container > div {
           width: 100%; /* try different value for this */
           margin: auto;
           justify-content: center;
           text-align: center;
           padding: 5px 0;
           font-size: 25px;

         }
         .topleft  { grid-area: 1 / 1 / 2 / 2;
                     font-size: 18px;

         }
         .header   { grid-area: 1 / 2 / 2 / 4; }
         .logout   { grid-area: 1 / 4 / 2 / 5; }

         .menu     { grid-area: 2 / 1 / 3 / 5; }

         .subject  { grid-area: 3 / 1 / 4 / 5; }

         .main     { grid-area: 4 / 1 / 5 / 5; }

         .button {
         font: bold 11px Arial;
         text-decoration: none;
         background-color: #EEEEEE;
         color: #333333;
         padding: 2px 6px 2px 6px;
         border-top: 1px solid #CCCCCC;
         border-right: 1px solid #333333;
         border-bottom: 1px solid #333333;
         border-left: 1px solid #CCCCCC;
         border-radius: 6px;
         }
  </style>
  </head>
  <body>
    <div class="grid-container">
      <div class="topleft"><a href="register.php" class="button">Register</a></div>
      <div class="header">
        <h2>afrendli</h2>
        </div>
      <div class="logout"><a href="login.php" class="button">Login</a></div>

      <div class="menu" id="menu">
 <!--<a href="test3.php">Scoring a Game</a>&nbsp;&nbsp;
          <a href="rank.php">Positioning</a> &nbsp;&nbsp;
           <a href="schedule.php">Schedule</a> &nbsp;&nbsp;
           <a href="unlistedTeam.php">Invite a Team</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
-->
      </div>
      <div class="subject"></div>
    <div class="main">
    <?php
echo "Welcome ".$teamName;
    ?>
      <br>Helping you find the right competition!
      <br>
      <?php
      $servername = "localhost";
      $dbusername = "bjekqemy_higgy";
      $password = "Brett73085";
      $dbname = "bjekqemy_ball";
      //echo $sender $receiver $message;
      $conn = new mysqli($servername, $dbusername, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }
  echo "<form method='POST' action='message_log.php'>";
      $sql = "SELECT DISTINCT receiver FROM $teamName";
      $result = $conn->query($sql);
      if ($result->num_rows > 0)
                {

          // output data of each row
          while($row = $result->fetch_assoc()) {
             // $totalwordcount = str_word_count($row["essay"]);


              $receiver = $row["receiver"];

          echo  "<input type='submit' name='team2' value='".$receiver."' id='submit'/>";
          echo  "<br>";

          }
       }
echo "</form>";
                  ?>
    </div>
    </div>
  </body>
</html>
