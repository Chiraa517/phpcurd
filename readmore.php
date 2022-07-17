<?php
include 'db_conn.php';

if (isset($_GET['readmore_id'])) {
    $id = $_GET['readmore_id'];
    // echo $id;
    $data = $conn->query("SELECT * FROM `blog2` WHERE `id` = '$id'") or die($conn->error);

    $row = $data->fetch_assoc();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap links -->
    <!-- CSS link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JS link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>Read Blog</title>
</head>

<body>


    <!-- Nav bar start  -->

    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <!-- Navbar content -->
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Naveed Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="#">Home</a>
                    <a class="nav-link" href="#">Blog</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Nav bar close  -->




    <div class="container mt-5">
        <p class="h1 mb-4">Blogs</p>
    </div>

    <div class="container mt-4 mb-5">
        <!-- head -->
        <div class="card w-50">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['title']; ?></h5>
                <p class="card-text"><?php echo $row['excerpt'] ?></p>
                <p class="card-text"><?php echo $row['content'] ?></p>

                <a href="editblog2.php?edit_id=<?php echo $row['id'] ?>" class="btn btn-primary mt-3">Edit</a>
                <a href="deleteblog2.php?del_id=<?php echo $row['id'] ?>" class="btn btn-danger mt-3"
                    name="delete">Delete</a>

            </div>
        </div>
    </div>


</body>

</html>