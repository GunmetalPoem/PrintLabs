<!-- DISPLAY CURRENT SENTOUT MESSAGE, STL, username, usersEmail, badge -->
<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css" />

    <title>PrintLabs</title>
    <link rel="icon" type="image/x-icon" href="img/printing-device.png">
    <style>
      /* FONTS */
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Silkscreen&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Lexend&display=swap');

    </style>
</head>
<style>
   body{
    background-color: #2d94b1;
    overflow-y: hidden;

   }

   video{
  margin-top: -50%;
  width: 50%;
  transform: translate(115%,150%);
}


.box{
    height: 55%;
    width: 800px;
    background-color: rgba(255, 255, 255, 0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.6);

    padding: 50px 35px;
}

.username{

  font-size: 40px;
  margin-bottom: 2%;
  border-bottom: 5px solid #85cfd4;
}

.uid{
  color:#ffbb98;
  font-size: 20px;
  margin-bottom: 1%;
  margin-top: 6%;

}

.email{
  color:#ffbb98;
  font-size: 20px;
  margin-bottom: 1%;
  margin-top: 2%;

}

.badge{
  color:#ffbb98;
  font-size: 20px;
  margin-bottom: 1%;
  margin-top: 2%;

}

.comment{
  font-weight: 100;
  font-style: italic;
}

#logotitle{
    color: #ffffff;
    left: 3%;
    top: 2%;
    font-family: 'Silkscreen', cursive;
    font-size: 15px;
    position: relative;
    width: fit-content;
text-decoration: none;
  }
</style>
<body>
  <img id="icon" src="img/printing-device.png" alt="icon" width="32" height="32" style="position: absolute;  top: 2%;left: 1%;">
  <?php
if (isset($_SESSION["badgecheck"])) {

    
    
 if ($_SESSION["badgecheck"] == 'creator'){
          echo "<a id='logotitle' href='cdashboard.php'><h2>PrintLabs Profile</h2></a>";
     
        }

if ($_SESSION["badgecheck"] == 'printor'){
            echo "<a id='logotitle' href='pdashboard.php'><h2>PrintLabs Profile</h2></a>";
          }

       


  }
?><video autoplay muted loop id="myVideo">
              <source src="img/paris.mp4" type="video/mp4">
            </video> 


            <div class="box">
<?php 

if (isset($_SESSION["username"])) {

echo "<p class='username'>" . $_SESSION["username"] ."'s User Info</p>";

}
?>

<?php 
if (isset($_SESSION["username"])) {

    echo "<p class='uid'> Username: " . $_SESSION["useruid"] ."</p>";
    
    }
    ?>
    <p class="comment">Your username is exactly what other PrintLabs Creators or Printors use to contact you when sending you a message. They type your username in the recipient box of send message.</p>
<?php
  if (isset($_SESSION["username"])) {

        echo "<p class='email'> Email: " . $_SESSION["email"] ."</p>";
        
        }
?>
    <p class="comment">Just here to let you know what your email is.</p>

<?php

    if (isset($_SESSION["username"])) {

            echo "<p class='badge'> Account Type: " . $_SESSION["badgecheck"] ."</p>";
            
            }


?>
    <p class="comment">This is the type of account you have. </p>

</div>

</body>
</html>