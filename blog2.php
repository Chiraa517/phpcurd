<?php include 'saveblog2.php'; ?>



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
    <title>Blog</title>
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






    <div class="container ">
        <p class="h1 mt-5">Create Blogs</p>
    </div>

    <!-- add blog  -->
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="container mt-5 mb-5">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Enter Title</span>
                <input type=" text" class="form-control" name="title" value="<?php echo $title ?? ''; ?>">
            </div>
            <p class="text-danger"><?php echo $title_error ?? ''; ?></p>

            <div class="input-group mt-4 mb-4">
                <span class="input-group-text">Enter Excerpt</span>
                <textarea class="form-control" name="excerpt"><?php echo $excerpt ?? ''; ?></textarea>
            </div>
            <p class="text-danger"><?php echo $excerpt_error ?? ''; ?></p>

            <div class="input-group">
                <span class="input-group-text">Enter Content</span>
                <textarea class="form-control" name="content"><?php echo $content ?? ''; ?></textarea>
            </div>
            <p class="text-danger"><?php echo $content_error ?? ''; ?></p>

            <button type="submit" class="btn btn-primary mt-3" name="save">Save</button>
        </div>
    </form>


    <!-- Card blogs  -->
    <!-- getting data from database -->
    <?php $data = $conn->query("SELECT * FROM `blog2`") or die($conn->error); ?>
    <div class="container">
        <p class="h1 mb-4">Blogs</p>
    </div>
    <?php while ($row = $data->fetch_assoc()) { ?>
    <div class="container mt-4 mb-5">
        <!-- head -->
        <div class="card w-50">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['title']; ?></h5>
                <p class="card-text"><?php echo $row['excerpt'] ?></p>
                <a href="readmore.php?readmore_id=<?php echo $row['id']; ?>" class="btn btn-primary">Read more</a>
            </div>
        </div>
    </div>
    <?php } ?>

</body>

</html>