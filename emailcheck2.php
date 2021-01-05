<?php
$email = $_POST['search'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bjekqemy_ball";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT * FROM team WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

  }
} else {

}

$conn->close();
?>

<?php


if (isset($_POST['submit']))
{

$newTeamName = $_POST['newTeamName'];
$newPassword = $_POST['newPassword'];
$newPassword2 = md5($newPassword);
$verifiedEmail = $_POST['emailverify'];
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bjekqemy_ball";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "UPDATE team SET teamName = '$newTeamName', password = '$newPassword2' WHERE email='$verifiedEmail' ";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }

  $conn->close();

}



?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>afrendli score game</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  body {
    background-color: #2196F3; /* for browsers with no support of gradient*/
    /*background-image: linear-gradient(grey, white );*/
  }

  table {margin-left: auto;
         margin-right: auto;}
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
           font-size: 25px;

         }
         .topleft  { grid-area: 1 / 1 / 2 / 2;
                     font-size: 18px;

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
      <div class="topleft"><a href="register.php" class="color">Register</a></div>
      <div class="header">
        <h2>afrendli</h2>
        </div>
      <div class="logout"><a href="login.php" class="color">Login</a></div>

      <div class="menu" id="menu">
 <!--<a href="test3.php">Scoring a Game</a>&nbsp;&nbsp;
          <a href="rank.php">Positioning</a> &nbsp;&nbsp;
           <a href="schedule.php">Schedule</a> &nbsp;&nbsp;
           <a href="unlistedTeam.php">Invite a Team</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
-->
      </div>
      <div class="subject"></div>
    <div class="main">
      Helping you find the right competition!
      <br>
    <form action="" method="post" action="emailcheck2.php">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>
<center>
<table border="1">
<tr>
<td colspan="2"><b><font color='Red'>Edit Records </font></b></td>
</tr>
<tr>
<td width="179"><b><font >New UserName<em>*</em></font></b></td>
<td><label>
<input class="textinput button1" type="text" name="newTeamName"/>
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>New Password<em>*</em></font></b></td>
<td><label>
<input class="textinput button1" type="text" name="newPassword"/>
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>Current Email<em>*</em></font></b></td>
<td><label>
<input class="textinput button1" type="text" name="emailverify"/>
</label></td>
</tr>

<tr align="Right">
<td colspan="2"><label>
<center>
<input class="button button1"type="submit" name="submit" value="Edit Records">
</center>
</label></td>
</tr>
</table>
</center>
</form>
    </div>
    </div>
  </body>
</html>
