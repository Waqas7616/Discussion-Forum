<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


</head>

<body>
    <?php
    include "./partials/_header.php";
    include "./partials/_dbconnect.php"

    ?>
    <?php
    $showAlert = true;
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulations!</strong> Your comment has been added successfully thanks for your time.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }

    ?>

    <div class="container my-4">
        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE thread_id = $id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['thread_title'];
            $description = $row['thread_description'];

            echo '<div class="jumbotron">
        <h1 class="display-4">' . $title . '</h1>
        <p class="lead">' . $description . '</p>
        <hr class="my-4">
        <p>This is peer to peer forum.No Spam / Advertising / Self-promote in the forums These forums define spam as unsolicited advertisement for goods, services and/or other web sites, or posts with little, or completely unrelated content. Do not spam the forums with links to your site or product, or try to self-promote your website, business or forums etc. Spamming als. Do not post copyright-infringing material
        Providing or asking for information on how to illegally obtain copyrighted materials is forbidden.</p>
        <p><b>Posted by: Waqas Ali</b></p>
    </div>';
        }
        ?>

    </div>

    <!-- COMMENT INSERTION TO DATABASE -->

    <?php
    $showAlert = false;
    $reqMethod = $_SERVER['REQUEST_METHOD'];

    if ($reqMethod == 'POST') {
        $showAlert = true;
        $comContent = $_POST['comment'];
        $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comContent', '$id', '0', current_timestamp())";
        $result = mysqli_query($conn, $sql);
    }
    ?>

    <div class="container my-3">
        <h2>Post a Comment</h2>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

            <div class="form-group">
                <label for="commentTextarea">Write your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-warning">Post comment</button>
        </form>
    </div>

    <div class="container mb-5">
        <h2>Discussion</h2>

        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id = $id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_time = $row['comment_time'];


            echo '<div class="media my-3 mb-5">
            <img src="./assets/images/user.jpg" width="50px" class="mr-3" alt="...">
            <div class="media-body">
            <p class = "font-weight-bold my-0"> Anonymous user at ' . $comment_time . '</p>
                
                ' . $content . '
            </div>
        </div>';
        }
        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid my-3">
            <div class="container">
              <p class="display-4">No Comments found</p>
              <p class="lead">Be the first to reply</p>
            </div>
          </div>';
        }


        ?>


    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>

<?php
include "./partials/_footer.php"

?>