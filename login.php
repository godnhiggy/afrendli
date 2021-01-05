<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>afrendli login</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
      background-color: #2196F3; /* for browsers with no support of gradient*/
      /*background-image: linear-gradient(grey, white );*/
    }
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

             .button {
             font: 6px Arial;
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

          <a href="register.php" class="button">Need to Register?</a>
          <a href="emailsend.html" class="button">Need Reset Info</a>

    </div>
    <div class="subject"></div>
    <div class="main">

    <form action="server.php" method="post">

      <label for="userName">User Name:</label><br>
      <input type="text" id="userName" name="userName" ><br><br>
      <label for="passWord">Password:</label><br>
      <input type="password" id="passWord" name="passWord" ><br><br>
      <input type="submit" name="submitLogin" value="Login">
    </form>
  </div>
  </div>
  </body>
</html>
