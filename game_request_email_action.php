<?php
session_start();
if(!$_SESSION["success"]){
  die("Unable to connect to site");
}
echo "hello<br>";
$userName = $_SESSION["userName"];
$messageSender = $_SESSION["teamName"];
//$message = $_POST["message"];
$teamId = $_SESSION["teamId"];


$trial = $_POST["submitMessage"];
echo "<br>This is the Submit button value- ".$trial;
if($_POST["submitMessage"]){
echo "<br>this is in";
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



$date = $_POST["date"];
  $date = strtotime($date);
  $date = date("D, d M Y", $date);
$time = $_POST["time"];
  $time = strtotime($time);
  $time = date("g:i a", $time);

  echo "<br>This is the time value - ".$time."<br>";
$location = $_POST["location"];
$specialNotes = $_POST["specialNotes"];
//$afrendliMessage = $_POST["message"];
$array = $_POST["messageReceiver"];
$arrayMessageReceiver = $_POST['messageReceiverTeamName'];
$teamName = $_SESSION["teamName"];

echo "<br>";

print_r($array);

echo "<br>";

print_r($arrayMessageReceiver);

$sql = "SELECT * FROM team WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $opponentId);
$stmt->execute();
$result = $stmt-> get_result();



//print_r($array);

$arrlength = count($array);

for($x = 0; $x < $arrlength; $x++) {

        $useremail = $array[$x];
        $receiverTeamName = $arrayMessageReceiver[$x];

$to = $useremail;
$message = $msg;
$from = 'admin@coachhiggy.com';
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

if ((empty($to)) || (empty($message))) {
echo "Hello ".$teamName."...The message below has been sent to".$useremail."<br><br>";
echo "<br>Hello ".$useremail."!<br>";
echo $teamName." would like to know if you would like to schedule a game! <br>";
echo "Proposed Date: ".$date;
echo "<br>Proposed Time: ".$time;
echo "<br>Proposed location: ".$location;
echo "<br>Special Notes: ".$specialNotes;
echo "<br><a href='login_from_email.php/?useremail=".$useremail."'>Click to accept the game!</a>";

$message = "<br>Hello ".$useremail."!<br>";
$message.= $teamName." would like to know if you would like to schedule a game! <br>";
$message.= "Proposed Date: ".$date;
$message.= "<br>Proposed Time: ".$time;
$message.= "<br>Proposed location: ".$location;
$message.= "<br>Special Notes: ".$specialNotes;
$message.= "<br><a href='https://www.afrendli.com/login_from_email.php/?useremail=".$useremail."'>Click to Login and Respond to the game request!</a>";



}
//echo "<br><br>Everything is here<br> message sender -".$messageSender."<br>this is the message -".$message."<br>this is the receiver - ".$receiverTeamName;
mail("$to", "afrendli.com", "$message", "$headers");
//mail("ben@coachhiggy.com", "Hello this is a test", "This is the real test", "$headers");

$stmt = $conn->prepare("INSERT INTO messaging (messageSender, message, messageReceiver) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $messageSender, $message, $receiverTeamName);
$stmt->execute();
$stmt->close();
$conn->close();


}

}


 ?>
