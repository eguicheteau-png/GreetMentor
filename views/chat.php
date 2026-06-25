<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css">
    <title>Chat</title>
</head>
<body>
        <header>
        <nav>
            <h1>GreetMentor</h1>

            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="#">About</a></li>
                <?php 
                if ($_SESSION["role"] = "eleve") {
                    if (isset($eleveMentor[0])) {
                        echo '<li><a href="/select/mentor">Mentors</a></li>';
                    }
                }
                if (isset($eleveMentor[0]) == false) {
                    echo '<li><a href="/chat">chat</a></li>';
                }
                ?>
                <li><a href="#">How It Works</a></li>
            </ul>

            <div>
                <a class="login-access-accueil" href="/login">Log In</a>
                <a href="/account/create/form">Sign Up</a>
            </div>
        </nav>
        <div class="border-1px"></div>
    </header>
    <div class="chat-page">
        <div class="chat-content">
            <?php
            for ($i = 0; $i < count($allMessage); $i++) {
                if ($allMessage[$i]["origin"] == $_SESSION["role"]) {
                    echo '<div class="message-box">
                    <p class="message-content-right">' . $allMessage[$i]["texte"] . '</p>
                    </div>';
                } else {
                    echo '<div class="message-box">
                    <p class="message-content-left">' . $allMessage[$i]["texte"] . '</p>
                    </div>';
                }
            }
            ?>
        </div>
        <form class="chat-input-bar" action="/message/handle" method="post">
            <input class="chat-input" type="text" name="message" placeholder="Écrire un message...">
            <button class="chat-send-btn" type="submit">
                <img class="chat-send-img" src="../img/send-message.png" alt="">
            </button>
        </form>
    </div>

    <script>
        window.addEventListener('load', function () {
            var chatContent = document.querySelector('.chat-content');
            if (chatContent) {
                chatContent.scrollTop = chatContent.scrollHeight;
            }
            window.scrollTo(0, document.body.scrollHeight || document.documentElement.scrollHeight);
        });
    </script>
</body>
</html>