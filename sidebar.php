<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
                <h4><b>Latest posts:</b></h4>
               
                 <?php

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