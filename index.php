<?php 
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/main.css" />
    <link
      href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css"
      rel="stylesheet"
    />
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



::-webkit-scrollbar {
  width: 10px;

  
}

::-webkit-scrollbar-track {
  background: #212525;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
  border-radius: 1cm;
}

html {
    scroll-behavior:smooth;
   }

#hero{

  position: absolute;
  left: -10%;
  z-index: -2;
  top:-25% ;
}

#herotext {
  font-family: 'Lexend', sans-serif;
  font-weight: 400;
  position: fixed;
  font-size: 15px;
  top: 48%;
  right: 58%;
  line-height: 170%;
  z-index: 200;
  width: 28%;
  color: #d6d6d6;
}

h1 {
  font-family: 'Poppins', sans-serif;
  font-weight: 400;
  position: fixed;
  font-size: 100px;
  top: 25%;
  right: 53%;
  z-index: 200;
  width: 15cm;
  font-size: 80px;
  line-height: 110%;
  /* #fc8b65 */
}

/* BUTTONS BEGINNING */
.nav{
  color: #fc8b65 ;
  font-size: 13px;
  font-family: 'Lexend', sans-serif;
  transition: all 0.3s ease-in-out;
}

.nav:hover{
color: #ffffff;
}

.btn{
font-size: 13px;
}

#signupbutton{
  color: #fc8b65;
  border: 1.5px solid #fc8b65;
}

#signupbutton:hover{
  background: #fc8b65;
  color: #ffffff;
}

#hookbutton{
  font-family: 'Lexend', sans-serif;
  position: fixed;
  font-size: 15px;
  top: 70%;
  left: 14%;
  z-index: 200;
}

#hookbutton2{
  font-family: 'Lexend', sans-serif;
  position: fixed;
  font-size: 15px;
  top: 70%;
  left: 22%;
  z-index: 200;
}

#hookbutton, #hookbutton2 {
  border: 1.5px solid #ffffff;
  border-radius: 0.75rem;
  padding: 0.75rem 1.25rem;
  transition: all 0.3s ease-in-out;
  
}

#hookbutton:hover {
  color: #000;
  background: #fff;
  border: 1.5px solid #ffffff;
}

#hookbutton2:hover {
  color: #000;
  background: #fff;
  border: 1.5px solid #ffffff;
}
/* BUTTONS ENDING */

#logotitle{
  color: #ffffff;
  left: 3%;
  top: 3.5%;
  font-family: 'Silkscreen', cursive;
}

#columnizer{
  display: flex;
  width: 180%;
  margin: 7%;
 
}

.text-container{
  width: 40%;
margin-left:-.5%;
 padding-top: 1%;
 padding-bottom: 3%;
border: 4px solid white;
border-right: 4px solid #a58b8200;
border-left: 4px solid #a58b8200;
  backdrop-filter: blur(0px);
}

#infotext1{
  text-align:left;
  margin-left: 15%;
  font-size: 17px ;
  font-weight:400;
  font-family: 'Lexend', sans-serif;
  font-weight: 400;
  line-height: 200%;
  color: #fff;
}

#infotext2{
  text-align:left;
 margin-left: 15%;
  font-size: 17px ;
  font-weight:400;
  font-family: 'Lexend', sans-serif;
  font-weight: 400;
  line-height: 200%;
  color: #fff;



}

video {
margin-left: 25%;
  width: 50%;
  margin-bottom: 5%;
 border: #2c2d31 10px solid;
 border-radius: 1cm;
 padding: 3%;

}

h2 {
  text-align: center;
  /* #fc8b65 */

  color:  #fff;
  font-size: 30px;
  font-family: 'Poppins', sans-serif;
}

#printer{
  margin-left: 42%;
  width: 15%;
  justify-content : center;
  margin-bottom:0;
}

#creator{
  margin-left: 42%;
  width: 15%;
  justify-content : center;
  margin-bottom:0;
}

html { 
  scroll-behavior: smooth;
} 

#info{
background: linear-gradient(#a29ce6 77%, #6c69da);
}

#castle{
  margin-right: 0%;
  position: absolute;
