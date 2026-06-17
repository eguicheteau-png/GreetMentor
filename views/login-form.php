<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/main.css">
    <title>Document</title>
</head>
<body class="form-container">
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