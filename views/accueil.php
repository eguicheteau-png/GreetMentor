<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/main.css">
    <title>GreetMentor</title>
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
                    if (isset($eleveMentor) == false) {
                        echo '<li><a href="/select/mentor">Mentors</a></li>';
                    }
                }
                if (isset($eleveMentor)) {
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
    </header>

    <main>
        <section id="hero">
            <span>Learn. Grow. Succeed.</span>

            <h2>Mentorship That Shapes Your Future</h2>

            <p>
                GreetMentor connects ambitious learners with experienced mentors
                to help them achieve their goals and unlock their full potential.
            </p>

        </section>

     
        <section id="features">
            <h2>Why Choose GreetMentor?</h2>

            <article>
                <h3>Expert Mentors</h3>
                <p>Connect with experienced professionals across various industries.</p>
            </article>

            <article>
                <h3>Personalized Goals</h3>
                <p>Create a mentorship journey tailored to your ambitions.</p>
            </article>

            <article>
                <h3>Continuous Support</h3>
                <p>Receive ongoing guidance and actionable advice.</p>
            </article>

            <article>
                <h3>Active Community</h3>
                <p>Join a network of motivated learners and mentors.</p>
            </article>
        </section>


        <section id="how-it-works">
            <h2>How It Works</h2>

            <div>
                <article>
                    <h3>1. Create Your Profile</h3>
                    <p>Tell us about your background, interests, and goals.</p>
                </article>

                <article>
                    <h3>2. Find Your Mentor</h3>
                    <p>Browse and connect with mentors who match your needs.</p>
                </article>

                <article>
                    <h3>3. Learn and Grow</h3>
                    <p>Schedule sessions, gain insights, and achieve your goals.</p>
                </article>
            </div>
        </section>

     
        <section id="stats">
            <h2>Our Impact</h2>

            <div>
                <h3>5,000+</h3>
                <p>Active Members</p>
            </div>

            <div>
                <h3>800+</h3>
                <p>Available Mentors</p>
            </div>

            <div>
                <h3>95%</h3>
                <p>Satisfaction Rate</p>
            </div>

            <div>
                <h3>20+</h3>
                <p>Countries Reached</p>
            </div>
        </section>


        <section id="cta">
            <h2>Ready to Start Your Growth Journey?</h2>

            <p>
                Join GreetMentor today and connect with mentors who can help
                you reach the next level.
            </p>

            <a href="#">Get Started for Free</a>
        </section>
    </main>


 

</body>
</html>