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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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



#hero{

  position: absolute;
  left: 95%;
  z-index: -90;
  top:30% ;
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
.wrapper{
  overflow: hidden;
  /* DISABLE SCROLLING */
}
/* BUTTONS BEGINNING */
.nav{
  color: #635a56 ;
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
  color: #635a56;
  border: 1.5px solid #635a56;
}

#signupbutton:hover{
  background: #635a56;
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
.hero-text{
background-color: #beada5;
}


.dash{
display: flex;
/* border: 1px solid red; */
z-index: 400;
margin-left: 18%;
margin-top: -40%;
margin-bottom: 0;
height: 40%;
}

.dash2{
display: flex;
margin-left: 18%;
/* border: 1px solid red; */
z-index: 400;
margin-top: 0%;
height: 40%;
}


.tile{
margin-left:5%;
width: 18%;
height: 80%;
border: 2px solid #ffffff;
border-radius: 20%;;
backdrop-filter: blur(10px);
 box-shadow: 0 0 40px rgba(255, 255, 255, 0.3);
background-color: #beada5;
text-align: center;
padding-top: 8%;
box-shadow: #fff 40px;
font-family: 'Poppins', sans-serif;
font-size: 20px;
}

i{
 
  
}

.year-container{
  z-index: -400;
}

  </style>
  <body>
    <div class="wrapper">
      <div class="parallax__group hero-container">
        <div class="parallax__layer hero-text">
          <div class="parallax__group hero-container"></div>
          
          <img id="icon" src="img/printing-device.png" alt="icon" width="32" height="32" style="position: absolute; z-index: -1; top: 3%;left: 1%;" >
          <a href="cdashboard.php"><h2 id="logotitle">PrintLabs Creator</h2></a>
          
          <ul>
  
            <li><a class="nav" href="#">About</a></li>

            
            
            <?php 

            if (isset($_SESSION["userid"])) {

              echo "<li><a class='nav' href='help.php'>Assistance</a></li>";

              echo "<li><a class='nav' href='index.php'>Home</a></li>";


         echo "<li><a href='includes/logout.inc.php' id='signupbutton' class='btn'>Log Out</a></li>";

              
// if ($_SESSION["useruid"] = 'nesh'){
//                     echo "<li><a class='btn' id='signupbutton' href='profile.php'>USER22</a></li>";
//                   }

                 
          

            }

            else {
              echo "<li><a class='nav' href='login.php'>Login</a></li>";
              echo "<li><a href='signup.php' id='signupbutton' class='btn'>Sign Up</a></li>";
              }

            ?>
   
          </ul>
             <div class="dash"  >
  
           <a class="tile" href="market.php" >
            <div>
              <i class="bi bi-archive-fill"></i>
            Market
   
            </div>
            </a>

            <a href="includes/chat.php" class="tile" >
               <div >
              <i class="bi bi-chat-left-text-fill"></i>
              Messages
              </div>
            </a>
           
<a href="includes/view_messages.php" class="tile">

    <i class="bi bi-inboxes-fill" ></i>
    Inbox/Orders
    
</a>
</div>         
            <div class="dash2" >
  <a href="cstatus.php" class="tile">  
    <i class="bi bi-bar-chart-line-fill"></i>
     Print Status
  
</a>
            
              <a href="profile.php" class="tile">
                <div >
                <i class="bi bi-file-earmark-person-fill"></i>
               Profile
                </div> 
              </a>
             
  
                <div class="tile" style="border-right: #ffffff00;border-bottom: #ffffff00;  z-index: -470;">

                  </div>
               
              </div>






     
                      
          <div class="year-container" >
         
            <img id="hero" src="img/transcamp.png" alt="Town" width="1003" height="752">

            
        
          

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
      

    </div>
  </body>
</html>
