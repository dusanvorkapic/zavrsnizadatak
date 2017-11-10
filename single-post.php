<?php

    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "Blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>

<?php include("header.php") ?>






<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

      
          <?php
               if (isset($_GET['post_id'])) {

                   $sql = "SELECT * FROM posts WHERE id = {$_GET['post_id']}";
                   $statement = $connection->prepare($sql);

                   $statement->execute();

                   $statement->setFetchMode(PDO::FETCH_ASSOC);

                   $singlePost = $statement->fetch();

           ?>

           <div class="blog-post">
                <h2 class="blog-post-title"><?php echo($singlePost['Title']) ?></h2>
                <p class="blog-post-meta"><?php echo $singlePost['Created_at'] . ' by ' . $singlePost['Author']?> </p>

                <p><?php echo $singlePost['Body'] ?></p>
            </div>

            <?php
               } else {
                   echo('post_id nije prosledjen kroz $_GET');
               }
           ?>


           <div class="komentar-forma">

                <h3>Leave a Comment:</h3>

                  <form action="post_comment.php" method="post" id="commentform">

                    <label for="comment_author" class="required">Your name:</label>
                    <input type="text" name="comment_author" id="comment_author" value="" tabindex="1" required="required">

                    <label for="comment" class="required">Your comment:</label>
                    <textarea name="comment" id="comment" rows="5" tabindex="4"  required="required"></textarea>

                
                    <input type="hidden" name="comment_post_ID" value = "<?php echo ($_GET['post_id']) ?>" id="comment_post_ID" />
                    <input class="submitcommentdugme" name="submit" type="submit" value="Submit comment" />

                  </form>

            </div>




           <div class="hide-show">
                <a id="hide-show" class="btn btn-outline-primary" onclick="hide()">Hide Comments</a>
            </div><!--hideButton-->    


           <div class="comments" id="333">
                <h4><b><i>Comments:</i></b></h4>
                
                

                <div class="comment">
                <?php
                        $sqlCom = "SELECT * FROM comments WHERE Post_id={$_GET['post_id']}";
                        $statementC = $connection->prepare($sqlCom);
                        $statementC->execute();
                        $statementC->setFetchMode(PDO::FETCH_ASSOC);
                        $comments = $statementC->fetchAll();
              

               foreach ($comments as $singleCom) {

           ?>
                <div class="nekiKomentar" id="666">
               <ul>
                    <li><?php echo $singleCom['Author']; ?> </li>
                    <li><?php echo $singleCom['Text']; ?></li>
               </ul>
               
                <form class="deleteComm" method="post" action='delete_comment.php'>
                           <input class="dugme" type="submit" name="delete" value="Delete comment">
                           <input type="hidden" name="id" value="<?php echo $singleCom['id'] ?>">
                           <input type="hidden" name="post_id" value="<?php echo $_GET['post_id'] ?>">
                </form> 
               <hr>


               </div>
           <?php
           }
           ?>

                
                </div><!--comment-->
            </div><!--/.comments-->
           
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->

  <?php include("sidebar.php") ?>

       

    </div><!-- /.row -->

</main><!-- /.container -->
<?php include("footer.php") ?>


<script type="text/javascript">



 function hide()
     {

           var div = document.getElementById("333");
           var button = document.getElementById("hide-show");
            if (div.style.display !== "none") {
                button.innerHTML = "Show comments";
                div.style.display = "none";
            }
            else {
                button.innerHTML = "Hide comments";
                div.style.display = "block";
            }
     }

</script>

</body>
</html>