<?php include "includes/header.php"?>
<?php include "includes/functions.php"?>
<?php include "includes/database.php"?>

<?php session_start();?>
</head>

<body>


    <div class="container center_div">
    <div class="row">
                



                <div class="col-12 col-xl-12 border rounded shadow-lg p-5 mb-5" style="margin-top: 50px;">
                        <form action="includes/login.php" method="post">


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

                        

                </div>


                <script type="text/javascript" src="js/script.js"></script>


                <?php include "includes/databasepanel.php"?>

       


    </div>
    


<?php 


?>

</body>
</html>