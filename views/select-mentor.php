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
        <form class="wrapper-arrow-button" action="/select/mentor/page" method="post">
            <input type="hidden" name="current-page" value="<?= $currentPage ?>">
            <input type="hidden" name="count" value="<?= $count ?>">
            <input type="hidden" name="id" value="<?= $id ?>">
        <button class="arrow-left-button" type="submit"><img class="arrow-left" src="https://cdn.fastly.steamstatic.com/store/icons/cut_arrow.svg" alt="">
        </button>
        </form>
        <h2 class="numero-page"><?php echo $currentPage?>/<?php echo $count ?></h2>
        <form class="wrapper-arrow-button" action="/select/mentor/pages" method="post">
            <input type="hidden" name="current-page" value="<?= $currentPage ?>">
            <input type="hidden" name="count" value="<?= $count ?>">
            <input type="hidden" name="id" value="<?= $id ?>">
        <button class="arrow-right-button" type="submit"><img class="arrow-right" src="https://cdn.fastly.steamstatic.com/store/icons/cut_arrow.svg" alt="">
        </button>
        </form>
    </div>
    <div class="card-mentor-wrapper">
        <?php
        for ($i = 0; $i < $limit;$i++) {
            echo '<div class="card-mentor">
            <div class="top-card-mentor">
                <h2>' . $allMentor[$id]["prenom"] . '</h2>
                <h2>' . $allMentor[$id]["nom"] . '</h2>
            </div>

            <p class="bio-text-card">' . $allMentor[$id]["bio"] . '</p>
            <a class="add-mentor-button" href="/add/mentor/handle?id=' . $id . '">add</a>
            </div>';
            $id += 1;
        }
        ?>
        
        

    </div>
</body>
</html>