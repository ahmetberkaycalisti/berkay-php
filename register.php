<?php

include("includes/header.php");

if (isset($_SESSION['username'])) {
    redirect("./");
    return;
}

?>



<div class="container">
    <div class="row main">
        
        <div class="main-login main-center" >
            <form class="form-horizontal" method="POST" action="">
            <h2 style="text-align: center; color:red;"><?php display_message(); ?></h2>
			<h2 style="text-align: center; color:darkGreen;"><?php display_success_message(); ?></h2>
                <?php register_user(); ?>
                <div class="form-group">
                    <label for="firstname" class="cols-sm-2 control-label">Your First name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="firstname" id="firstname"  placeholder="Enter your firstname" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname" class="cols-sm-2 control-label">Your Last name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Enter your lastname" required/>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Your Username</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="username" id="name"  placeholder="Enter your username" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Your Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <button type="submit" name="submit_button_register" class="btn btn-primary btn-lg btn-block login-button">Register</button>
                </div>

            </form>
        </div>
    </div>
</div>







<?php

include('includes/footer.php');

?>