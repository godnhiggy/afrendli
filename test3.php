<?php
session_start();
if(!$_SESSION["success"]){header('location: login.php');}
$userName = $_SESSION["userName"];
$teamName = $_SESSION["teamName"];
$teamId = $_SESSION["teamId"];
//echo "THIS IS THE TEAM ID>>>>>".$teamId;
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
  <title>afrendli score game</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>jQuery UI Datepicker - Default functionality</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
  $( "#datepicker" ).datepicker();
} );
</script>




  <style>
  table {
    margin-left: auto;
    margin-right: auto;
  }
 .small {
    font-size: 12px;
 }

.middle {
  font-size: 23px;
  font-weight: bold;
  }
  a.color {
    color: black;
    align: right;
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

  .round{
    box-shadow: 0px 0px 5px  black inset;
    border-radius: 3px;
    overflow: hidden;
    background-color: white;
    font-size: 12px;
    padding: 5px;
  }
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
    <div class="subject"><span class="middle">Score a Game</span><br>
<span class="small"> <b>Submit</b> the game score...</span><br><span class="small"> ...and let your opponent <b>Confirm</b>!</span><br><br>
    </div>
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


        <form action="function.php" method="POST">
          <table class="center">

        <tr>
          <td class="round" ><?php echo $teamName;?></td>

          <td align="center"><select id="inputid" name='opponentId' id='opponentId' required>
            <option value="" selected disabled>Choose Opponent</option>
            <option value = "unlisted">Team not listed</option>
            <?php
            $arrlength = count($teamNames);
                for($x = 0; $x < $arrlength; $x++){
                  echo "<option value='".$opponentId[$x]."'>".$teamNames[$x]."</option>";
                }
            ?>
            </select>
          </td>
        </tr>
        <tr>
          <td align="center"><input type="number" id="inputid" size="2" name="teamScore" required min="0" max="99"></td>
          <!--<td align="right"><label id="inputid" for="opponentScore">Their Score:</label></td>-->
          <td align="center"><input id="inputid" type="number" id="opponentScore" size="2" name="opponentScore" required min="0" max="99"></td>
        </tr>
        <tr>
        <td class="small">our score</td>
        <td class="small">their score</td>
        </tr>
</table>
<br><br><br>
<table class="center">
<tr><td align="right"><label id="inputid" for="gameDate">Date of Game</label></td>
<td align="left"><input type="date" placeholder="mm-dd-yyyy" id="gamedate" name="gameDate" size="10" required></td></tr>
<tr height="5px>">
</tr>
<tr><td align="right"><label id="inputid" for="gameTime">Game Time</label></td>
<td align="left"><input type="time" id="gameTime" size="10" name="gameTime" required> </td></tr>
</table>

<br><br><br>


<select name='location' id='location' required>
<option value="blank" selected disabled>Choose Location</option>
<option value="afrendli" >just afrendli game</option>
<option value="asa" >ASA</option>
<option value="gsa" >GSA</option>
<option value="usfa" >USFA</option>
<option value="usssa" >USSSA</option>
<option value="little league" >Little League</option>
<option value="nsa" >NSA</option>
<option value="other" >other</option>

</select>
<br><br>

<!--<p>Date: <input type="text" id="datepicker"></p>-->

        <input id="inputid" type="submit" name="submitGameDay_2" value="Submit">







      </form>
      </div>

</div>
  </body>
</html>
