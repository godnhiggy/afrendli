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


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Edit Info</title>
</head>
<style>
.textinput {
background-color: white; /* Green */
border: none;
color: black;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin: 4px 2px;
cursor: pointer;
-webkit-transition-duration: 0.4s; /* Safari */
transition-duration: 0.4s;
}
.button {
background-color: black; /* Green */
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin: 4px 2px;
cursor: pointer;
-webkit-transition-duration: 0.4s; /* Safari */
transition-duration: 0.4s;
}
.button1 {
box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
body {
font-family: Arial;
margin: 0;
}

/* Header/Logo Title */
.header {
padding: 1px;
text-align: center;
background: #1abc9c;
color: white;
font-size: 30px;
}
</style>
<body>
  <div class="header">
  <h1>Afrendli</h1>
  </div>


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
</body>
</html>
