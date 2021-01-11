<?php
session_start();
$userName = $_SESSION["userName"];
$teamName = $_SESSION["teamName"];
$message = $_POST["message"];
$teamId = $_SESSION["teamId"];
if($_POST["submitMessageAction"]){
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

  $stmt = $conn->prepare("INSERT INTO messaging (teamOne, message) VALUES (?, ?)");
  $stmt->bind_param("ss", $teamName, $message);
  $stmt->execute();
  $stmt->close();
  $conn->close();
echo "this is working";
echo $teamName;
echo $message;
}
 ?>