width: 30%;
margin-bottom: -24%;
filter: saturate(100%);
}


  </style>
  <body>
    <div class="wrapper">
      <div class="parallax__group hero-container">
        <div class="parallax__layer hero-text">
          <div class="parallax__group hero-container"></div>
          <div class="parallax__group info-container"></div>
          <img id="icon" src="img/printing-device.png" alt="icon" width="32" height="32" style="position: absolute; z-index: -1; top: 3%;left: 1%;" >
          <a href="index.php"><h2 id="logotitle">PrintLabs</h2></a>
          
          <ul>
            <li><a class="nav" href="index.php">Home</a></li>
            <li><a class="nav" target="_blank" href="market.php">Market</a></li>
            <li><a class="nav" href="help.php">About</a></li>
            
            <?php 

            if (isset($_SESSION["userid"])) {


       

         if (isset($_SESSION["badgecheck"])) {

    
    
          if ($_SESSION["badgecheck"] == 'creator'){
            echo "<li><a class='nav' href='cdashboard.php'>Dashboard</a></li>";
              
                 }
         
         if ($_SESSION["badgecheck"] == 'printor'){
                     echo "<li><a class='nav' href='pdashboard.php'>Dashboard</a></li>";
                   }
         
           }
           echo "<li><a href='includes/logout.inc.php' id='signupbutton' class='btn'>Log Out</a></li>";

            }

            else {
              echo "<li><a class='nav' href='login.php'>Login</a></li>";
              echo "<li><a href='signup.php' id='signupbutton' class='btn'>Sign Up</a></li>";
              }

            ?>
   
          </ul>
          
          <p id="herotext">Get ready to step into the world of 3D modeling and printing with PrintLabs - the ultimate bridge that connects creators with the means to bring 
            their imagination to life! Imagine having the power to craft any object you can dream up, without the need to spend a fortune on a 3D printer or hassle with complicated 
            technology. Well, there's no need to imagine. </p>
            <?php 

if (isset($_SESSION["userid"])) {
  
  echo "<h1>3D Printing For All.</h1>";
}

else {
  echo "<h1>3D Printing For All.</h1>";
  }

?>
          
          <a href="signup.php" id="hookbutton" class="btn">Start Here</a>
          <a href="#info" id="hookbutton2" class="btn">More Info</a>
    
          <div class="year-container">
         
            
            <!-- <img src="img/mart.jpg" alt="Town" width="1504" height="1128" style="right: 0%;position: absolute; z-index: 1;">
            <img src="img/mart.jpg" alt="Town" width="1504" height="1128" style="z-index: 200;position: absolute;"> -->
            <img id="hero" src="img/mart.jpg" alt="Town" width="1003" height="752" >
          

          </div>
          <div class="social-container">
            <a href="https://www.linkedin.com/in/neshanth-anand/" target="_blank"
              ><i class="icon ion-logo-linkedin"></i
            ></a>
            <a href="https://github.com/GunmetalPoem" target="_blank"
              ><i class="icon ion-logo-github"></i
            ></a>
            <!-- <a href="https://dribbble.com/kiaancastillo" target="_blank"
              ><i class="icon ion-logo-dribbble"></i
            ></a>
            <a href="https://www.youtube.com/c/KiaanCastillo" target="_blank"
              ><i class="icon ion-logo-youtube"></i
            ></a> -->
          </div>
        </div>
      </div>
      
      <div id="info" class="parallax__group info-container" >
        
        
        <img id="castle"  src="./img/castle.jpg" />

        <div id="columnizer">

        <!-- <img src="./img/concert.jpg" alt="Lively and colourful concert" /> -->
        <div class="text-container">
        <h2>Printors.</h2>
        <!-- <video autoplay muted loop id="myVideo">
            <source id="box" src="img/creator.mp4" type="video/mp4">
          </video> -->
          <img id="printer" src="./img/printor.png" alt="3d printer" />
          <p id="infotext1">Create a vendor account to easily manage and showcase your printer's availability. Customize your requirements to notify creators of any specific limitations. When a creator expresses interest in your printer, seamlessly connect to it remotely using a Raspberry Pi (tutorial provided). 
            Simply input the provided STL file and enjoy complete control over the entire printing process with a variety of options to keep the creator updated. </p>
    
        
        </div>

        <div class="text-container">
        <h2>Creators.</h2>
          <!-- <video autoplay muted loop id="myVideo">
            <source id="box" src="img/printor.mp4" type="video/mp4">
          </video> -->
         
          <img id="creator" src="./img/creator.png" alt="3d printer" />
          <p id="infotext2"> Sign up for a creator account and unlock a world of diverse 3D printers at your fingertips. 
            Browse through the available options and select the perfect match for your STL file. Connect with the printer owners directly to discuss any 
            specific requirements and stay informed with real-time updates on your print progress. Additionally, contribute to the community by adding your 
            creations and STL files to a public database, and sharing your designs with others.
          </p>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>
