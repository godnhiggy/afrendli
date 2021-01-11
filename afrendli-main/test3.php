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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




  <style>


  body {
    background-color: #2196F3; /* for browsers with no support of gradient*/
    /*background-image: linear-gradient(grey, white );*/
  }


  table {
    margin-left: auto;
    margin-right: auto;
  }
  #border {
    border: 1px solid black;
    border-radius: 4px;
  }

  #panel {
    border: 1px solid black;
    border-radius: 4px;
    background-color: grey;
    padding: 4px 10px 4px 10px;
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
              font-size: 10px ;
               text-align: center;
  }
  .header   { grid-area: 1 / 2 / 2 / 4;
    font: 14px Arial;
  }
  .logout   { grid-area: 1 / 4 / 2 / 5; }

  .menu     { grid-area: 2 / 1 / 3 / 5; }

  .subject  { grid-area: 3 / 1 / 4 / 5; }

  .main     { grid-area: 4 / 1 / 5 / 5; }



  #topleft {
     font: bold 9px Arial;
   }


  .round{
    box-shadow: 0px 0px 5px  black inset;
    border-radius: 3px;
    overflow: hidden;
    background-color: white;
    font-size: 12px;
    padding: 5px;
  }

  button {
   font: bold 9px Arial;
   width: 80px;
   padding: 0px 0px 0px 0px;
   height: 35px;
  }

  #medium {
    font-size: 20px;
  }
  </style>
  </head>
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


  <body>
    <div class="grid-container">
      <div class="topleft" id="topleft">
<?php echo $teamName; ?>
      </div>
      <div class="header">
        afrendli
        </div>
      <div class="logout"><a href="logout.php" class="button">Logout</a></div>

      <div class="menu" id="menu">
        <button onclick="window.location.href='schedule.php';">
      current<br> schedule
    </button>
    <button onclick="window.location.href='test3.php';">
    score a<br>past game
    </button>
    <button onclick="window.location.href='rank.php';">
    schedule a<br>future game
    </button>
    <button onclick="window.location.href='message0.php';">
    read<br>messages
    </button>



      </div>
    <div class="subject">
      <span id='opponentIdshow'>

        <form action="function.php" method="POST">
        <select required name='opponentName' id='opponentId'>
        <option value="" selected disabled>Who did you play?</option>
        <option value = "unlisted">Team not listed</option>
        <?php
        $arrlength = count($teamNames);
            for($x = 0; $x < $arrlength; $x++){
              //echo "<option value='".$opponentId[$x]."'>".$teamNames[$x]."</option>";
echo "<option value='".$teamNames[$x]."'>".$teamNames[$x]."</option>";
            }
        ?>
        </select>
      </span>
    </div>
    <div class="main">

<span id="medium">14u Fastpitch</span><br>



          <table id="border" class="center">
            <tr>ScoreBoard</tr>
        <tr>
          <td id="panel"><span id="us">Us</span><span style="display: none" id="usUpdated"><?php echo $teamName;?></span></td>

          <td id="panel"><span id="opponent">Opponent</span><span style="display: none" id="opponentUpdated"><?php echo $teamName;?></span></td>
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
<option value="blank" selected disabled>Organization Played Under</option>
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

<script>
$(document).ready(function(){
  //var end = this.value;
  $("#opponentId").change(function(){
$("#opponentUpdated").html(this.value);
    $("#usUpdated").show();


    $("#us").hide();
    $("#opponentUpdated").show();
    $("#opponent").hide();
  });
});
</script>

  </body>
</html>
