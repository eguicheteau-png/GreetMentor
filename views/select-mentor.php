<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/main.css">
    <title>Document</title>
</head>
<body>
    <h1 class="title-select-mentor">Select Your Future Mentor</h1>
    <div class="search-wrapper">
        <form class="wrapper-arrow-button" action="/select/mentor/page">
            <input type="hidden" name="current-page" value="<?= $currentPage ?>">
            <input type="hidden" name="count" value="<?= $count ?>">
        <button class="arrow-left-button" type="submit"><img class="arrow-left" src="https://cdn.fastly.steamstatic.com/store/icons/cut_arrow.svg" alt="">
        </button>
        </form>
        <h2 class="numero-page"><?php echo $currentPage + 1 ?>/<?php echo $count ?></h2>
        <form class="wrapper-arrow-button" action="/select/mentor/pages" method="post">
            <input type="hidden" name="current-page" value="<?= $currentPage ?>">
            <input type="hidden" name="count" value="<?= $count ?>">
        <button class="arrow-right-button" type="submit"><img class="arrow-right" src="https://cdn.fastly.steamstatic.com/store/icons/cut_arrow.svg" alt="">
        </button>
        </form>
    </div>
    <div class="card-mentor-wrapper">
        <?php
        for ($i = 0; $i < 12;$i++) {
            echo '<div class="card-mentor">
            <div class="top-card-mentor">
                <h2>' . $allMentor[$currentPage]["prenom"] . '</h2>
                <h2>' . $allMentor[$currentPage]["nom"] . '</h2>
            </div>

            <p class="bio-text-card">bio ooooo ooooo ooo ooooo ooo oooooo o oo oooo o o oooooo o ooooooo o o ooooooo oo oooooo oo ooooo oo o oo ooooo oo ooo o o oooooo oo ooooo ooooo ooooo o o o  ooo ooo ooo ooo oo o oooo ooooo oo oo ooo o ooooo o oooo oo oooo ooo oooo ooooo oo o o ooo ooooo</p>
            <a class="add-mentor-button" href="">add</a>
        </div>';
            $currentPage++;
        }
        ?>
        <div class="card-mentor">
            <div class="top-card-mentor">
                <h2>prenom</h2>
                <h2>nom</h2>
            </div>

            <p class="bio-text-card">bio ooooo ooooo ooo ooooo ooo oooooo o oo oooo o o oooooo o ooooooo o o ooooooo oo oooooo oo ooooo oo o oo ooooo oo ooo o o oooooo oo ooooo ooooo ooooo o o o  ooo ooo ooo ooo oo o oooo ooooo oo oo ooo o ooooo o oooo oo oooo ooo oooo ooooo oo o o ooo ooooo</p>
            <a href="add-mentor-button">add</a>
        </div>
                <div class="card-mentor">
            <div class="top-card-mentor">
                <h2>prenom</h2>
                <h2>nom</h2>
            </div>

            <p class="bio-text-card">bio ooooo ooooo ooo ooooo ooo oooooo o oo oooo o o oooooo o ooooooo o o ooooooo oo oooooo oo ooooo oo o oo ooooo oo ooo o o oooooo oo ooooo ooooo ooooo o o o  ooo ooo ooo ooo oo o oooo ooooo oo oo ooo o ooooo o oooo oo oooo ooo oooo ooooo oo o o ooo ooooo</p>
            <a href="add-mentor-button">add</a>
        </div>
                <div class="card-mentor">
            <div class="top-card-mentor">
                <h2>prenom</h2>
                <h2>nom</h2>
            </div>

            <p class="bio-text-card">bio ooooo ooooo ooo ooooo ooo oooooo o oo oooo o o oooooo o ooooooo o o ooooooo oo oooooo oo ooooo oo o oo ooooo oo ooo o o oooooo oo ooooo ooooo ooooo o o o  ooo ooo ooo ooo oo o oooo ooooo oo oo ooo o ooooo o oooo oo oooo ooo oooo ooooo oo o o ooo ooooo</p>
            <a href="add-mentor-button">add</a>
        </div>
                <div class="card-mentor">
            <div class="top-card-mentor">
                <h2>prenom</h2>
                <h2>nom</h2>
            </div>

            <p class="bio-text-card">bio ooooo ooooo ooo ooooo ooo oooooo o oo oooo o o oooooo o ooooooo o o ooooooo oo oooooo oo ooooo oo o oo ooooo oo ooo o o oooooo oo ooooo ooooo ooooo o o o  ooo ooo ooo ooo oo o oooo ooooo oo oo ooo o ooooo o oooo oo oooo ooo oooo ooooo oo o o ooo ooooo</p>
            <a href="add-mentor-button">add</a>
        </div>
                <div class="card-mentor">
            <div class="top-card-mentor">
                <h2>prenom</h2>
                <h2>nom</h2>
            </div>

            <p class="bio-text-card">bio ooooo ooooo ooo ooooo ooo oooooo o oo oooo o o oooooo o ooooooo o o ooooooo oo oooooo oo ooooo oo o oo ooooo oo ooo o o oooooo oo ooooo ooooo ooooo o o o  ooo ooo ooo ooo oo o oooo ooooo oo oo ooo o ooooo o oooo oo oooo ooo oooo ooooo oo o o ooo ooooo</p>
            <a href="add-mentor-button">add</a>
        </div>
                <div class="card-mentor">
            <div class="top-card-mentor">
                <h2>prenom</h2>
                <h2>nom</h2>
            </div>

            <p class="bio-text-card">bio ooooo ooooo ooo ooooo ooo oooooo o oo oooo o o oooooo o ooooooo o o ooooooo oo oooooo oo ooooo oo o oo ooooo oo ooo o o oooooo oo ooooo ooooo ooooo o o o  ooo ooo ooo ooo oo o oooo ooooo oo oo ooo o ooooo o oooo oo oooo ooo oooo ooooo oo o o ooo ooooo</p>
            <a href="add-mentor-button">add</a>
        </div>
                <div class="card-mentor">
            <div class="top-card-mentor">
                <h2>prenom</h2>
                <h2>nom</h2>
            </div>

            <p class="bio-text-card">bio ooooo ooooo ooo ooooo ooo oooooo o oo oooo o o oooooo o ooooooo o o ooooooo oo oooooo oo ooooo oo o oo ooooo oo ooo o o oooooo oo ooooo ooooo ooooo o o o  ooo ooo ooo ooo oo o oooo ooooo oo oo ooo o ooooo o oooo oo oooo ooo oooo ooooo oo o o ooo ooooo</p>
            <a href="add-mentor-button">add</a>
        </div>
                <div class="card-mentor">
            <div class="top-card-mentor">
                <h2>prenom</h2>
                <h2>nom</h2>
            </div>

            <p class="bio-text-card">bio ooooo ooooo ooo ooooo ooo oooooo o oo oooo o o oooooo o ooooooo o o ooooooo oo oooooo oo ooooo oo o oo ooooo oo ooo o o oooooo oo ooooo ooooo ooooo o o o  ooo ooo ooo ooo oo o oooo ooooo oo oo ooo o ooooo o oooo oo oooo ooo oooo ooooo oo o o ooo ooooo</p>
            <a href="add-mentor-button">add</a>
        </div>
                <div class="card-mentor">
            <div class="top-card-mentor">
                <h2>prenom</h2>
                <h2>nom</h2>
            </div>

            <p class="bio-text-card">bio ooooo ooooo ooo ooooo ooo oooooo o oo oooo o o oooooo o ooooooo o o ooooooo oo oooooo oo ooooo oo o oo ooooo oo ooo o o oooooo oo ooooo ooooo ooooo o o o  ooo ooo ooo ooo oo o oooo ooooo oo oo ooo o ooooo o oooo oo oooo ooo oooo ooooo oo o o ooo ooooo</p>
            <a href="add-mentor-button">add</a>
        </div>
                
        <div class="card-mentor">
            <div class="top-card-mentor">
                <h2>prenom</h2>
                <h2>nom</h2>
            </div>

            <p class="bio-text-card">bio ooooo ooooo ooo ooooo ooo oooooo o oo oooo o o oooooo o ooooooo o o ooooooo oo oooooo oo ooooo oo o oo ooooo oo ooo o o oooooo oo ooooo ooooo ooooo o o o  ooo ooo ooo ooo oo o oooo ooooo oo oo ooo o ooooo o oooo oo oooo ooo oooo ooooo oo o o ooo ooooo</p>
            <a href="add-mentor-button">add</a>
        </div>
        <div class="card-mentor">
            <div class="top-card-mentor">
                <h2>prenom</h2>
                <h2>nom</h2>
            </div>

            <p class="bio-text-card">bio ooooo ooooo ooo ooooo ooo oooooo o oo oooo o o oooooo o ooooooo o o ooooooo oo oooooo oo ooooo oo o oo ooooo oo ooo o o oooooo oo ooooo ooooo ooooo o o o  ooo ooo ooo ooo oo o oooo ooooo oo oo ooo o ooooo o oooo oo oooo ooo oooo ooooo oo o o ooo ooooo</p>
            <a href="add-mentor-button">add</a>
        </div>
        <div class="card-mentor">
            <div class="top-card-mentor">
                <h2>prenom</h2>
                <h2>nom</h2>
            </div>

            <p class="bio-text-card">bio ooooo ooooo ooo ooooo ooo oooooo o oo oooo o o oooooo o ooooooo o o ooooooo oo oooooo oo ooooo oo o oo ooooo oo ooo o o oooooo oo ooooo ooooo ooooo o o o  ooo ooo ooo ooo oo o oooo ooooo oo oo ooo o ooooo o oooo oo oooo ooo oooo ooooo oo o o ooo ooooo</p>
            <a href="add-mentor-button">add</a>
        </div>
        

    </div>
</body>
</html>