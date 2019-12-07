<div class="col-12 col-xl-3 p-1 border rounded shadow">
    <button type="submit" class="btn btn-block" style="" disabled id="serverstatus">Connection to server status </button>
    <?php if(connectionToServerStatus() == true) {//jeigu prisijungimas prie serverio yra galimas , grazinama true reiksme ir padaromas mygtukas y zalia, o jei ne y raudona.
                                                  //bei darasoma mygutko value += true arba += false
        echo "<script>changeButtonStatusTo('green','serverstatus');</script>"; 
    } 
    else{
        echo "<script>changeButtonStatusTo('red','serverstatus');</script>"; 
    }
    ?>

</div>

<div class="col-12 col-xl-3 p-1 border rounded shadow">
    <button type="submit" class="btn btn-block" style="" disabled id="databasestatus">Connection to database status </button>
    <?php if(connectionToDatabaseStatus() == true) {//jeigu prisijungimas prie duomenu bazes yra galimas , grazinama true reiksme ir padaromas mygtukas y zalia, o jei ne y raudona.
                                                  //bei darasoma mygutko value += true arba += false
        echo "<script>changeButtonStatusTo('green','databasestatus');</script>"; 
    } 
    else{
        echo "<script>changeButtonStatusTo('red','databasestatus');</script>"; 
    }
    ?>

</div>

<div class="col-12 col-xl-3 p-1 border rounded shadow">
    <button type="submit" class="btn btn-primary btn-block" style="" disabled id="tablestatus">Connection to table</button>
    <?php if(connectionToTableStatus() == true) {//jeigu prisijungimas prie lenteles yra galimas , grazinama true reiksme ir padaromas mygtukas y zalia, o jei ne y raudona.
                                                  //bei darasoma mygutko value += true arba += false
       echo "<script>changeButtonStatusTo('green','tablestatus');</script>";
    } 
    else{
        echo "<script>changeButtonStatusTo('red','tablestatus');</script>";
    }
    ?>

</div>

<div class="col-12 col-xl-3 p-1 border rounded shadow">
    <button type="submit" class="btn btn-block" style="" disabled id="adminstatus">Does admin exist</button>

    <?php if(doesAdminExist() == true) {//jeigu prisijungimas prie admin user yra galimas , grazinama true reiksme ir padaromas mygtukas y zalia, o jei ne y raudona.
                                        //bei darasoma mygutko value += true arba += false
        echo "<script>changeButtonStatusTo('green','adminstatus');</script>"; 
    } 
    else{
        echo "<script>changeButtonStatusTo('red','adminstatus');</script>"; 
    }
    ?>
    
</div>








<div class="col-12 col-xl-3 p-1 border rounded shadow">
<button type="submit" class="btn btn-block" style="" disabled id="loginstatus">Login Status</button>
<?php loginStatus();//atspauzdinama ar esate prisijunge prie kazkokio vartotojo #loginstatus mygtuke ?>
</div>




    <?php if(connectionToDatabaseStatus() == false){//jeigu prisijungimas prie duomenu bazes NEgalimas rodo melyna mygtuka ir siulo sukurt duomenu baze?>
                <div class="col-12 col-xl-3 p-1 border rounded shadow">
                    <form action="includes/managedatabase.php" method="post" class="col-12" class="form-control" style="padding: 0px;">
                    <button type="submit" class="btn btn-primary btn-block" style="" name="createdatabase">Create Database</button>
                    </form>
                </div>
    <?php } ?>


    <?php if(connectionToDatabaseStatus() == true){//jeigu prisijungimas prie duomenu bazes YRA galimas, rodo raudona mygtuka ir siulo sunaikint duomenu baze?>
                <div class="col-12 col-xl-3 p-1 border rounded shadow">
                    <form action="includes/managedatabase.php" method="post" class="col-12" class="form-control" style="padding: 0px;">
                    <button type="submit" class="btn btn-danger btn-block" style="" name="deletedatabase">Delete Database</button>
                    </form>
                </div>
    <?php } ?>


    <?php if(connectionToTableStatus() == false){//jeigu prisijungimas prie duomenu lenteles NEgalimas rodo melyna mygtuka ir siulo sukurt duomenu lentele?>
                <div class="col-12 col-xl-3 p-1 border rounded shadow">
                    <form action="includes/managedatabase.php" method="post" class="col-12" class="form-control" style="padding: 0px;">
                    <button type="submit" class="btn btn-primary btn-block" style="" name="createtable">Create Table</button>
                    </form>
                </div>
    <?php } ?>

    <?php if(connectionToTableStatus() == true){//jeigu prisijungimas prie duomenu lenteles YRA galimas, rodo raudona mygtuka ir siulo sunaikint duomenu baze?>
                <div class="col-12 col-xl-3 p-1 border rounded shadow">
                    <form action="includes/managedatabase.php" method="post" class="col-12" class="form-control" style="padding: 0px;">
                    <button type="submit" class="btn btn-danger btn-block" style="" name="deletetable">Erase Table</button>
                    </form>
                </div>
    <?php } ?>


    <?php if(doesAdminExist() == false){ //jeigu prisijungimas prie admin vartotojo NEgalimas rodo melyna mygtuka ir siulo sukurt irasa duomenu lentelej?>
                <div class="col-12 col-xl-3 p-1 border rounded shadow">
                    <form action="includes/managedatabase.php" method="post" class="col-12" class="form-control" style="padding: 0px;">
                    <button type="submit" class="btn btn-primary btn-block" style="" name="adminreborn">Let admin to be reborn</button>
                    </form>
                </div>
    <?php } ?>

    <?php if(doesAdminExist() == true){//jeigu prisijungimas prie admin vartotojo YRA galimas, rodo raudona mygtuka ir siulo sunaikint irasa duomenu lentelej?>
                <div class="col-12 col-xl-3 p-1 border rounded shadow">
                    <form action="includes/managedatabase.php" method="post" class="col-12" class="form-control" style="padding: 0px;">
                    <button type="submit" class="btn btn-danger btn-block" style="" name="adminkill">Kill admin</button>
                    </form>
                </div>
    <?php } ?>
    

</form>