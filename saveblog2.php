<?php 
include 'db_conn.php';


if(isset($_POST['save'])){
    $title =  $conn -> real_escape_string(htmlspecialchars($_POST['title']));
    $excerpt =  $conn ->  real_escape_string(htmlspecialchars($_POST['excerpt']));
    $content =   $conn -> real_escape_string(htmlspecialchars($_POST['content']));

    if(empty($title)){
        $title_error = "Title is required";
    }
    elseif(empty($excerpt)){
        $excerpt_error = "Excerpt is required";
    }
    elseif(empty($content)){
        $content_error = "Content is required";
    }
    else{
        $conn->query("INSERT INTO  `blog2` (`title`, `excerpt`, `content`) VALUES ('$title', '$excerpt', '$content')") or die($conn->error);
        
        $title =  "";
        $excerpt =  "";
        $content =   "";
    }
}


?>