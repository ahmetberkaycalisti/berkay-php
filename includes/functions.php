<?php


$upload_directory = "uploads";


//  Helpers functions


function last_id() {

    global $connection;
    return mysqli_insert_id($connection);

}

function set_message($msg) {
    if(!empty($msg)) {
        $_SESSION['message'] = $msg;

    } else {
        $msg = "";
    }
}

function display_success_message() {
 
    if(isset($_SESSION['success_message'])) {
        echo $_SESSION['success_message'];
        unset($_SESSION['success_message']);
    }

}

function set_success_message($msg) {

    if(!empty($msg)) {

        $_SESSION['success_message'] = $msg;
    
    } else {

        $msg = "";

    }
}

function display_message() {

    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location) {
    header("Location: $location");
}

function query($sql) {
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result) {
    global $connection;

    if(!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
}



function escape_string($string) {
    global $connection;

    return mysqli_real_escape_string($connection, $string);
}


function fetch_array($result) {
    return mysqli_fetch_array($result);
}


function count_all_records($table) {
    return mysqli_num_rows(query("SELECT * FROM $table"));
}


function count_all_products_in_stock(){
    return mysqli_num_rows(query("SELECT * FROM products WHERE product_quantity >= 1"));
}



/* *********************** FRONT END FUNCTIONS *********************** */


function login_user(){
    if (isset($_POST['submit_button_login'])) {
        // echo "<br>";
        // echo "<br>";
        // echo "BABAA BASILDI";
        // echo "<br>";
        // echo "<br>";
        // echo $_POST['username'];
        // echo "<br>";
        // echo $_POST['password'];

        $username = "";
        $password = "";

        if(!empty($_POST['username']) && !empty($_POST['password'])) {

            $username = escape_string($_POST['username']);
            $password = escape_string($_POST['password']);
            $password = md5($password);
            $query = query("SELECT * FROM users WHERE user_username='$username' AND user_password='$password'");
            confirm($query);

            if (mysqli_num_rows($query) == 0) {
                echo "<script>alert('USERNAME VEYA PASSWORD YANLIS! LUTFEN TEKRAR KONTROL EDINIZ')</script>";    
            } else {
                
                echo "<script>alert('USER BULUNDU GIRIS YAPILDI')</script>";    

                while ($row = fetch_array($query)) {
                    $_SESSION['username'] = $row['user_username'];
                    $_SESSION['email'] = $row['user_email'];
                }
                
                redirect("index.php");
                return;

            }
            
            
        } else {
            echo "<script>alert('BABA BIRISI BOS')</script>";

        }

    }
} // end of function login_user

function register_user() {

    if (isset($_POST['submit_button_register'])) {

        
        if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm'])) {

            $firstname = escape_string($_POST['firstname']);
            $lastname = escape_string($_POST['lastname']);
            $username = escape_string($_POST['username']);
            $email = escape_string($_POST['email']);
            $password = escape_string($_POST['password']);
            $confirm = escape_string($_POST['confirm']);

            if ($password != $confirm) {
                // echo "<script>alert('BABA SIFRELER UYUSMUYOR')</script>";    
                set_message("BABA SIFRELER UYUSMUYOR");
                redirect("register");
                return;
            }


            $firstname = strip_tags($firstname);   // Remove html tags
            $firstname = str_replace(' ', '', $firstname);      // remove spaces
            $firstname = ucfirst(strtolower($firstname));   // Uppercase first letter

            $lastname = strip_tags($lastname);   // Remove html tags
            $lastname = str_replace(' ', '', $lastname);      // remove spaces
            $lastname = ucfirst(strtolower($lastname));   // Uppercase first letter

            $username = strip_tags($username);   // Remove html tags
            $username = str_replace(' ', '', $username);      // remove spaces
            $username = ucfirst(strtolower($username));   // Uppercase first letter

            $email = strip_tags($email);   // Remove html tags
            $email = str_replace(' ', '', $email);      // remove spaces
            $email = strtolower($email);   // Uppercase first letter

            $password = strip_tags($password);   // Remove html tags
            $password = str_replace(' ', '', $password);      // remove spaces

            $confirm = strip_tags($confirm);   // Remove html tags
            $confirm = str_replace(' ', '', $confirm);      // remove spaces


            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                

                $query = query("SELECT user_email from users WHERE user_email='$email'");
                confirm($query);

                $num_rows = mysqli_num_rows($query);
                if($num_rows > 0) {
                    set_message("THIS EMAIL ADDRESS USED BEFORE FOR ANOTHER USER");
                    redirect("register");
                    return;
                }

                $password = md5($password);

                $query = query("INSERT INTO users VALUES(NULL, '$firstname','$lastname','$email',NULL,'$username','$password','','')");
                confirm($query);
                set_success_message("YOUR ACCOUNT IS CREATED. PLEASE LOG IN!");
                redirect("login");
                return;
            }


        } else {
            // echo "<script>alert('BABA BIRISI BOS')</script>";
            set_message("BABA BIRISI BOS");
            redirect("register");
            return;
        }

    }


}


?>


