<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/main.css">
    <title>Document</title>
</head>
<body class="form-container">
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
    <div class="login-form-wrapper">
        <img class="login-logo" src="./img/greetmentor-logo.png" alt="">
        <form action="/handle/login" method="post">
            <div class="input-label">
                <label for="email">Email</label>
                <br>
                <input class="input-login" name="email" id="email" type="text" placeholder="Enter your email" required>
            </div>
            
            <div class="input-label">
                <label for="password">Password</label>
                <br>
                <input class="input-login" name="password" id="password" type="password" placeholder="Your password" required>
            </div>
            <p class="condition-utilisateur">By signing up you agree to <a href="">terms and conditions</a> at zoho.</p>

            <button class="button-login" type="submit">Login</button>
        </form>
        <a class="create-account-link" href="/account/create/form">Create Account</a>
    </div>
</body>
</html>