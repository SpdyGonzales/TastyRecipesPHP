<?php
session_start();
date_default_timezone_set('Europe/Stockholm');
include 'dbhmes.inc.php';
$xml=simplexml_load_file("./xml/recipes.xml") or die("Error: Cannot create object");
?>

<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./styles/reset.css">
    <link rel="stylesheet" type="text/css" href="./styles/mainstyle.css">
    <link rel="stylesheet" type="text/css" href="./styles/recipes.css">
    <title>Meatballs</title>
  </head>
  <body>
    <header>
      <nav id="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="calendar.php">Calendar</a></li>
          <li><a class="activepg" class="dropdown">Recipes</a>
            <ul class="dropdown--menu">
              <li><a href="pancake.php">Pancakes</a></li>
              <li><a class="activepg" href="meatballs.php">Meatballs</a></li>
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
    <article class="recipe">
      <?php 
      foreach ($xml->children() as $recipe) {
        if($recipe['name'] == 'meatballs') { ?>
        <?php var_dump($recipe->ingredient); ?>
        <div class="spacer"></div>
        <div class="flexbox">
          <div id="picmeat" class="poster" title="Meatballs with fresh salad"></div>
          <div class="textpos">
            <h1><?php echo $recipe->title; ?></h1>
            <div class="flexbox--column">
              <div class="flexbox--flexitem">
              <h2 class="list--title">Ingredients</h2>
              <ul>
              <?php foreach ($recipe->ingredient->li as $ingredient) { ?>
              <li><?php echo $ingredient; ?></li>
              <?php } ?>
            </ul>
              </div>
               <div class="spacer"></div>
               <div class="flexbox--flexitem">
               <h2 class="list--title">Directions</h2>
                  <ul>
                  <?php foreach ($recipe->recipetext->li as $recipetext) { ?>
                  <li><?php echo $recipetext; ?></li>
                  <?php } ?>
                  </ul> 
              </div>
            </div>
          </div>
        </div>
        </div>
        <?php }
      }
      ?>
       <div class="spacer"></div>
       <?php 
        include "comments.php";
       ?>
       <div class="spacer"></div>
    </article>
  </body>
</html>