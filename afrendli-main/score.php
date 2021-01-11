<?php
session_start();
//if(!$_SESSION["success"]){header('location: login.php');}
$userName = $_SESSION["userName"];
$teamName = $_SESSION["teamName"];
$teamId = $_SESSION["teamId"];
///the following inserted inside if{submit} statement on test3.php
//$teamScore = $_POST["teamScore"];
//$opponentName = $_POST["opponentName"];
//$opponentScore = $_POST["opponentScore"];
//$_SESSION["teamScore"] = $teamScore;
//$_SESSION["opponentName"] = $opponentName;
//$_SESSION["opponentScore"] = $opponentScore;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>afrendli scoring game</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  table {margin-left: auto;
         margin-right: auto;}
  </style>
  </head>
  <body>
    <div class="grid-container">
    <div class="header">
      <h3>afrendli</h3>
    </div>
    <div class="menu" id="menu">
       <a href="score.php">Scoring a Game</a>&nbsp;&nbsp;
        <a href="rank.php">Ranking</a> &nbsp;&nbsp;
         <a href="schedule.php">Schedule</a> &nbsp;&nbsp;
          <a href="unlistedTeam.php">Invite a Team</a>

    </div>
    <div class="subject"></div>
    <div class="main">

      <?php
      $teamNames = $_SESSION["teamNames"];
      //echo "the first index has value ".$teamNames[0];
       //DB Connect
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
       //echo "Connected successfully";
       $teamNames = array();
       $opponentId = array();
       $id = 0;
       $sql = "select * from team where teamId>?";
       $stmt = $conn->prepare($sql);
       $stmt->bind_param("i", $id);
       $stmt->execute();
       $result = $stmt-> get_result();
      //$teams = $result->fetch_assoc();

       while ($row = $result->fetch_assoc()){
        array_push($teamNames, $row['teamName']);
        array_push($opponentId, $row['teamId']);
        }

       $stmt->close();
       $conn->close();

       $_SESSION["teamNames"] = $teamNames;
        ?>


        <form action="date.php" method="POST">
          <table class="center">
        <tr><td align="right"><label id="inputid" for="teamScore"><b><?php echo $teamName." <br>Your Team's Score"; ?>:</b></label></td>
        <td align="left"><input type="number" id="inputid" size="2" name="teamScore" required min="1" max="99"></td></tr>
        <tr height="25px>">
        </tr>
        <tr><td align="right"><label id="inputid" for="opponentId">Choose Opponent:</label></td>
        <td align="left"><select id="inputid" name='opponentId' id='opponentId' required maxlength="12">
          <?php
        $arrlength = count($teamNames);
      //  echo $arrlength."<br>";

            for($x = 0; $x < $arrlength; $x++){
              //echo $teamIds[$x];
              echo "<option value='".$opponentId[$x]."'>".$teamNames[$x]."</option>";
            }
        ?>
        <option value = "unlisted">Not Listed</option>
      </select></td></tr>
        <tr><td align="right"><label id="inputid" for="opponentScore">Their Score:</label></td>
        <td align="left"><input id="inputid" type="number" id="opponentScore" size="2" name="opponentScore" required min="1" max="99"></td></tr>
</table>
<br><br>
        <input id="inputid" type="submit" name="submitScore" value="Submit">

      </form>
      </div>

</div>
  </body>
</html>
