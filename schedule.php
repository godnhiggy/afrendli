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
              font-size: 14px;

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
    <div class="subject"></div>
    <div class="main">
      Welcome <?php echo $teamName; ?>
      <form action='function.php' method='POST'>
      <table class="border">

        <tr><td class="small">Date</td><td class="small">Opponent</td><td class="small"></td></tr></span>



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
                   <td><button class='schedule type='submit' name='deleteScore' value='".$gameId."'>del</button></td></tr>";
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
                   <td><button class='schedule' type='submit' name='deleteScore' value='".$gameId."'>del</button></td>
                   <td><button class='schedule' type='submit' name='confirmScore' value='".$gameId."'>conf</button></td></tr>";

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
