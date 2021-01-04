<?php
session_start();
if(!$_SESSION["success"]){header('location: login.php');}

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


$userName = $_SESSION["userName"];
$teamName = $_SESSION["teamName"];
$teamId = $_SESSION["teamId"];
if($_POST["team2"]){
$team2 = $_POST["team2"];}
if($_POST["team2a"]){
$team2 = $_POST["team2a"];}
if(isset($_SESSION["messageRead"])){
  $team2 = $_SESSION["messageRead"];
  unset($_SESSION["messageRead"]);
}
if(isset($_SESSION["receiveremail"])){
  $team2 = $_SESSION["receiveremail"];





  $sql = "SELECT teamName FROM team WHERE email='$team2' LIMIT 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
            {

      // output data of each row
      while($row = $result->fetch_assoc()) {
         // $totalwordcount = str_word_count($row["essay"]);
          $team2 = $row["teamName"];
      }
      unset($_SESSION["receiveremail"]);
  }



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
           grid-template-columns: 70px 85px 85px 85px;
           /*grid-gap: 3px;*/
           background-color: #2196F3; /* for browsers with no support of gradient */
           background-image: linear-gradient(grey, white );
           /*padding: 3px;*/
           justify-content: center;
           width: 340px;
           margin:auto;
           }

         .grid-container > div {
           width: 100%; /* try different value for this */
           margin: auto;
           justify-content: center;
           text-align: center;
           /*padding: 5px 0;*/
           font-size: 15px;
           /*border: 1px solid red;*/
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

         .mainL    { grid-area: 4 / 1 / 5 / 2;
           justify-content: left;
           text-align: left;
           vertical-align: top;
           /*height: 100%;*/

           white-space: wrap;
           height:600px;
           overflow: hidden;


         }
         .mainR     { grid-area: 4 / 2 / 5 / 5;
           height: 600px;
           margin-top: 5px;
           overflow: hidden;
           }

         #topleft {
            font: bold 9px Arial;
          }

         #bold {
            font: bold 10px Arial;
         }
         #smallR {
            font: 8px Arial;
            text-align: right;
            float: right;
          }

         #smallL {
            font: 8px Arial;
            text-align: left;
            float: left;

         }



         #whitediv {
           background-color: white;
           border-radius: 0px;
           text-align: left;
          /* height: 100%;*/
          margin:auto;

                      white-space: wrap;
                      height:500px;
                      width:260px;
                      overflow: auto;

         }
         input {
           font: bold 10px Arial;
           width: 58px;
           padding: 0px 0px 15px 0px;
           height: 17px;
           overflow: hidden;
           text-overflow: ellipsis;
         }
         ul {
              text-align: left;
              justify-content: left;
              list-style-type: none;
              margin: 0;
              padding: 0;
         }

         #messageButton {
           width: 100px;
         }

         #rightalign {
           border-top: 1px solid #CCCCCC;
           border-right: 1px solid #333333;
           border-bottom: 1px solid #333333;
           border-left: 1px solid #CCCCCC;
           border-radius: 6px;
           float: right;
           background-color: lightgreen;
           font: 11px Helvetica, sans-serif;
           width: 61%;
           display: inline-block;
           padding-left: 5px;
           }

         #leftalign {
           border-top: 1px solid #CCCCCC;
           border-right: 1px solid #333333;
           border-bottom: 1px solid #333333;
           border-left: 1px solid #CCCCCC;
           border-radius: 6px;
           float: left;
           background-color: lightblue;
           font: 11px Helvetica, sans-serif;
           width: 61%;
           display: inline-block;
           padding-left: 5px;

           }

         button {
          font: bold 9px Arial;
          width: 75px;
          padding: 0px 0px 0px 0px;
          height: 35px;
         }

         #medium {
           font-size: 20px;
         }
  </style>
  <script>
  //this removes the alert box to resubmit data on browser refresh
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
  </head>
<!-- <meta http-equiv="refresh" content="3" >-->
<?php
if(!empty($_POST["message"]) && (!empty($_POST["team2a"]))){

  $team2 = $_POST["team2a"];
  $_SESSION["team2"] = $team2;
  $team2 = $_SESSION["team2"];




//echo "we are inside the submitmessagelog";
  $message = $_POST["message"];
  $messageReceiver = $_POST["messageReceiver"][0];
  //echo "this is the message ".$message."<br>";
  //echo "this is the receiver ".$messageReceiver."<br>";


$stmt = $conn->prepare("INSERT INTO $teamName (message, receiver) VALUES (?, ?)");
$stmt->bind_param("ss", $message, $team2);
$stmt->execute();
//$_SESSION["message"] = $message;
//$_SESSION["messageReceiver"] = $messageREceiver;
//header("Location: message_log.php");

//echo $_POST["submitMessageLog"];
//echo "we are inside the submit message log post loop";
}


 ?>

  <body>
    <div class="grid-container">
      <div class="topleft" id="topleft">
