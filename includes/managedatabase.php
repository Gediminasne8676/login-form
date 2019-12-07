<?php include "functions.php";?>
<?php include "database.php";?>
<?php ob_start();?>
<?php 
if(isset($_POST['createdatabase'])){//jeigu paspaudziama mygutkas createdatabase, sukuriama duomenu baze
    createDataBase();
}

if(isset($_POST['deletedatabase'])){//jeigu paspaudziama mygutkas deletedatabase, istrinama duomenu baze
global $connection;
    $query = "DROP DATABASE " . NAME;
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
}

if(isset($_POST['createtable'])){//jeigu paspaudziama mygutkas createtable, sukuriama lentele users
    createTable();
}

if(isset($_POST['deletetable'])){//jeigu paspaudziama deletetable, istrinama lentele users
global $connection;
    $query = "DROP TABLE users";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
}

if(isset($_POST['adminreborn'])){//jeigu paspaudziama adminreborn mygtukas, y users lentele idedam admin irasa
    createAdmin();
}

if(isset($_POST['adminkill'])){//jeigu paspaudziama adminkill mygtukas, istrinamamas admin irasas is users lenteles
global $connection;
    $query = "DELETE FROM users WHERE username = 'admin'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
}
header("Location: ../index.php");

?>