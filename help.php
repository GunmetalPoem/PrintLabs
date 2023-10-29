<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrintLabs</title>
    
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #302a39;
            overflow-x: hidden;
            overflow-y: hidden;
            font-family: 'Poppins', sans-serif;

        }

        .chat-container {
            max-width: 900px;
            margin: 0 auto;
            margin-top: -3%;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 10px;
            border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid #2db885;
        }

        .chat-header {
            text-align: center;
            background-color: #2db885;
            border-radius: 10px;
            color: white;
            padding: 10px;
        }

        .chat-box {
            height: 600px;
            overflow-y: auto;
            font-family: 'Poppins', sans-serif;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            color: white;

        }

        .chat-input {
            display: flex;
            justify-content: space-between;
            font-family: 'Poppins', sans-serif;

        }

        input[type="text"] {
            flex-grow: 2;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;

        }

        button {
            padding: 5px 10px;
            background-color: #f2883c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;

        }

        
#hero{

position: absolute;
right: -15%;
z-index: -2;
top:25% ;
}


/* CSS */
.button-56 {
  align-items: center;
  background-color: #f2883c;
  border: 2px solid #111;
  border-radius: 8px;
  box-sizing: border-box;
  color: #54320a;
  cursor: pointer;
  display: flex;
  font-family: 'Poppins', sans-serif;
  font-size: 16px;
  height: 48px;
  justify-content: center;
  line-height: 24px;
  max-width: 100%;
  padding: 0 25px;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-56:after {
  background-color: #111;
  border-radius: 8px;
  content: "";
  display: block;
  height: 48px;
  left: 0;
  width: 100%;
  position: absolute;
  top: -2px;
  transform: translate(8px, 8px);
  transition: transform .2s ease-out;
  z-index: -1;
}

.button-56:hover:after {
  transform: translate(0, 0);
}

.button-56:active {
  background-color: #f2883c;
  outline: 0;
}

.button-56:hover {
  outline: 0;
}

@media (min-width: 768px) {
  .button-56 {
    padding: 0 40px;
  }
}

.user-message {
            color: #ffffff; /* Color for user messages */
            margin-bottom: 10px; /* Add margin between messages */
            
        }

        .bot-message {
            color: #f2883c; /* Color for bot messages */
            margin-bottom: 10px; /* Add margin between messages */
            border: #ffffff 1px solid;
            border-radius: 5px;
            padding: 4%;
        }

        #logotitle{
    color: #ffffff;
    left: 3%;
    top: -3.5%;
    font-family: 'Silkscreen', cursive;
    font-size: 15px;
    position: relative;
    width: fit-content;
text-decoration: none;
  }
    </style>
    
</head>

<body>
    <img id="icon" src="img/printing-device.png" alt="icon" width="32" height="32" style="position: absolute;  top: 2%;left: 1%;">

<?php
if (isset($_SESSION["badgecheck"])) {

    
    
 if ($_SESSION["badgecheck"] == 'creator'){
          echo "<a id='logotitle' href='cdashboard.php'><h2>PrintLabs Assistance</h2></a>";
     
        }

if ($_SESSION["badgecheck"] == 'printor'){
            echo "<a id='logotitle' href='pdashboard.php'><h2>PrintLabs Assistance</h2></a>";
          }

       


  }
?>
    <div class="chat-container">
        <div class="chat-header">
            <h2>PrintLabs Assistance.</h2>
        </div>
        <div class="chat-box" id="chatBox">
            <!-- Chat messages will be displayed here -->
        </div>
        <div class="chat-input">
            <input type="text" id="userInput" placeholder="Type your message...">
            <button class="button-56" onclick="sendMessage()">Send</button>
        </div>
        
    </div>
    <img id="hero" src="img/transmart.png" alt="Town" width="1003" height="752" >


    <script>
        // Chatbot responses
        const responses = {
          

            "1": "If operating Market was confusing, please watch this video: TUTORIAL LINK.",
            "2": "If operating Messages was confusing, please watch this video: TUTORIAL LINK. If message was not going through, respond with 6. ",
            "3": "If operating Inbox/Orders was confusing, please watch this video: TUTORIAL LINK.",
            "4.1": "If the link you recieved was not working then please reach out to your Printor for a working link, set to public",
            "4.2": "If you cannot see your print controls, that means you have no octo-everywhere account associated with the printer name. To know how to create one respond with 7.",
            "5": "To connect a raspberry PI to your printer, follow this LINK to connect it and if you don't know how to create an octo everywhere account respond with 7 ",
            "6": "If message was not going through, the Printor you are trying to reach may have a full inbox, and make sure to always clear your inbox after reading messages, so Printors can also reach out to you!",
            "7": "To create an octo-everywhere account, here is the link: LINK",
            "100": "Contact the dev at: EMAIL",



            "creator": "Good to know, does it have to do with any feature regarding: (1)Market, (2)Messages, (3)Inbox/Orders, (4.1)Print Status. Respond with a number please.",
            "printor": "Good to know, does it have to do with any feature regarding: (1)Market, (2)Messages, (3)Inbox/Orders, (4.2)Print Controls, (5)Connecting Rasp PI to Printer. Respond with a number please.",
            "default": "Hi, I'm Printlabs Assistant Model (P.A.M.)! Is your question related to a printor account or a creator account, please respond with either printor or creator. Respond with 100 if you need to contact the dev.",
        };

        function sendMessage() {
            const userInput = document.getElementById("userInput").value;
            const chatBox = document.getElementById("chatBox");

            // Display user message
            chatBox.innerHTML += `<div class="user-message">You: ${userInput}</div>`;

            // Get chatbot response
            const response = responses[userInput.toLowerCase()] || responses["default"];

            // Display chatbot response
            chatBox.innerHTML += `<div class="bot-message">Bot: ${response}</div>`;

            // Clear the input field
            document.getElementById("userInput").value = '';

            // Scroll to the bottom of the chat box
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>
</body>
</html>