<?php echo $teamName; ?>
      </div>
      <div class="header">
        afrendli
        </div>
      <div class="logout"><a href="logout.php" class="button">Logout</a>
      </div>

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
<span id="medium">14u Fastpitch</span><br>
Message Center
      </div>
    <div class="mainL" >

<ul>
      <?php
      $servername = "localhost";
      $dbusername = "bjekqemy_higgy";
      $password = "Brett73085";
      $dbname = "bjekqemy_ball";
      //echo $sender $receiver $message;
      $conn = new mysqli($servername, $dbusername, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }
  echo "<form method='POST' action='message0.php'>";
      //$sql = "SELECT DISTINCT receiver FROM $teamName";
      $sql = "SELECT * FROM team ORDER BY teamName ASC";
      $result = $conn->query($sql);
      if ($result->num_rows > 0)
                {

          // output data of each row
          while($row = $result->fetch_assoc()) {
             // $totalwordcount = str_word_count($row["essay"]);


              $receiver = $row["teamName"];

          echo  "<li><input type='submit' name='team2' value='".$receiver."' id='submit'/></li>";
          //echo  "<br>";

          }
       }
echo "</form>";
                  ?>
                </ul>
    </div>
    <div class="mainR" >
<div id="topleft">

      <form method="POST" action="message0.php">
      <textarea rows="2" cols="30" name="message" autofocus maxlength="100" placeholder="send afrendli message!"></textarea>
      <input id="messageButton" type="submit" name="submitMessageLog" value="send message">
      <input type="hidden" name="team2a" value="<?php echo $team2;?>">

      </form>
      <?php
      echo "<br>".$team2."<br>";
      //echo "<br>".$team2."<br>";
echo "</div><div id='whitediv'>";
      function array_push_assoc($array, $key, $value){
      $array[$key] = $value;
      return $array;
      }

        $servername = "localhost";
        $dbusername = "bjekqemy_higgy";
        $password = "Brett73085";
        $dbname = "bjekqemy_ball";
        //echo $sender $receiver $message;
        $conn = new mysqli($servername, $dbusername, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
        }
      //echo "<form method='POST' action='message0.php'>";

      //////pull from team1 or teamname table
        $sql = "SELECT DISTINCT * FROM $teamName WHERE receiver='$team2'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
                  {

            // output data of each row
            while($row = $result->fetch_assoc()) {
               // $totalwordcount = str_word_count($row["essay"]);
               $sender = $teamName;
               $msgTimeStamp = $row["timestamp"];
                $message = $row["message"];

                $arrayA = [$message => $sender];
                $myarray = array_push_assoc($myarray, $msgTimeStamp, $arrayA);

                  //$myarray = array_push_assoc($myarray, $msgTimeStamp, $message);

              //  }

            }
         }
      /////pull from team2 table
         $sql = "SELECT DISTINCT * FROM $team2 WHERE receiver='$teamName'";
         $result = $conn->query($sql);
         if ($result->num_rows > 0)
                   {

             // output data of each row
             while($row = $result->fetch_assoc()) {
                // $totalwordcount = str_word_count($row["essay"]);

                $sender = $team2;
                $msgTimeStamp = $row["timestamp"];
                 $message = $row["message"];

                 $arrayA = [$message => $sender];
                 $myarray = array_push_assoc($myarray, $msgTimeStamp, $arrayA);

              //   }
           }
        }



//echo "<pre>";
//      print_r($myarray);
//echo "</pre>";
      krsort($myarray);
      //foreach ($myarray as $totalTeamRank => $arrayRankEmail) {
        //foreach($arrayRankEmail as $email=>$newTeamId){

          foreach ($myarray as $msgTimeStamp => $arrayA) {
            foreach($arrayA as $message=>$sender){



        $d=strtotime($msgTimeStamp);
        $day = date("D", $d);
        $date = date("M d", $d);
        if($sender!==$teamName){


      echo "<p><span id='rightalign' style='font-size:12px;'> <span id='smallR'>".$sender." ".$date.":</span><br><span>".$message."</span></span></p>";
        }else{
      echo "<p><span id='leftalign' style='font-size:12px;'> <span id='smallL'>".$sender." ".$date.":</span><br><span>".$message."</span></span></p>";
    }


    }
echo "<span><br></span>";
  }
      unset($msgTimeStamp);
      unset($message);
      unset($date);
      unset($sender);

      ?>
    </div>
    </div>
    </div>
  </body>
</html>
