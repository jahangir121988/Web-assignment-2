<?php
session_start();
if (isset($_SESSION['todo'])) {
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php include_once('navbar.php') ?>
    <div class="container">

        <?php

        require_once('utilities.php');
        $conn = getConnection();
        // $posts = $conn->query("SELECT * FROM " . TABLE . " ORDER BY id DESC");
        $posts = $conn->query("SELECT * FROM " . TABLE);
        foreach ($posts as $key=>$post) :
        ?>
            <div class="jumbotron jumbotron-fluid bg-light border border-warning m-2">
                <div class="container">
                    <h1 class="display-4">#<?= $key + 1 ?>. <?= $post['title'] ?></h1>
                    <div class="small float-right">Posted By: <?= $post['user'] ?></div>
                    <div class="small float-right">Posted At: <?= $post['createdAt'] ?></div>
                    <hr>
                    <p class="lead"><?= $post['body'] ?></p>
                </div>
            </div>
        <?php
        endforeach
        ?>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>