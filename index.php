<?php 
include "includes/header.php";
include "includes/database.php";
include "includes/functions.php";
?>

<body>

    <div class="container" style="">


        <?php  include "includes/logintab.php"; ?>

        <?php 
        if(isset($_SESSION['username']) && isset($_SESSION['user_id'])){

            include "includes/table.php"; 

        }
        ?>

        <?php include "includes/databasepanel.php";?>

    </div>

</body>

</html>