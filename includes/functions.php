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
            $query = query("SELECT * FROM users WHERE user_username='$username' AND user_password='$password'");
            confirm($query);

            if (mysqli_num_rows($query) == 0) {
                echo "<script>alert('USERNAME VEYA PASSWORD YANLIS! LUTFEN TEKRAR KONTROL EDINIZ')</script>";    
            } else {
                
                echo "<script>alert('USER BULUNDU GIRIS YAPILDI')</script>";    

                while ($row = fetch_array($query)) {
                    $_SESSION['username'] = $row['user_username'];
                    $_SESSION['username'] = $row['user_username'];
                }

                redirect("login.php");
                return;

            }
            
            
        } else {
            echo "<script>alert('BABA BIRISI BOS')</script>";

        }

    }
}

?>


