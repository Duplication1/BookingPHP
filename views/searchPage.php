<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poly:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poly:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        a {
            color: inherit;
            text-decoration: underline;
            font-size: inherit;
        }

        a:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body>
<?php 
    if (isset($_SESSION['role']) && $_SESSION['role'] === 'user') {
    include 'components/userHeader.php';
    } else if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    include 'components/adminHeader.php';
    } else {
    include 'components/header.php';
      }
    include 'components/logoutModal.html';
    include 'components/goUp.html';
    ?>
    <section class="sections" id="faqSection">
    <?php 
        include 'components/imaginary-header.html';
        include 'components/faq-header.html' ?>
       <div class="botbody">
        <div class="botcontent">
            <div class="card">
                <div id="botheader">
                    <h1>FAQ BOT</h1>
                    <button class="send" onclick="reset()">
                        <div class="circle refresh"><i class="bi bi-arrow-clockwise"
                                style="font-size: 1.5rem; margin-left: 0.2rem;"></i></div>
                    </button>
                </div>
                <hr>
                <div id="message-section">
                    <!-- Chat messages will be displayed here -->
                    <div class="message" id="bot"><span id="bot-response">Hello.. I'm listening! Go on..</span></div>
                </div>
                <div class="quickbtns">
                    <button tabindex="2" class="quickmessage" data-message="Address"
                        onclick="send(this.getAttribute('data-message'))">Address</button>
                    <button tabindex="1" class="quickmessage" data-message="Report a Bug"
                        onclick="send(this.getAttribute('data-message'))">Report a Bug</button>
                </div>
                <div id="input-section">
                    <input id="user-input" type="text" placeholder="Type a message..." autocomplete="on"
                        autofocus="autofocus" tabindex="3" />
                    <button type="submit" class="send sendmessage" onclick="sendMessage()" tabindex="3">
                        <div class="circle"><i class="bi bi-send"
                                style="font-size: 1.5rem; margin-left: 0.2rem;"></i></div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </section>
    <?php include 'components/footer.html'?>
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
      new WOW().init();
    </script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/domLoaded.js"></script>
    <script src="js/iconLinks.js"></script>
    <script>
        function reset() {
            document.getElementById("message-section").innerHTML = '<div class="message" id="bot"><span id="bot-response">Hello.. I\'m listening! Go on..</span></div>';
        }

        function send(message) {
            var userInput = document.getElementById("user-input");
            userInput.value = message;
            var sendButton = document.querySelector('.send[type="submit"]');
            sendButton.click();
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <script src="js/chatBot.js"></script>
</body>
</html>
