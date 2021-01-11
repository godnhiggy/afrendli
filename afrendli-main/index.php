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
    background-color: #2196F3; /* for browsers with no support of gradient*/
    /*background-image: linear-gradient(grey, white );*/
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
  </style>
  </head>
  <body>
    <div class="grid-container">
      <div class="topleft"><a href="register.php" class="color">Register</a></div>
      <div class="header">
        <h2>afrendli</h2>
        </div>
      <div class="logout"><a href="login.php" class="color">Login</a></div>

      <div class="menu" id="menu">
 <!--<a href="test3.php">Scoring a Game</a>&nbsp;&nbsp;
          <a href="rank.php">Positioning</a> &nbsp;&nbsp;
           <a href="schedule.php">Schedule</a> &nbsp;&nbsp;
           <a href="unlistedTeam.php">Invite a Team</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
-->
      </div>
      <div class="subject"></div>
    <div class="main">
      Helping you find the right competition!
      <br>
      <video width="320" height="240" controls>
  <source src="video.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
    </div>
    </div>
  </body>
</html>
