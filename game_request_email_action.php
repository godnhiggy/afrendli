<?php
session_start();
if(!$_SESSION["success"]){
  die("Unable to connect to site");
}
//echo "hello<br>";
$userName = $_SESSION["userName"];
$messageSender = $_SESSION["teamName"];
//echo $messageSender;
//$message = $_POST["message"];
$teamId = $_SESSION["teamId"];


$trial = $_POST["submitMessage"];
//echo "<br>This is the Submit button value- ".$trial;
if($_POST["submitMessage"]){
//echo "<br>this is in";
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

//echo "hello";

$date = $_POST["date"];
  $date = strtotime($date);
  $date = date("D, d M Y", $date);
$time = $_POST["time"];
  $time = strtotime($time);
  $time = date("g:i a", $time);

  //echo "<br>This is the time value - ".$time."<br>";
$location = $_POST["location"];
$specialNotes = $_POST["specialNotes"];
//$afrendliMessage = $_POST["message"];
$array = $_POST["messageReceiver"];
$arrayMessageReceiver = $_POST['messageReceiverTeamName'];
$teamName = $_SESSION["teamName"];
//print_r($array);
//echo "<br>";

//print_r($array);

//echo "<br>";

//print_r($arrayMessageReceiver);




//print_r($array);

$arrlength = count($array);

for($x = 0; $x < $arrlength; $x++) {

        $receiverName = $array[$x];
        $receiverTeamName = $arrayMessageReceiver[$x];

$to = $receiverName;
//echo "<br>receiverName ----".$receiverName;

///////////////////////////do i need this?
$sql = "SELECT * FROM team WHERE teamName = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $receiverName);
$stmt->execute();
$result = $stmt-> get_result();
$rowCountT = mysqli_num_rows($result);

if ($result->num_rows >0)
  {
    while($row = $result->fetch_assoc()) {
    $receiveremail = $row["email"];
  }
}
/////////////////////////////
//echo $receiveremail;

//echo "<br> hello three times<br>";


//$message = $msg;
$from = 'admin@coachhiggy.com';
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

if ((empty($to)) || (empty($message))) {
//echo "Hello ".$receiverTeamName."...The message below has been sent to".$useremail."<br><br>";
//echo "<br>Hello ".$useremail."!<br>";
//echo $teamName." would like to know if you would like to schedule a game! <br>";
//echo "Proposed Date: ".$date;
//echo "<br>Proposed Time: ".$time;
//echo "<br>Proposed location: ".$location;
//echo "<br>Special Notes: ".$specialNotes;
//echo "<br><a href='login_from_email.php/?useremail=".$useremail."'>Click to accept the game!</a>";

$message = "Hello ".$useremail."!<br>".$teamName." would like to know if you would like to schedule a game! <br>";
//$message.= $teamName." would like to know if you would like to schedule a game! <br>";
$message.= "Proposed Date: ".$date;
$message.= "<br>Proposed Time: ".$time;
$message.= "<br>Proposed location: ".$location;
$message.= "<br>Special Notes: ".$specialNotes;

$emailMessage = $message;
//$message.= "<br><a href='https://www.afrendli.com/login_from_email.php/?useremail=".$useremail."'>Click to Login and Respond to the game request!</a>";
$emailMessage.= "<br><a href='https://www.afrendli.com'>Click to Login and Respond to the game request!</a>";

//echo "this is the message ----".$message;
}


//echo $receiveremail." to - ".$to;
//echo "<br><br>Everything is here<br> message sender -".$messageSender."<br>this is the message -".$message."<br>this is the receiver - ".$receiverTeamName;
mail("$receiveremail", "afrendli.com", "$emailMessage", "$headers");
//mail("ben@coachhiggy.com", "Hello this is a test", "This is the real test", "$headers");
//echo "<br> this is the logged in person -----".$messageSender."<br>";
//echo "<br> this is the receiver---- ".$useremail;
//$message = $specialNotes;
//echo "<br> this is the message ----".$message;
//echo "<br> this is the message ----".$messageSender;
$stmt = $conn->prepare("INSERT INTO scheduleGame (messageSender, messageReceiver, datex, timex, location, specialNotes) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $messageSender, $receiverName, $date, $time, $location, $specialNotes);
$stmt->execute();

//$message = "this is for a test";
//echo $message;
//echo "<br>".$messageSender;
//echo "<br>".$receiveremail;



$servername = "localhost";
$username = "bjekqemy_higgy";
$password = "Brett73085";
$dbname = "bjekqemy_ball";
$conn = "";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//print_r($conn);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$stmt = $conn->prepare("INSERT INTO $messageSender (message, receiver) VALUES (?, ?)");
$stmt->bind_param("ss", $message, $receiverName);
$stmt->execute();
$_SESSION["receiveremail"] = $receiveremail;

}
//echo "<form method='POST' action='message_page.php'>";
//  echo  "<input type='submit' name='team2' value='".$receiver."' id='submit'/>";

//echo "</form>";

header('location: message0.php');
//window.location.replace("message0.php");
}
/////////////////////message log submission


 ?>
