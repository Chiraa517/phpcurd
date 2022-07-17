<?php
include 'db_conn.php';


if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];

    $data = $conn->query("SELECT * FROM `blog2` WHERE id = $id ") or die($conn->error);

    $row = $data->fetch_assoc();
}

if (isset($_POST['update'])) {
    $title =  $conn->real_escape_string(htmlspecialchars($_POST['title']));
    $excerpt =  $conn->real_escape_string(htmlspecialchars($_POST['excerpt']));
    $content =   $conn->real_escape_string(htmlspecialchars($_POST['content']));

    if (empty($title)) {
        $title_error = "Title is required";
    } elseif (empty($excerpt)) {
        $excerpt_error = "Excerpt is required";
    } elseif (empty($content)) {
        $content_error = "Content is required";
    }

    $data = $conn->query("UPDATE `blog2` SET`title`='$title',`excerpt`='$excerpt',`content`='$content' WHERE `id` = '$id' ") or die($conn->error);

    header("LOCATION: blog2.php");
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
    <title>Edit Blog</title>
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



    <!-- edit and update blog  -->
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="container mt-5 mb-5">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Edit Title</span>
                <input type=" text" class="form-control" name="title" value="<?php echo $row['title']; ?>">
            </div>
            <p class="text-danger"><?php echo $title_error ?? ''; ?></p>

            <div class="input-group mt-4 mb-4">
                <span class="input-group-text">Edit Excerpt</span>
                <textarea class="form-control" name="excerpt"><?php echo $row['excerpt']; ?></textarea>
            </div>
            <p class="text-danger"><?php echo $excerpt_error ?? ''; ?></p>

            <div class="input-group">
                <span class="input-group-text">Edit Content</span>
                <textarea class="form-control" name="content"><?php echo $row['content']; ?></textarea>
            </div>
            <p class="text-danger"><?php echo $content_error ?? ''; ?></p>

            <button type="submit" class="btn btn-success mt-3" name="update">Update</button>
        </div>
    </form>

</body>

</html>