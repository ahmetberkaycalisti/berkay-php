<?php

include("includes/header.php");

?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <?php

                include("side_nav.php");

                    ?>


                <?php

                    
                    if ($_SERVER['REQUEST_URI'] == '/berkay-php/admin/' || $_SERVER['REQUEST_URI'] == '/admin/index.php') {
                        include("admin_content.php");
                    }

                    if (isset($_GET['categories'])) {
                        include("categories.php");
                    }


                ?>



            



                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php

include('includes/footer.php');

?>