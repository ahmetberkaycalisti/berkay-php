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



/* *********************** FRONT END FUNCTIONS *********************** */




?>


