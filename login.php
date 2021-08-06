<?php

    include('includes/header.php');
?>
    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Login</h1>`
            <?php

                if(isset($_SESSION['username'])) {
                    echo "Welcome " . $_SESSION['username'];
                }

            ?>
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

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2030</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
