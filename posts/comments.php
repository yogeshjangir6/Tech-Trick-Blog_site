<?php
    /* fetch comments from db */
      $query="SELECT * FROM comments WHERE postID='$id'  ";
      $result=mysqli_query($conn , $query);

      if($result) {
        echo "
        <div class='panel-footer'>
        Comments
        </div>
        ";
          if(mysqli_num_rows($result) > 0) {
            while($comment=mysqli_fetch_assoc($result)) {
               ?>
               <div class="panel-footer">
      <span>
            <a href=<?php echo "../users/profile.php?user=".$comment['commentAuthor'];?> >
                <?php echo $comment['commentAuthor']; ?>
            </a>

            <i>-</i>

              <?php echo $comment['commentDesc']; ?>

      </span>

      <span>
          <span class="pull-right"><i><?php echo $comment['commentTime']; ?></i></span>
      </span>
</div>

               <?php
            }
          }
      } else {
        echo "Query failed";
      }
?>
