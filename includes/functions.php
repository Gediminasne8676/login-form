<?php 


function doesAdminExist(){//patikrinam ar yra toks vartotojas kaip admin users lenteleje
    global $connection;
    if(connectionToTableStatus() == true){
        $query = "SELECT * FROM users WHERE username = 'admin'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);

        if(mysqli_num_rows($result)>=1){
            return true;
        }
        else if(mysqli_num_rows($result)<1)//jei nepavyksta prisijungimas
        {
            return false;
        }
    }
}

function connectionToTableStatus(){//patikrinam prisijungimo su lentele statusa ir grazinam reiksme treu arba false
global $connection;
    if(connectionToDatabaseStatus() == true){

        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);

        if($result){
            return true;
        }
        else if(!$result)//jei nepavyksta prisijungimas
        {
            return false;
        }
    }
}

function connectionToDatabaseStatus(){//jeigu yra prisijungimas prie duomenu bazes tuomet grazinam true
global $connection;
    if(connectionToServerStatus() == true){
        if($connection){
            return true;
        }
        else if(!$connection){
            return false;
        }
    }
}

function connectionToServerStatus(){//patikrinam prisijungimo su serveriu statusa

    global $serverconnection;
    if($serverconnection){
        return true;
    }
    else if(!$serverconnection)//jei nepavyksta prisijungimas
    {
        return false;
    }
}


function loginStatus(){//pakeiciam login statuso mygtuko spalva, dadedam true arba false teksta mygtuke ir grazinam true arba false reiksme
    if(isset($_SESSION['username'])){
        echo "<script>changeButtonStatusTo('green','loginstatus');</script>";
        return true;
    }
    if(!isset($_SESSION['username'])){
        echo "<script>changeButtonStatusTo('red','loginstatus');</script>";
        return false;
    }
}

function login_user($username, $password){//prisijungimo funkcija
    global $connection;//atsitempiam global connection kintamaji
    
        $result = mysqli_query($connection, "SELECT password FROM users WHERE username = '{$username}'");//pasiemam slaptazodi is duomenu bazes
        confirmQuery($result);

        $hash = mysqli_fetch_array($result);//isgaudanam masyva is uzklausos
        $hash = $hash['password'];//isgaunam slaptazodi is uzklausos
        
        if(password_verify($password,$hash)){//tikrinam ar ivestas slaptazodis tinka su slaptazodziu duomenu bazej
//prisijungt pavyko
            $query = "SELECT * FROM users WHERE username = '{$username}' ";
            $select_user_query = mysqli_query($connection, $query);
            confirmQuery($select_user_query);
            
            while($row = mysqli_fetch_array($select_user_query)){//pritaikom kintamiesiams user reiksmes
                $db_user_id = $row['user_id'];
                $db_username = $row['username'];
                $db_password = $row['password'];
            }

        $_SESSION['user_id'] = $db_user_id;//sesijai priskirta kintamieji
        $_SESSION['username'] = $username;
        // $_SESSION['password'] = $password;//zinau jog negalima laikyt passwordu sesijoje
        
        header("Location: ../index.php");//po prisijungimo persiunciama i index.php

        } 
        else {
            header("Location: ../index.php");//jeigu neiseina prisijungti vistiek persiunciama i index.php
        }
    }

function createAdmin(){//funkcija sukuria username = admin, password = admin vartotoja
global $connection;
    $username = "admin";
    $password = "admin";
    $password = password_hash($password, PASSWORD_BCRYPT, $options = array('cost' => 11));//uzcryptinam passworda

    $query = "INSERT into users (username, password)"; 
    $query .= "VALUES ('{$username}','{$password}')";//siunciam useri i lentele

    $create_user_query = mysqli_query($connection, $query);
    confirmQuery($create_user_query);

    if($create_user_query){
    echo "Table with user (name = admin, password = admin) was created";//atspausdinama jog buvo sukurta lentele su useriu
    }

}

function createTable(){//funkcija skirta sukurti lentele users
    global $connection;
        $query =  "CREATE TABLE users";//sukuriama lentele users
        $query .= "( `user_id` INT(3) NOT NULL AUTO_INCREMENT ,";// sukuriama lenteleje irasa user_id
        $query .= "`username` VARCHAR(255) NOT NULL , ";//irasas username
        $query .= "`password` VARCHAR(255) NOT NULL , ";//irasas password
        $query .= "PRIMARY KEY (`user_id`)) ENGINE = InnoDB;";//pirminis raktas lenteles yra user_id
    
        $result = mysqli_query($connection, $query);//siuncama uzklausa
        confirmQuery($result);//tikrinama uzklausa
    
    }

function createDataBase(){//funkcija skirta sukurti duomenu baze
    global $serverconnection;
        $result = mysqli_query($serverconnection,"CREATE DATABASE " . NAME);//kuriam duomenu baze
            confirmQuery($result);
            if($result){//jeigu pavyksta sukurti duomenu baze
                echo "Database " . NAME .  " was created succesfully";//spausdinam jog sukureme duomenu baze
            }

    }
    


function confirmQuery($result){//funkcija skirta patikrint ar isejo issiust uzklausa
    global $connection;
        if(!$result)
        {
            die("QUERY FAILED " . mysqli_error($connection));
        }
}



?>