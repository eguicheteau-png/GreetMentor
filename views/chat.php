<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css">
    <title>Chat</title>
</head>
<body>
    <div class="chat-page">
        <div class="chat-content"></div>
        <form class="chat-input-bar" action="/message/handle" method="post">
            <input class="chat-input" type="text" name="message" placeholder="Écrire un message...">
            <button class="chat-send-btn" type="submit">
                <img class="chat-send-img" src="../img/send-message.png" alt="">
            </button>
        </form>
    </div>
</body>
</html>