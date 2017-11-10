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

            

            <div class="novi-post">

                <div class="novi-post1">
         <h1>Create new post</h1>
         <form>
        <fieldset>
            <label for="title">Title:</label><br/>
            <input type="text" id="title" name="post[title]" value=""/><br/>
            <label for="author">Author:</label><br/>
            <input type="text" id="title" name="post[title]" value=""/><br/>    
            <label for="content">Content:</label><br/>
            <textarea id="content" name="post[content]" rows="20" cols="50"></textarea><br/>
            <input type="submit" value="Create Post"/>
        </fieldset>
        </form>
            </div><!--novi-post1-->
            
            </div><!-- /.novi-post -->
            </br></br>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->

  <?php include("sidebar.php") ?>

       

    </div><!-- /.row -->

</main><!-- /.container -->
<?php include("footer.php") ?>

</body>
</html>
