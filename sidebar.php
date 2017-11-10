<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
                <h4><b>Latest posts:</b></h4>
               
                 <?php


    // ako su mysql username/password i ime baze na vasim racunarima drugaciji
    // obavezno ih ovde zamenite
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

              $sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 5";
              $statement = $connection->prepare($sql);
              $statement->execute();
              $statement->setFetchMode(PDO::FETCH_ASSOC);
            $posts = $statement->fetchAll();
          ?>

          <?php
            
              foreach ($posts as $post) {
          ?>
              <div class="blog-post">
                   <h4><a href="single-post.php?post_id=<?php echo($post['id']) ?>"><?php echo($post['Title']) ?></a></h4>
                   <p class="blog-post-meta"></p>
               </div>
                 

          <?php
              }
          ?>

    </div>
           <!--  </div>
            <div class="sidebar-module">
               




            </div>
            <div class="sidebar-module">
               



            </div> -->
 </aside><!-- /.blog-sidebar -->