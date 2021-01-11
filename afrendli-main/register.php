<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>afrendli register</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  body {
    background-color: #2196F3; /* for browsers with no support of gradient*/
    /*background-image: linear-gradient(grey, white );*/
  }
  table {margin-left: auto;
         margin-right: auto;
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
        /* .topleft  { grid-area: 1 / 1 / 2 / 2;
                     font-size: 14px;
         }*/
         .header   { grid-area: 1 / 1 / 2 / 5;
           font: 14px Helvetica, sans-serif;
         }
        /* .logout   { grid-area: 1 / 4 / 2 / 5; }*/

         .menu     { grid-area: 2 / 1 / 3 / 5; }

         .subject  { grid-area: 3 / 1 / 4 / 5; }

         .main     { grid-area: 4 / 1 / 5 / 5; }

         .bottom     { grid-area: 5 / 1 / 6 / 5; }

         table td + td { border-left:0px solid transparent; }

         .button {
         font: 6px Helvetica, sans-serif;
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
  </style>
  </head>
  <body>
    <div class="grid-container">
    <div class="header">
      <h2>afrendli</h2>
    </div>
    <div class="menu" id="menu">
        <a href="login.php" class="button">Need to Login?</a>

    </div>
    <div class="subject"></div>
    <div class="main">
      <form action="server.php" method="post">
        <table class="center">
          <tr>
            <td align="right"><label for="teamName"><b>Team Name</b></label></td>
            <td></td>
            <td align="left"><label for="userName"><b>Coach Name</b></label></td>
          </tr>
        <!--  <tr height="25px>">
        </tr>-->
        <tr>
          <td align="right"><input style="text-align: right" type="text" id="teamName" name="teamName" required size="10" maxlength="20"></td>
          <td align="center"><font size="5">_</font></td>
          <td align="left"><input type="text" id="userName" name="userName" required size="10" maxlength="20"></td>
        </tr>
        <tr>
          <td align="right"><label for="password_1">Password:</label></td>
          <td></td>
          <td align="left"><input type="password" id="password_1" name="password_1" required size="10"maxlength="20" ></td>
        </tr>
        <tr>
          <td align="right"><label for="password_2">Confirm Password:</label></td>
          <td></td>
          <td align="left"><input type="password" id="password_2" name="password_2"required size="10"maxlength="20"></td>
        </tr>
        <tr>
          <td align="right"><label for="email">Email:</label></td>
          <td></td>
          <td align="left"><input type="text" id="email" name="email" required size="10"></td>
        </tr>
        <tr>
          <td align="right"><label for="textNumber">Text Msg Number:</label></td>
          <td></td>
          <td align="left"><input type="phone" id="textNumber" name="textNumber" maxlength="10" size="10"></td>
        </tr>
        <tr>
          <td align="right"><label for="sport">Sport:</label></td>
          <td></td>
          <td align="left"><select name="sport" id="sport" required>
                              <option value="" selected disabled> -- select an option -- </option>
                              <option value="softball">Softball</option>
                              <option value="baseball">Baseball</option>
                            </select></td>
        </tr>
        <tr>
          <td align="right"><label for="ageGroup">Age Group:</label></td>
          <td></td>
          <td align="left"><select name="ageGroup" id="ageGroup" required>
                              <option value="" selected disabled> -- select an option -- </option>
                              <option value="6" disabled>6u</option>
                              <option value="7" disabled>7u</option>
                              <option value="8" disabled>8u</option>
                              <option value="9" disabled>9u</option>
                              <option value="10" disabled>10u</option>
                              <option value="11" disabled>11u</option>
                              <option value="12" disabled>12u</option>
                              <option value="13" disabled>13u</option>
                              <option value="14">14u</option>
                              <option value="15" disabled>15u</option>
                              <option value="16" disabled>16u</option>
                              <option value="17" disabled>17u</option>
                              <option value="18" disabled>18u</option>

                            </select></td>
        </tr>

      </table>

      <br><br>
    <input type="submit" name="submitRegister" value="Submit">
  </form>

  </div>
  <div class="bottom">
    <?php
      if(isset($_SESSION["emailError"])){
        echo "Email already in use....please re-register!";
        unset($_SESSION['emailError']);
      }
      echo "<br>";
      if(isset($_SESSION["teamNameError"])){
        echo "Team Name already in use....please re-register!";
        unset($_SESSION['teamNameError']);
      }
     ?>
  </div>
</div>
  </body>
</html>
