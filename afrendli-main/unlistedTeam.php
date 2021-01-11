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
     body {
       background-color: #2196F3; /* for browsers with no support of gradient*/
       /*background-image: linear-gradient(grey, white );*/
     }
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
            .topleft  { grid-area: 1 / 1 / 2 / 2;
                        font-size: 10px ;
                         text-align: center;
            }
            .header   { grid-area: 1 / 2 / 2 / 4;
              font: 14px Arial;
            }
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


            button {
             font: bold 9px Arial;
             width: 80px;
             padding: 0px 0px 0px 0px;
             height: 35px;
            }



            #topleft {
               font: bold 12px Arial;
             }

     </style>
     </head>
   <body>
     <div class="grid-container">
       <div class="topleft" id="topleft">
 <?php echo $teamName; ?>
       </div>
       <div class="header">
         afrendli
         </div>
       <div class="logout"><a href="logout.php" class="button">Logout</a></div>

       <div class="menu" id="menu">
         <button onclick="window.location.href='schedule.php';">
       current<br> schedule
     </button>
     <button onclick="window.location.href='test3.php';">
     score a<br>past game
     </button>
     <button onclick="window.location.href='rank.php';">
     schedule a<br>future game
     </button>
     <button onclick="window.location.href='message0.php';">
     read<br>messages
     </button>



       </div>
       <div class="subject">

 Recruit a new team!


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
