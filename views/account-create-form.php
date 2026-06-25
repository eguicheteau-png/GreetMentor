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
        <img class="login-logo" src="/img/greetmentor-logo.png" alt="">
        <form action="/handle/create/account" method="post">
            <div class="input-label">
                <label for="firstName">FirstName</label>
                <br>
                <input class="input-login" name="firstName" id="firstName" type="text" placeholder="Enter your FirstName" required>
            </div>
            <div class="input-label">
                <label for="lastName">LastName</label>
                <br>
                <input class="input-login" name="lastName" id="lastName" type="text" placeholder="Enter your LastName" required>
            </div>
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

            <div class="select-wrapper">
                <div class="wrapper-select-in-select-wrapper">
                    <label for="pays">Pays</label>
                    <br>
                    <select name="pays" id="pays">
                        <option value="france">France</option>
                        <option value="angleterre">Angleterre</option>
                    </select>
                </div>

                <div class="wrapper-select-in-select-wrapper">
                    <label for="langue">Langue</label>
                    <br>
                    <select name="langue" id="langue">
                        <option value="français">Français</option>
                        <option value="anglais">Anglais</option>
                    </select>
                </div>

            </div>
            <div class="select-wrapper">
                <div class="wrapper-select-in-select-wrapper">
                    <label for="role">Role</label>
                    <br>
                    <select name="role" id="role">
                        <option value="eleve">Elève</option>
                        <option value="mentor">Mentor</option>
                    </select>
                </div>

            </div>
            <p class="condition-utilisateur">By signing up you agree to <a href="">terms and conditions</a> at zoho.</p>

            <button class="button-login" type="submit">Create Account</button>
        </form>
        <a class="create-account-link" href="/login">Login</a>
    </div>
    <p>_</p>
</body>
</html>