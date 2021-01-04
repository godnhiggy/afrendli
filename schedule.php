<?php
session_start();
if(!$_SESSION["success"]){
  header('location: test3.php');
  //die("Unable to connect to site...Please Login");
}
$userName = $_SESSION["userName"];
$teamName = $_SESSION["teamName"];
$teamId = $_SESSION["teamId"];
//$teamId = 71;
$inviteTeamName = $_SESSION["inviteTeamName"];


//the following insert inside if{submit} statement on test3.php
$gameDate = $_POST["gameDate"];
$gameTime = $_POST["gameTime"];
$_SESSION["gameDate"] = $gameDate;
$_SESSION["gameTime"] = $gameTime;

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>afrendli schedule</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  body {
    background-color: #2196F3; /* for browsers with no support of gradient*/
    /*background-image: linear-gradient(grey, white );*/
  }

  table {
      margin-left: auto;
      margin-right: auto;
      font-size: 12px;
      border-spacing: 10px;
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
    font: 14px Helvetica, sans-serif;
  }
  .logout   { grid-area: 1 / 4 / 2 / 5; }

  .menu     { grid-area: 2 / 1 / 3 / 5; }

  .subject  { grid-area: 3 / 1 / 4 / 5;
              font: 16px Helvetica, sans-serif;
  }

  .main     { grid-area: 4 / 1 / 5 / 5; }

  .scheduleHead {
    font: 16px Helvetica, sans-serif;
    }

  #topleft {
     font: Bold 9px Helvetica, sans-serif;
   }

   .button {
   font: bold 11px Helvetica, sans-serif;
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
    font: 9px Helvetica, sans-serif;
    width: 80px;
    padding: 0px 0px 0px 0px;
    height: 35px;
   }

   button.read {
     width: 240px;
     font-size: 10px;
   }

   .delete {
     width: 40px;
     font-size: 10px;
    background-color: red;
    color: white;
   }

   .confirm {
     width: 40px;
     font-size: 10px;
    background-color: green;
    color: white;
   }
   #medium {
     font-size: 20px;
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
      <div class="logout"><a href="logout.php" class="button">Logout</a>
      </div>

      <div class="menu" id="menu">
    <button onclick="window.location.href='schedule.php';">
      current <br>schedule
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
<span id="medium">14u Fastpitch</span><br>
Your Schedule


      </div>
    <div class="main">

      <form action='function.php' method='POST'>
      <table class="border">





      <?php
      //db info
      $servername = "localhost";
      $username = "bjekqemy_higgy";
      $password = "Brett73085";
      $dbname = "bjekqemy_ball";
      // Create connection
      $conn = mysqli_connect($servername, $username, $password, $dbname);

      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      ///this pulls and presents future games where team is game request sender or receiver
      $sql = "SELECT * FROM scheduleGame WHERE messageSender = ? OR messageReceiver = ? ORDER BY datex DESC ";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ii", $teamName, $teamName);
      $stmt->execute();
      $result = $stmt-> get_result();
      $rowCountT = mysqli_num_rows($result);

      if ($result->num_rows >0)
        {
          while($row = $result->fetch_assoc())
           {

             $confirm = $row["confirm"];
             $receiver = $row["messageReceiver"];
             $sender = $row["messageSender"];
             $time = $row["timex"];
             $location = $row["location"];
             $specialNotes = $row["specialNotes"];
             $scheduleGameId = $row["ScheduleGameId"];
      ///////////


             $date = $row["datex"];
             $d=strtotime($date);
             $day = date("D", $d);
             $date = date("M d y", $d);




if($row["messageSender"] == $teamName){
$opponent=$receiver;

             if(!empty($confirm)){

               echo "<tr><td colspan='6'>You have a game scheduled on ".$date." at ".$time."</td></tr>";
               echo "<tr><td colspan='6'> against ".$opponent." at ".$location."</td></tr>";

             }else{
//echo "<button>".$date."--".$time."--".$opponent."--".$location."--".$specialNotes."</button>";
                 echo "<tr><td align='center' colspan='4'>
                 <button class='read' type='submit' name='messageRead' value='".$opponent."'>
                 Game Request: ".$date.' '.$time.'<br>'.$opponent.", ".$location."
                </button></td>
                <td><button class='delete type='submit' name='deleteGameRequest' value='".$scheduleGameId."'>del</button></td></tr>";

            }

           }else{



if($row["messageReceiver"] == $teamName){
$opponent=$sender;

             if(!empty($confirm)){
               echo "<tr><td colspan='6'>You have a game scheduled on ".$date." at ".$time."</td></tr>";
               echo "<tr><td colspan='6'> against ".$opponent." at ".$location."</td></tr>";

             }else{
                //echo "<tr><td>".$date."--".$time."--".$opponent."--".$location."--".$specialNotes."</td></tr>";
                echo "<tr><td align='center' colspan='4'>
                <button class='read' type='submit' name='messageRead' value='".$opponent."'>
                Game Request: ".$date.' '.$time.'<br>'.$opponent.", ".$location."
               </button></td>
                 <td><button class='delete type='submit' name='deleteGameRequest' value='".$scheduleGameId."'>del</button></td>
                 <td><button class='confirm' type='submit' name='confirmGameRequest' value='".$scheduleGameId."'>conf</button></td></tr>";
             }
             //echo $teamId."-Us - ".$teamScore."----Them - ".$opponentScore."<br>";
           }
            }
              }
            }

