<?php
 
	header("Location: single-post.php?post_id={$_POST['comment_post_ID']}");

 $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "Blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    // var_dump($_POST);


    $newComment = "INSERT INTO comments (Author, Text, Post_id) VALUES ('{$_POST['comment_author']}', '{$_POST['comment']}', '{$_POST['comment_post_ID']}')";

        $statement = $connection->prepare($newComment);
        $statement->execute();


?>