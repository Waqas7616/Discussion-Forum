<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Abacus-Coding forum</title>
</head>

<body>
    <?php
    include "./partials/_header.php" ?>
    <?php include "./partials/_dbconnect.php" ?>

    <?php
    $id = $_GET['catid'];
    $sql =  "SELECT * FROM `catagories` WHERE catagory_id= $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['catagory_name'];
        $catdesc = $row['catagory_description'];
    }
    ?>

    <?php
    $alert = false;
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {
        $alert = true;
        $th_title = $_POST['title'];
        $th_desc = $_POST['description'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_cat_id`, `user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '0', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        if ($alert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your thread has been added successfully wait for community to respond.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    ?>

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo " $catname " ?> forums</h1>
            <p class="lead"><?php echo "$catdesc" ?></p>
            <hr class="my-4">
            <p>This is peer to peer forum.No Spam / Advertising / Self-promote in the forums These forums define spam as unsolicited advertisement for goods, services and/or other web sites, or posts with little, or completely unrelated content. Do not spam the forums with links to your site or product, or try to self-promote your website, business or forums etc. Spamming als. Do not post copyright-infringing material
                Providing or asking for information on how to illegally obtain copyrighted materials is forbidden.</p>
            <a class="btn btn-warning btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

    <div class="container my-3">
        <h2>Start a Discussion</h2>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp">
                <small id="titleHelp" class="form-text text-muted">Keep your title short</small>
            </div>
            <div class="form-group">
                <label for="descriptionTextarea">Elaborate your Problem</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
    </div>

    <div class="container mb-5">
        <h2>Browse Questions</h2>

        <?php
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_description'];

            echo '<div class="media my-3 mb-5">
            <img src="./assets/images/user.jpg" width="50px" class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0"><a class = "text-dark" href="threads.php?threadid=' . $id . '">' . $title . '</a></h5>
                ' . $desc . '
            </div>
        </div>';
        }
        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid my-3">
            <div class="container">
              <p class="display-4">No Threads found</p>
              <p class="lead">Be the first to ask a question</p>
            </div>
          </div>';
        }


        ?>


    </div>

    <?php include "./partials/_footer.php" ?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>