?>

<tr class="scheduleHead"><td >Date</td><td>Opponent</td><td colspan="2">Score</td></tr></span>

<?php

      ///this pulls and presents previous games where team is home or opponent
      $sql = "SELECT * FROM games WHERE teamId = ? OR opponentId = ? ORDER BY datex DESC ";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ii", $teamId, $teamId);
      $stmt->execute();
      $result = $stmt-> get_result();
      $rowCountT = mysqli_num_rows($result);
      ?>

        <?php
      //echo $rowCountT;
        if ($result->num_rows >0)
          {
            while($row = $result->fetch_assoc())
             {
               if($row["teamId"] == $teamId){
               $confirm = $row["confirm"];
               $teamScore = $row["teamScore"];
               $opponentScore = $row["opponentScore"];
               $teamIdForConfirm = $row["teamId"];
               $opponentIdForConfirm = $row["opponentId"];
               $opponentName = $row["opponentName"];
      ///////////
               if(!$opponentName){$opponentName = " not afrendli team";}

               $gameId = $row["gameId"];
               $date = $row["datex"];
               $d=strtotime($date);
               $day = date("D", $d);
               $date = date("M d y", $d);





               $gameResult = "T";
               if($teamScore > $opponentScore){$gameResult = "W";}
               if($teamScore < $opponentScore){$gameResult = "L";}
               //echo $gameResult;
               if(!empty($confirm)){
                 echo "<tr><td align='right'><span id='day'> ".$date."</span></td>
                 <td align='right'>".$opponentName."</td>
                 <td align='left'>".$gameResult."</td>
                 <td align='left'>".$teamScore." to ".$opponentScore."</td></tr>";
               }else{

                   echo "<tr><td align='right'><span id='day'> ".$date."</span></td>
                   <td align='right'>".$opponentName."</td>
                   <td align='left'>".$gameResult."</td>
                   <td align='left'>".$teamScore." to ".$opponentScore."</td>
                   <td><button class='delete' type='submit' name='deleteScore' value='".$gameId."'>del</button></td></tr>";
               }
               //echo $teamId."-Us - ".$teamScore."----Them - ".$opponentScore."<br>";
             }else{

             if($row["opponentId"] == $teamId){
               $confirm = $row["confirm"];
               $teamScore = $row["opponentScore"];
               $opponentScore = $row["teamScore"];
               $opponentIdForConfirm = $row["teamId"];
               $teamIdForConfirm = $row["opponentId"];
               $opponentName = $row["teamName"];
               ///////////
                        if(!$opponentName){$opponentName = " not afrendli team";}
               $gameId = $row["gameId"];
               $date = $row["datex"];
               $d=strtotime($date);
               $day = date("D", $d);
               $date = date("M d y", $d);
               $gameResult = "Tie";
               if($teamScore > $opponentScore){$gameResult = "W";}
               if($teamScore < $opponentScore){$gameResult = "L";}        if(!empty($confirm)){
                 echo "<tr><td align='right'><span id='day'> ".$date."</span></td>
                 <td align='right'>".$opponentName."</td>
                 <td align='left'>".$gameResult."</td>
                 <td align='left'>".$teamScore." to ".$opponentScore."</td></tr>";
               }else{

                   echo "<tr><td align='right'><span id='day'> ".$date."</span></td>
                   <td align='right'>".$opponentName."</td>
                   <td align='left'>".$gameResult."</td>
                   <td align='left'>".$teamScore." to ".$opponentScore."</td>
                   <td><button class='delete' type='submit' name='deleteScore' value='".$gameId."'>del</button></td>
                   <td><button class='confirm' type='submit' name='confirmScore' value='".$gameId."'>conf</button></td></tr>";

               }

             }
              }
                }
              }

          ?>

      </table>
      </form>
      </div>

</div>
  </body>
</html>
