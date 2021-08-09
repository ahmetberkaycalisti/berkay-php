<?php

require_once("../includes/config.php");


if(isset($_GET['delete_category_id'])) {
    $query_find = query("DELETE FROM categories WHERE cat_id=" . escape_string($_GET['delete_category_id']) . "");
    confirm($query_find);

    set_message("Category deleted");
    redirect("index.php?categories");
    return;

} else { 

    redirect("index.php?categories");
    return;
}

?>