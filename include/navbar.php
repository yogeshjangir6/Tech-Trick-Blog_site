<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href=<?php echo "$index_url" ?>>
          <img src="/blog/images/logo.png" alt="" width="30" height="24" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Programming Tutorials
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Php</a></li>
                <li><a class="dropdown-item" href="#">Java</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="#">Software Engineering</a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Tech Article</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $posts_url; ?>">All Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $top_posts_url; ?>  ">Top Post</a>
            </li>
          </ul>
          <ul class="nav navbar-nav me-5 mb-2">

<?php
     if(!isset($_SESSION['username'])) {
       ?>
      <form class="d-flex" action=<?php echo $login_url; ?> method="POST">
      <div class="form-group">
          <input type="text" class="form-control me-2" placeholder="Username" name="username">
      </div>
      <div class="form-group">
          <input type="password" class="form-control me-2" placeholder="Password" name="password">
      </div>
      <button type="submit" class="btn btn-default" name="submit">Sign In</button>
      <a href=<?php echo $register_url; ?> class="btn btn-default">Sign Up</a>
</form>


<?php


       }
     else 
       if(isset($_SESSION['username']))
       {
         $username=$_SESSION['username'];

?>

		 <li class="nav-item"><a class="nav-link text-success" href=<?php echo $newpost_url ?> >
		 		
        New Post
		 	</a>
		 </li>

        <li class="nav-item">
        	<a class="nav-link text-primary" href=<?php
			 if(isset($profile_url))
			 echo $profile_url; echo "?user=".$username; ?> >
        		Hello <?php echo "$username" ?>
        	</a>
        </li>

        <li class="nav-item">
        	<a class="nav-link text-danger" href=<?php echo $logout_url ?> >
        		Logout
        	</a>
        </li>
<?php
}
?>

</ul>
          <form action="search.php" class="d-flex navbar-form pull-left" method="post">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
              name="searchText"
            />
            <button class="btn btn-outline-success" type="submit" name="submit">
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>
