<?php
session_start();
$useremail = $_GET['useremail'];
//echo $useremail;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>afrendli login</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      table {margin-left: auto;
             margin-right: auto;}
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
    <?php
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
    $sql = "SELECT * FROM team WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $useremail);
    $stmt->execute();
    $result = $stmt-> get_result();

    while ($row = $result->fetch_assoc()){
      //echo "<br>";
      //echo $row['userName'], " text ", $row['teamId'], " text";
      $userName = $row["teamName"];
      //$_SESSION["teamId"] = $row["teamId"];
    }

    $stmt->close();
    ?>
  <body>
    <div class="grid-container">
    <div class="header">
      <h2>afrendli</h2>
    </div>
    <div class="menu" id="menu">

          <h3>Login to confirm the game with ....</h3>

    </div>
    <div class="subject">Login</div>
    <div class="main">

    <form action="/afrendli/server.php" method="post">

      <label for="userName">User Name:</label><br>
      <input type="text" id="userName" name="userName" value="<?php

      echo $userName;?>"><br><br>
      <label for="passWord">Password:</label><br>
      <input type="password" id="passWord" name="passWord" ><br><br>
      <input type="submit" name="submitLogin" value="Submit">
    </form>
  </div>
  </div>
  </body>
</html>
<?php session_destroy(); ?>
