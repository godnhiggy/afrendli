<?php
session_start();
$userName = $_SESSION["userName"];
$teamName = $_SESSION["teamName"];
$teamId = $_SESSION["teamId"];
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>afrendli login</title>
     <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <style>
     a {
        color: black;
        text-decoration: none;
     }
     table {
            margin-left: auto;
            margin-right: auto;
          }
    #greybox {
              border-radius: 15px;
              background-color: grey;
              box-shadow: 0px 0px 35px white inset;
            }
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
              font-size: 15px;

            }
            .header   { grid-area: 1 / 1 / 2 / 5; }
            .menu     { grid-area: 2 / 1 / 3 / 3; }
            /*.topleft  { grid-area: 2 / 3 / 3 / 5;
                        font-size: 14px;
            }*/

            .logout   { grid-area: 2 / 3 / 3 / 5; }



            .subject  { grid-area: 4 / 1 / 5 / 5; }

            .main     { grid-area: 5 / 1 / 6 / 5; }

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
       <div class="topleft"></div>
       <div class="header">
         <div>
         <h2>afrendli</h2>
       </div>
       <div>
         <?php echo $teamName; ?>
         <br><br>
       </div>
         </div>
       <div class="logout"></div>
     <div class="menu" id="menu">
       <div>
        <a href="test3.php" class="button">Score a Game</a>&nbsp;&nbsp;
         <a href="rank.php" class="button">Schedule a Game</a>&nbsp;&nbsp;

          <a href="schedule.php" class="button">Results</a>
         <!--<a href="unlistedTeam.php" class="button">Recruit to Afrendli</a>-->

       </div>
     </div>

     <div class="subject">
       <h3>Recruit a New Team!</h3>
       Help us build your network!
     </div>
     <div class="main">
       <br>
       <form id="greybox" action="function.php" method="POST">
         <br>
         <label id="inputid" for="inviteTeamName">Team Name</label><br>
           <input id="inputid" type="text" size="10" name="inviteTeamName" style="text-align: center" placeholder="Required" required><br><br>
         <label id="inputid" for="inviteTeamCoach">Coaches Last Name</label><br>
           <input id="inputid" type="text" size="10"name='inviteTeamCoach' style="text-align: center"><br><br>
         <label id="inputid" for="inviteTeamEmail">Email</label><br>
           <input id="inputid" type="text" size="10" name='inviteTeamEmail' style="text-align: center" placeholder="Required" required><br><br>
         <label id="inputid" for="inviteTeamPhone">Phone</label><br>
           <input id="inputid" type="text" size="10" name="inviteTeamPhone" style="text-align: center"><br><br><br><br><br>

           <input id="inputid" type="submit" name="submitNewTeam" value="Submit">
           <br><br>
       </form>
   </div>
   </div>
   </body>
 </html>
