<?php include "includes/header.php"?>
<?php include "includes/functions.php"?>
<?php include "includes/database.php"?>

<?php session_start();?>
</head>

<body>


<div class="container" style="">




<div class="col-12 card border rounded shadow-lg p-0" style="margin-bottom: 50px;">


    <div class="card-header">

        <nav>      
            <ul class="nav nav-tabs nav-fill card-header-tabs"  id="nav-tab" role="tablist">
                    <a href="#" class="nav-item nav-link active" id="login-form-tab"  onclick="">Login</a>
                    <a href="#" class="nav-item nav-link" id="register-form-tab"  onclick="">Registration</a>
            </ul>
        </nav>   

    </div>



    <div class="card-body card-content">
    
        <form action="includes/login.php" method="post" id="login-form">


            <?php if(!isset($_SESSION['username'])){ //Jeigu nera sukurta sesija (neprisijungta prie vartotojo) tuomet duoti prisijungimo laukelius ir mygtuka ?> 

            <div class="form-group">
                    <p class="h1 text-center">Log in</p>
            </div>

            <div class="input-group form-group">
                <input type="text" class="form-control" placeholder="Username" name="username" id="name" onkeyup="lettersOnly(this)">
            </div>

            <div class="input-group form-group">                      
                <input type="password" class="form-control" placeholder="Password" name="password" id="pass" onkeyup="lettersOnly(this)">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Login" name="login">
            </div>
            <?php } ?>



            <?php 
            if(isset($_SESSION['username'])){ //Jeigu yra sukurta sesija (prisijungta prie vartotojo) tuomet duoti atsijungimo mygtuka ?> 

            <div class="form-group">
                    <p class="h1 text-center">Logged in as <?php echo $_SESSION['username'];?></p>
            </div>

            <div class="form-group">
                    <p class="h1 text-center"></p>
            </div>

                <a href="./includes/logout.php"><input class="btn btn-danger btn-block" type="button" value="Logout"></a>
            <?php
            }
            ?>

        </form> 

    
        <form action="includes/registration.php" method="post" id="register-form" style="display: none;">


            <div class="form-group">
                    <p class="h1 text-center">Register</p>
            </div>

            <div class="input-group form-group">
                <input type="text" class="form-control" placeholder="Username" name="rusername" id="name" onkeyup="lettersOnly(this)">
            </div>

            <div class="input-group form-group">                      
                <input type="password" class="form-control" placeholder="Password" name="rpassword" id="pass" onkeyup="lettersOnly(this)">
            </div>

            <div class="input-group form-group">                      
                <input type="password" class="form-control" placeholder="Confirm Password" name="rconfirmpassword" id="confirmpass" onkeyup="lettersOnly(this)">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success btn-block" value="Register" name="register">
            </div>

        </form> 

    </div>


</div>

                <script type="text/javascript" src="js/script.js"></script>

                <?php include "includes/databasepanel.php"?>

</div>


<?php 


?>

</body>
</html>