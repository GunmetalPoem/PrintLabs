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


html,body {
    scroll-behavior:smooth;
    background-color: #acd3e6;
    overflow-y: hidden;
    overflow-x: hidden;
   }


.iFrameContent{
  width:75%;
  height:900px;
  top: -50px;
}

.iFrameContainer{
  position: relative;
 
  margin-left: 50%;
  margin-top: -28%;
}



form{
  text-align: center;
  margin-top: 20%;
}



#printerName{
font-size: large;
}

input{
  font-family: 'Poppins', sans-serif;
  text-align: center;
  width: 20%;
}


#ele{
  margin-left: 80%;
  margin-top: -10%;
}


/* CSS */
.button-74 {
  background-color: #fbeee0;
  border: 2px solid #422800;
  border-radius: 30px;
  box-shadow: #422800 4px 4px 0 0;
  color: #422800;
  cursor: pointer;
  display: inline-block;
  font-weight: 600;
  font-size: 18px;
  padding: 0 18px;
  line-height: 50px;
  text-decoration: none;
  user-select: none;

  touch-action: manipulation;
  position:relative;
  font-family: 'Poppins', sans-serif;
margin-left: 5%;
margin-right: 10%;

}

.button-74:hover {
  background-color: #fff;
}

.button-74:active {
  box-shadow: #422800 2px 2px 0 0;
  transform: translate(2px, 2px);
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

.iFrameContent{
  position: absolute;
  width:75%;
  height:900px;
  top: -50px;
}

.iFrameContainer{
  position:relative;
  margin-left: 20%;
}

#linkInput{
  font-family: 'Poppins', sans-serif;
  display: block;
  margin-left: 0%;
  margin-right: auto;
  margin-top:20%;
  margin-bottom: 2%;
  z-index: 10;
}



  </style>
  <body>
  <img id="icon" src="img/printing-device.png" alt="icon" width="32" height="32" style="position: absolute;  top: 2%;left: 1%;">
  <a id='logotitle' href='cdashboard.php'><h2>PrintLabs Status</h2></a>
  

    <input type="text" id="linkInput" placeholder="Enter status link from printor"></input>
    <button  class="button-74"  onclick="updateIframe()">Display Status</button>
 
    <div class="iFrameContainer">
     
      <br>
      <iframe id="theFrame" src="" scrolling="no" frameborder="0" class="iFrameContent"></iframe>
    </div>
    <img src="img/ele.gif" id="ele" alt="ele" width="30%">

    <script>
      function updateIframe() {
        var link = document.getElementById("linkInput").value;
        var iframe = document.getElementById("theFrame");
        iframe.src = link;
      }
    </script>
    
  </body>
</html>
