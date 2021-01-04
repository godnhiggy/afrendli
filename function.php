<?php
session_start();
$userName = $_SESSION["userName"];
$teamName = $_SESSION["teamName"];
//$teamName = "Xtreme_06_Nelso.Dean_Nelson";
$teamId = $_SESSION["teamId"];
//echo "THIS IS THE TEAM ID___".$teamId;
//echo "<br>THis is the tam name....".$teamName;


if($_POST["submitGameDay"]){
  $teamScore = $_SESSION["teamScore"];
  $teamScore = preg_replace('/[^0-9.]+/', '', $teamScore);
  $opponentId = $_SESSION["opponentId"];
  $opponentScore = $_SESSION{"opponentScore"};
  $opponentScore = preg_replace('/[^0-9.]+/', '', $opponentScore);

  $gameDate = $_POST["gameDate"];
  $gameTime = $_POST["gameTime"];
  //echo $gameTime;

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
  ////////////////pull opponent name from db to insert into games table

  $sql = "SELECT * FROM team WHERE teamId = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $opponentId);
  $stmt->execute();
  $result = $stmt-> get_result();
  $rowCountT = mysqli_num_rows($result);

    if ($result->num_rows >0)
      {
        while($row = $result->fetch_assoc())
         {
           $opponentName = $row["teamName"];
       }
     }

    $stmt = $conn->prepare("INSERT INTO games (teamId, teamName, teamScore, opponentId, opponentName, opponentScore, location, datex, timex, confirm) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssississss", $teamId, $teamName, $teamScore, $opponentId, $opponentName, $opponentScore, $location, $gameDate, $gameTime, $confirm);
    $stmt->execute();
    $stmt->close();
    $conn->close();
  //if($opponentId == "unlisted"){header("location: https://www.google.com");}
  if($opponentId == "unlisted"){header("Location: unlistedTeam.php");}else{

  header("Location: start.php");}
  }

  if($_POST["submitNewTeam"]){
    //$userName = mysqli_real_escape_string($conn, $_POST["userName"]);
    //$passWord = mysqli_real_escape_string($conn, $_POST["passWord"]);
    //$email = mysqli_real_escape_string($conn, $_POST["email"]);
    //$textNumber = mysqli_real_escape_string($conn, $_POST["textNumber"]);
    //$sport = mysqli_real_escape_string($conn, $_POST["sport"]);
    //$ageGroup = mysqli_real_escape_string($conn, $_POST["ageGroup"]);
  //  $teamName = mysqli_real_escape_string($conn, $_POST["teamName"]);
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

    $inviteTeamName = $_POST["inviteTeamName"];
    //$_SESSION["inviteTeamName"] = $inviteTeamName;
    $inviteTeamCoach = $_POST["inviteTeamCoach"];
    $inviteTeamEmail = $_POST["inviteTeamEmail"];
    $inviteTeamPhone = $_POST["inviteTeamPhone"];
  /////testing site

    $stmt = $conn->prepare("INSERT INTO inviteTeam (inviteTeamName, inviteTeamCoach, inviteTeamEmail, inviteTeamPhone) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $inviteTeamName, $inviteTeamCoach, $inviteTeamEmail, $inviteTeamPhone);
    $stmt->execute();
    $stmt->close();
    $conn->close();

  $stmt->close();
  $conn->close();
  // the message
  $msg = "Congratulations on being invited to afrendli!\nLet's play ball!\nRegister at https://afrendli.com \nto confirm the score of one of your games!\nCoach Higgy";

  // use wordwrap() if lines are longer than 70 characters
  $msg = wordwrap($msg,70);

  // send email
  mail($inviteTeamEmail,"Welcome to Friendly",$msg);
  header("Location: schedule.php");
  }


  if($_POST["confirmScore"]){
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

    $confirmScore = $_POST["confirmScore"];

    $sql = "UPDATE games SET confirm ='yes' WHERE gameId=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $confirmScore);
    $stmt->execute();

  $stmt->close();
  $conn->close();
  header("Location: schedule.php");
  }

  if($_POST["deleteScore"]){
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

    $deleteScore = $_POST["deleteScore"];

    $sql = "DELETE FROM games WHERE gameId=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $deleteScore);
    $stmt->execute();

  $stmt->close();
  $conn->close();
  header("Location: schedule.php");
  }

  if($_POST["confirmGameRequest"]){
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

    $confirmGameRequest = $_POST["confirmGameRequest"];

    $sql = "UPDATE scheduleGame SET confirm ='yes' WHERE ScheduleGameId=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $confirmGameRequest);
    $stmt->execute();

  $stmt->close();
  $conn->close();
  header("Location: schedule.php");
  }

  if($_POST["deleteGameRequest"]){

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


    $deleteGameRequest = $_POST["deleteGameRequest"];

    $sql = "DELETE FROM scheduleGame WHERE ScheduleGameId=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $deleteGameRequest);
    $stmt->execute();

  $stmt->close();
  $conn->close();
  header("Location: schedule.php");
  }





////input from test3 for organization input!!!!
if($_POST["submitGameDay_2"]){
  $teamScore = $_POST["teamScore"];
  $teamScore = preg_replace('/[^0-9.]+/', '', $teamScore);
  $opponentName = $_POST["opponentName"];
  //echo $opponentName;
  $opponentScore = $_POST{"opponentScore"};
  $opponentScore = preg_replace('/[^0-9.]+/', '', $opponentScore);

  $gameDate = $_POST["gameDate"];
  $gameTime = $_POST["gameTime"];
  $location = $_POST["location"];
  //echo $gameTime;

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
  ////////////////pull opponent name from db to insert into games table

  $sql = "SELECT * FROM team WHERE teamName = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $opponentName);
  $stmt->execute();
  $result = $stmt-> get_result();
  $rowCountT = mysqli_num_rows($result);

    if ($result->num_rows >0)
      {
        while($row = $result->fetch_assoc())
         {
            $opponentId = $row["teamId"];
         }
         }




         $stmt = $conn->prepare("INSERT INTO games (teamId, teamName, teamScore, opponentId, opponentName, opponentScore, location, datex, timex, confirm) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
         $stmt->bind_param("ssississss", $teamId, $teamName, $teamScore, $opponentId, $opponentName, $opponentScore, $location, $gameDate, $gameTime, $confirm);
         $stmt->execute();
         //$stmt->close();
         //$conn->close();


  //if($opponentId == "unlisted"){header("location: https://www.google.com");}
  if($opponentId == ""){header("Location: unlistedTeam.php");}else{

  header("Location: schedule.php");}
  }

if($_POST["messageRead"]){
  $_SESSION["messageRead"]=$_POST["messageRead"];
  header("Location: message0.php");
}
?>
