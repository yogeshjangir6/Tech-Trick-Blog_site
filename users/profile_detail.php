<div class="container">
      <div class="row">
        <div class="col-12" >
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="text-success h4">Your Profile </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name</td>
                        <td><?php echo $row['firstname']; ?></td>
                      </tr>
                      <tr>
                        <td>User Handle</td>
                        <td><?php echo $row['username']; ?></td>
                      </tr>
                        <tr>
                          <td>Email</td>
                          <td><?php echo $row['emailid']; ?></td>
                        </tr>
                      </tr>
                    </tbody>
                  </table>
                  <a href=<?php echo "../posts/post.php?user=".$_REQUEST['user']; ?> class="btn btn-default">My Posts</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
