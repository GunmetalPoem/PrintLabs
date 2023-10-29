<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>PrintLabs</title>
    <link rel="icon" type="image/x-icon" href="img/printing-device.png">
    <link rel="stylesheet" href="./css/main.css" />
    <link rel="stylesheet" href="./css/formal.css" />
    <link
      href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css"
      rel="stylesheet"
    />

    
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
 
    
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.wrapper{
    height: 100%;
    overflow: hidden;
}
body{
    background-color: #c5d6a6;
    background-image: linear-gradient(#f5b875 45%, #f6c27f);
    background-position: 115%, 25%;

}

video{
  margin-top: -50%;
  width: 50%;
  transform: translate(115%,25%);
}

form{
    height: 55%;
    width: 400px;
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
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
    font-family: 'Poppins', sans-serif;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 14px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: -10px;
    font-size: 12px;
    font-weight: 300;
    background-color: rgba(0, 0, 0, 0.028);
}

button{
    margin-top: 15%;
    width: 100%;
    background-color: #fc8b65;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}

::placeholder {
    color: #a78558;
    
}

p {
  color: #69569e;
  text-align: center;
  margin-top: 20%;
}
  
.nav{
  color: #b86449;
}

#signupbutton{
  color: #b86449;
  border-color: #b86449;
}


    </style>
</head>
<body>
    <div class="wrapper" >
        
          <div class="parallax__layer hero-text" style="background-color: rgba(0, 255, 255, 0);">
            <div class="parallax__group hero-container"></div>
            
            <img id="icon" src="img/printing-device.png" alt="icon" width="32" height="32" style="position: absolute; z-index: -1; top: 3%;left: 1%;" >
            <a href="index.php"><h2 id="logotitle">PrintLabs</h2></a>
            <video autoplay muted loop id="myVideo">
              <source src="img/villa.mp4" type="video/mp4">
            </video> 
            <ul>
            <li><a class="nav" href="index.php">Home</a></li>
            <li><a class="nav" href="#">About</a></li>
            <li><a class='nav' href='login.php'>Login</a></li>
             <li><a href='signup.php' id='signupbutton' class='btn'>Sign Up</a></li>  
          </ul>
            
             <form action="includes/login.inc.php" method="post">
                <h3>Login.</h3>
                
                <label for="username">Name</label>
                <input type="text" name="uid" placeholder="Username/Email">

                <label for="username">Password</label>
                <input type="password" name="pwd" placeholder="Password">

                <button type="submit" name="submit">Login</button>
                <?php
if (isset($_GET["error"])) {

if ($_GET["error"] == "emptyinput") {
echo "<p>Fill in all fields!</p>";
}

else if ($_GET["error"] == "wronglogin") {
  echo "<p>Incorrect login information!</p>";
  }


}
?>
             
            </form> 
         


          </div>
    
     
      </div>
</body>
</html>
<!-- partial -->
  
</body>
</html>
