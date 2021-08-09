<?php

require_once('config.php');





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost/berkay-php/" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">Berkay E-Commerce</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Shop</a>
                    </li>
                     <li>
                        <a href="checkout.html">Checkout</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>

                </ul>
                
            <ul class="nav navbar-nav navbar-right">
                
                <?php

                    if (!isset($_SESSION['username'])) {

                        $osman = "BABBBAA";
                        echo <<<DELIMETER

                    <li class="dropdown">
                        <a href="register">
                            <span class="glyphicon glyphicon-plus"></span> 
                            <strong>Register</strong>
                        </a>
                    </li>


DELIMETER;
                    }


                ?>


                <li class="dropdown">
                    <a href="login" 
                    <?php 
                        if (isset($_SESSION['username'])) {
                            echo "class='dropdown-toggle' data-toggle='dropdown'";
                        }
                    ?> 
                    
                    
                    >
                        <span class="glyphicon glyphicon-user"></span> 
                        <?php

                            if(isset($_SESSION['username'])) {
                                echo "<strong>" . $_SESSION['username'] . "</strong>";
                            } else { 
                                echo "<strong>Login</strong>";
                            }

                        ?>
                        
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong><?php if (isset($_SESSION['username'])) echo $_SESSION["username"]; ?></strong></p>
                                        <p class="text-left small"><?php if (isset($_SESSION['email'])) echo $_SESSION["email"]; ?></p>
                                        <p class="text-left">
                                            <a href="#" class="btn btn-primary btn-block btn-sm">Profile</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php

                            if(isset($_SESSION['status'])) {
                                $status = $_SESSION['status'];

                                if ($status == 4) {
                                    echo <<<DELIMETER

                                    <li class="divider"></li>
                                    <li>
                                        <div class="navbar-login navbar-login-session">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p>
                                                        <a href="admin/" class="btn btn-warning btn-block">Admin</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

DELIMETER;                                    
                                }
                            }

                        ?>

                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="logout" class="btn btn-danger btn-block">Logout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
