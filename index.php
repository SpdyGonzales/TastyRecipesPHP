<?php
session_start()
?>
<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./styles/reset.css">
    <link rel="stylesheet" type="text/css" href="./styles/mainstyle.css">
    <link rel="stylesheet" type="text/css" href="./styles/index.css">
    <title>Tasty Recipes - Home</title>
  </head>
  <body class="header--fixed">
    <header>
      <nav id="navbar">
        <ul>
          <li><a class="activepg" href="index.php">Home</a></li>
          <li><a href="calendar.php">Calendar</a></li>
          <li><a class="dropdown">Recipes</a>
            <ul class="dropdown--menu">
              <li><a class="link" href="pancake.php">Pancakes</a></li>
              <li><a href="meatballs.php">Meatballs</a></li>
            </ul>
          </li>
          <?php if(isset($_SESSION['id'])): ?>
            <li><a href="logout.php">Logout <?php echo($_SESSION['first'])?></a></li>
          <?php else: ?>
          <li><a class="dropdown">SignUp/Login</a>
            <ul class="dropdown--menu">
              <li><form action="signup.php" method="POST">
                    <p>SignUp</p>
                    <input type="text" name="first" placeholder="Firstname"><br>
                    <input type="text" name="last" placeholder="Lastname"><br>
                    <input type="text" name="uid" placeholder="Username"><br>
                    <input type="password" name="pwd" placeholder="Password"><br>
                    <button type="submit">SIGNUP</button>
                  </form>
                  <form action="login.php" method="POST">
                  <p>Login</p>
                  <input type="text" name="uid" placeholder="Username"><br>
                  <input type="password" name="pwd" placeholder="Password"><br>
                  <button type="submit">LOGIN</button>
                  </form>
              </li>
            </ul>
          </li>
          <?php endif; ?>  
        </ul>
      </nav>
    </header>
    <article id="home" class="home--wrapper">
      <div class="welcometitle">
      <h1><span>Welcome to</span>
      Tasty Recipes</h1>
      </div>
        <div class="flexbox">
          <div id="picmeat" class="poster" title="Meatballs"></div>
          <div class="spacer"></div>
          <div id="picpancake" class="poster" title="Pancakes"></div>
        </div>
        <div class="spacer"></div>
        <div class="flexbox">
          <div id="picsoup" class="poster" title="Brocolli Soup"></div>
          <div class="spacer"></div>
          <div id="piccarrot" class="poster" title="Fresh Carrots"></div>
        </div>
    <div class="endspacer"></div>
  </article>
  </body>
</html>
