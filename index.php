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
    include "./partials/_loginModal.php";
    include "./partials/_signupModal.php"
    ?>
    <!-- carousel here -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" style="overflow:hidden ; height:fit-content">
                <img src="./assets/images/faisal-BI465ksrlWs-unsplash.jpg" style="height:500px; background-size:cover; width:2400px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item " style="overflow:hidden ;height:fit-content">
                <img src="./assets/images/joshua-reddekopp-SyYmXSDnJ54-unsplash.jpg" style="height:500px; background-size:cover; width:2400px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" style="overflow:hidden ;height:fit-content">
                <img src="./assets/images/mohammad-rahmani-CDBkMNZmd7o-unsplash.jpg" style="height:500px; background-size:cover; width:2400px" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- carousel ends here -->


    <h2 class="text-center my-3">Abacus forum - Catagories</h2>
    <div class="container my-2 ">
        <div class="row my-2">
            <?php
            $sql = "SELECT * FROM `catagories` ";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {

                $id = $row['catagory_id'];
                $img = $row['catagory_name'];


                echo ' <div class="col-md-4 my-3 ">
        <div class="card" style="width: 18rem;">
            <img src="./assets/images/' . $img . '.jpg" style="height:250px ;" alt="...">
            <div class="card-body">
                <h5 class="card-title"><a href="threadlist.php?catid=' . $id . '">' . $row['catagory_name'] . '</a></h5>
                <p class="card-text">' . substr($row['catagory_description'], 0, 50) . ' ...</p>
                <a href="threadlist.php?catid=' . $id . '" class="btn btn-primary">View Threads</a>
            </div>
        </div>
    </div>';
            }

            ?>
        </div>
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