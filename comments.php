<?php 
session_start(); 
include "comments.inc.php";
?>     
       <div class="comments--wrapper">
        <h2>Comment section - Give your feedback!</h2>
        <?php
          echo"<form method='POST' action=''>
            <input type='hidden' name='uid' value='".$_SESSION['uid']."'>
            <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
            <textarea name='message'></textarea>
            <input type='submit' name='commentSubmit'>
          </form>";
          if(!isset($_POST['commentSubmit'])){
              getComments($conn, $recipesite);
          }
        ?>
        <?php
        if(isset($_POST['commentSubmit'])){
          setComments($conn, $recipesite);
        }
        ?>
       </div>
