<?php

    include('includes/header.php');

    if (isset($_SESSION['username'])) {
        redirect("./");
        return;
    }


?>
    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Login</h1>`
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">
            <h2 style="text-align: center; color:red;"><?php display_message(); ?></h2>
			<h2 style="text-align: center; color:darkGreen;"><?php display_success_message(); ?></h2>
			<?php login_user(); ?>
                <div class="form-group"><label for="">
                    username<input type="text" name="username" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="password" name="password" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit_button_login" class="btn btn-primary" >
                </div>
            </form>
        </div>  


    </header>


        </div>

    </div>
    <!-- /.container -->

<?php


include('includes/footer.php');


?>