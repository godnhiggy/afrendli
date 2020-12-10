<?php
session_destroy();
session_start();
///This is a test comment
//include('db_build.php');
//$_POST['reg_user'] = "trial_post1";
//$_SESSION["username"] = $_POST["username"];
// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database


$db = mysqli_connect('localhost', 'bjekqemy_higgy', 'Brett73085', 'bjekqemy_ball')or die("cannot connect");
// Check connection

if ($db->connect_error) {
  echo "db not working";
   //die("Connection failed: " . $db->connect_error);
}
//else {echo "connection made to test for registered user<br>";}
//echo "working1";
// REGISTER USER
if (isset($_POST['submitRegister'])) {
  // receive all input values from the form
//echo "working2";
  $username = mysqli_real_escape_string($db, $_POST['userName']);
$sender_name = $_POST['userName'];
$email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $textNumber = mysqli_real_escape_string($db, $_POST['textNumber']);
  $sport = mysqli_real_escape_string($db, $_POST['sport']);
  $ageGroup = mysqli_real_escape_string($db, $_POST['ageGroup']);
  $teamName = mysqli_real_escape_string($db, $_POST['teamName']);
  $teamName = $teamName.".".$username;
  //echo $teamName;

	build_tables($sender_name);

function build_tables($myUserName){
$servername = "fdb27.biz.nf";
$username = "3650290_database";
$password = "trashcan1";
$dbname = "3650290_database";


// Check connection to build tables for app
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sender_name = $myUserName;
// sql to create CUSTOMERS table
$sql = "CREATE TABLE $myUserName (
id INT UNSIGNED AUTO_INCREMENT,
message VARCHAR(200) NOT NULL,
reciever VARCHAR(30) NOT NULL,
timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
primary key (id))";


if ($conn->query($sql) === TRUE) {
  echo "Table Name created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

}


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); echo "Username is required"; }
  if (empty($email)) { array_push($errors, "Email is required"); echo "Email is required";}
   if (empty($password_1)) { array_push($errors, "Password is required"); echo "Password is required"; }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  echo "Passwords do not match";
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM team WHERE userName='$username' OR email='$email' or teamName = '$teamName' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
     // if user exists
  //  if ($user['userName'] === $username) {
  //    array_push($errors, "Username already exists");
  //    echo "Username already exists";
  //  }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
      echo "Email already exists";
    }

    if ($user['teamName'] === $teamName) {
      array_push($errors, "Team Name already exists");
      echo "Team Name already exists";
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database
    $stmt = $db->prepare("INSERT INTO team (userName, passWord, email, textNumber, sport, ageGroup, teamName) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssis", $username, $password, $email, $textNumber, $sport, $ageGroup, $teamName);
    $stmt->execute();


    $sql = "select * from team where userName=? LIMIT 1";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt-> get_result();

    while ($row = $result->fetch_assoc()){
    	//echo "<br>";
    	//echo $row['userName'], " text ", $row['teamId'], " text";
      $teamId = $row["teamId"];
      $_SESSION["teamId"] = $row["teamId"];

    }
    //$stmt->close();
    //$conn->close();
    //header("Location: test3.php");
  	//$query = "INSERT INTO team (userName, passWord, email, textNumber, sport, ageGroup, teamName)
  	//		  VALUES('$username', '$passWord', '$email', '$textNumber', '$sport', '$ageGroup', '$teamName')";
  	//mysqli_query($db, $query);
  	$_SESSION['userName'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    $_SESSION["teamName"] = $teamName;
    $_SESSION['ageGroup']=$ageGroup;
    $_SESSION['sport']=$sport;

    //echo "<br>Apparently registered and db built";
  	header('location: test3.php');
  }
}
$teamName = $_SESSION["teamName"];
// ...
//echo "working3".$teamName;
// ...

// LOGIN USER
if (isset($_POST['submitLogin'])) {

  $username = mysqli_real_escape_string($db, $_POST['userName']);
  $password = mysqli_real_escape_string($db, $_POST['passWord']);
  //echo "we are in as ".$username;
  $sql = "SELECT * FROM team WHERE teamName=? LIMIT 1";
  $stmt = $db->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt-> get_result();

  while ($row = $result->fetch_assoc()){
    //echo "<br>";
    //echo $row['userName'], " text ", $row['teamId'], " text";
    $teamId = $row["teamId"];
    $_SESSION["teamId"] = $row["teamId"];
  }

  $stmt->close();

//echo "<br> this is inside the login script";
  if (empty($username)) {
  	array_push($errors, "Username is required");
    echo "UserName is required";
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
    echo "Password is required";
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM team WHERE teamName='$username' AND passWord='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {

  	  $_SESSION['userName'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
      $_SESSION['ageGroup']=$ageGroup;
      $_SESSION['sport']=$sport;
//echo "werkin";

    while ($row = $results->fetch_assoc()){
            $sport = $row["sport"];
            $teamName = $row["teamName"];
            $_SESSION["teamName"] = $teamName;
            $userName = $row["userName"];
            $_SESSION["userName"] = $userName;
            $ageGroup = $row["ageGroup"];
            $_SESSION["ageGroup"] = $ageGroup;
            $sport = $row["sport"];
            $_SESSION["sport"] = $sport;
    }
    header('location: test3.php');
  	}else {
  		echo "Wrong username/password combination";
  	}
  }


}


?>
