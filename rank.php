<?php
session_start();
if(!$_SESSION["success"]){
  die("Unable to connect to site");
}
$userName = $_SESSION["userName"];
$teamName = $_SESSION["teamName"];
$teamId = $_SESSION["teamId"];
$inviteTeamName = $_SESSION["inviteTeamName"];
$ageGroup = $_SESSION['ageGroup'];
$sport = $_SESSION['sport'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <meta charset="utf-8">
  <title>afrendli position</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
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
    table {
          margin-left: auto;
           margin-right: auto;
         }
   .small {
          font-size: 12px;
          }

  .middle {
        font-size: 18px;
        font-weight: bold;
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
      <h2>Schedule Games</h2>

      <span class="small">Click Box to Schedule a Game </span>
    </div>
    <div class="main">
      <?php
      ////insert new game data into DB
      $gameDate = $_SESSION["gameDate"];
      $gameTime = $_SESSION["gameTime"];
      $map=$_POST["map"];
      $_SESSION["map"] = $map;

      $opponentId = $_POST["opponentId"];
      $teamScore = $_POST["teamScore"];
      $opponentName = $_POST["opponentName"];
      $opponentScore = $_POST["opponentScore"];
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

      //$stmt = $conn->prepare("INSERT INTO games (teamId, teamScore, opponentId, opponentScore, location, datex, timex) VALUES (?, ?, ?, ?, ?, ?, ?)");
      //$stmt->bind_param("sisisss", $teamId, $teamScore, $opponentId, $opponentScore, $location, $gameDate, $gameTime);
      //$stmt->execute();

      function array_push_assoc($array, $key, $value){
      $array[$key] = $value;
      return $array;
      }

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
      ////start ranking system////
        ////select team first
        $sqla = "SELECT * FROM team";
        $resulta = $conn->query($sqla);
        if ($resulta->num_rows > 0)
          {
            // output data of each row
            while($rowa = $resulta->fetch_assoc())
              {
                $teamIdForRank = $rowa["teamId"];
                //$teamNameId= $rowa["teamName"];
                $email = $rowa["email"];
                //echo "<br>";
                //echo "<br>";
                //echo $teamNameId;
                //echo "<br>";


                $id = 0;
                $sql = "SELECT * FROM games WHERE teamId = ? AND confirm = 'yes'";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $teamIdForRank);
                $stmt->execute();
                $result = $stmt-> get_result();
                $rowCountT = mysqli_num_rows($result);
                //echo $rowCountT;
                  if ($result->num_rows >0)
                    {
                      while($row = $result->fetch_assoc())
                       {
                         //echo "Game as Team vs ".$row["opponentId"];
                         //echo "<br>";
                         $teamScore = $row["teamScore"];
                         $opponentScore = $row["opponentScore"];
                         $newTeamId = $row["teamName"];
                         $gameScore = $teamScore - $opponentScore;
                         $totalGameScore = $totalGameScore + $gameScore;
                         //echo "The total score for all games is ".$totalGameScore."<br>";
                       }
                    }
                      ////our team as opponent
                      $id = 0;
                      $sql = "SELECT * FROM games WHERE opponentId = ? AND confirm = 'yes'";
                      $stmt = $conn->prepare($sql);
                      $stmt->bind_param("i", $teamIdForRank);
                      $stmt->execute();
                      $result = $stmt-> get_result();
                      $rowCountO = mysqli_num_rows($result);
                      //echo $rowCountO;
                      $totalRowCount = $totalRowCount + $rowCountT + $rowCountO;
                        if ($result->num_rows >0)
                          {
                            while($row = $result->fetch_assoc())
                             {
                               //echo "Game as Opponent vs ".$row["teamId"];
                               //echo "<br>";
                               $teamScore = $row["teamScore"];
                               $opponentScore = $row["opponentScore"];
                               $newTeamId = $row["opponentName"];
                               $gameScore = $opponentScore - $teamScore;
                               $totalGameScore = $totalGameScore + $gameScore;
                               }
                          }
                          if(!empty($totalRowCount)){
                          $totalTeamRank = round($totalGameScore/$totalRowCount);}
      //echo "Total number of games - ".$totalRowCount."<br>";
      //echo "Total SCORE of games - ".$totalGameScore."<br>";
      //echo "Total RANK of TEAM - ".$totalTeamRank;
      //echo "<br>----------------------------------------";
      ////build array for team, rank
//$myarray = array_push_assoc($myarray, $teamNameId, $totalTeamRank);
if(!empty($newTeamId)){
      $arrayPreliminary = [$email => $newTeamId];
      $myarray = array_push_assoc($myarray, $totalTeamRank, $arrayPreliminary);
      ///clear variables
      $totalRowCount = 0;
      $totalGameScore = 0;
      $totalTeamRank = 0;
      $newTeamId = NULL;

    }
              }
          }
      ////echo the rankings from array
          //$arrlength = count($totalTeamRank);
          //for($x = 0; $x < $arrlength; $x++){
            //echo $teamIds[$x];
            //echo "<option value='".$teamNames[$x]."'>".$teamNames[$x]."</option>";
          //}
      //echo "<br>";
      //echo "<pre>";print_r($myarray);echo "</pre>";
      //echo "<br>";
      //echo "<h1>Team Rankings</h1>";
      ?>
      <table class="center">
        <form action="game_request_email_action.php" method="POST">
        <tr><th>Ranking</th><th>Team</th><th>Click Box</th></tr>

        <script>
          function stuff(){


          }

        </script>

      <?php
      krsort($myarray);
      foreach ($myarray as $totalTeamRank => $arrayRankEmail) {
        foreach($arrayRankEmail as $email=>$newTeamId){
          $x=$x+1;
          $color="black";
          if($newTeamId==$teamName){$color="red";}else{$color="black";}
          echo "<tr style='color:".$color.";'><td align='right'>".$totalTeamRank.":&nbsp&nbsp</td><td align='left'>".$newTeamId."</td><td>
          <input type='checkbox' id='messageBoxCheck' name='messageReceiver[]' value='".$email."'></td></tr>";
          echo "<input type='hidden' name='messageReceiverTeamName[]' value='".$newTeamId."'>";
          }}
       ?>
      </table>


      <br>
      <div id="dvSubmit" style="display: none">
        <table>
        <tr><td align='right'>Date:</td><td align='left'><input type="date" name="date"><br></td></tr>
        <tr><td align='right'>Time:</td><td align='left'><input type="time" name="time"><br></td></tr>
        <tr><td align='right'>Location:</td><td align='left'><input type="text" name="location"><br></td></tr>
        <tr><td align='right'>Special Notes:</td><td align='left'><input type="textarea" name="specialNotes"><br></td></tr>
        </table>
        <input type="submit" id=buttonSubmit name="submitMessage" value="Submit">
    </div>
    </form>




          <!--(...this will go to a page that describes the next feature.)-->
      </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("input").on("click", function(){
    if ($(this).is(":checked")) {
      $("#dvSubmit").show();
  }
  //else {
    //  $("#dvSubmit").hide();
  //}
  });
});
</script>

  </body>
</html>
