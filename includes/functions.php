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

        $query = "CREATE TABLE `table`";
        $query .=" ( `row_id` INT(255) NOT NULL AUTO_INCREMENT ,";
        $query .=" `col_A` VARCHAR(255) NOT NULL ,";
        $query .=" `col_B` VARCHAR(255) NOT NULL ,";
        $query .=" `col_C` VARCHAR(255) NOT NULL ,";
        $query .=" `col_D` VARCHAR(255) NOT NULL ,";
        $query .=" `col_E` VARCHAR(255) NOT NULL ,";
        $query .=" `col_F` VARCHAR(255) NOT NULL ,";
        $query .=" `col_G` VARCHAR(255) NOT NULL ,";
        $query .="PRIMARY KEY (`row_id`)) ENGINE = InnoDB;";
        $result = mysqli_query($connection, $query);//siuncama uzklausa
        confirmQuery($result);//tikrinama uzklausa

        $query = "INSERT INTO `table` (`row_id`, `col_A`, `col_B`, `col_C`, `col_D`, `col_E`, `col_F`, `col_G`) VALUES (NULL, '', '', '', '', '', '', '');";//kuriame reiksmes table lentelej
        $result = mysqli_query($connection, $query);//siuncama uzklausa
        confirmQuery($result);//tikrinama uzklausa
        $query = "INSERT INTO `table` (`row_id`, `col_A`, `col_B`, `col_C`, `col_D`, `col_E`, `col_F`, `col_G`) VALUES (NULL, '', '', '', '', '', '', '');";//kuriame reiksmes table lentelej
        $result = mysqli_query($connection, $query);//siuncama uzklausa
        confirmQuery($result);//tikrinama uzklausa
        $query = "INSERT INTO `table` (`row_id`, `col_A`, `col_B`, `col_C`, `col_D`, `col_E`, `col_F`, `col_G`) VALUES (NULL, '', '', '', '', '', '', '');";//kuriame reiksmes table lentelej
        $result = mysqli_query($connection, $query);//siuncama uzklausa
        confirmQuery($result);//tikrinama uzklausa
        $query = "INSERT INTO `table` (`row_id`, `col_A`, `col_B`, `col_C`, `col_D`, `col_E`, `col_F`, `col_G`) VALUES (NULL, '', '', '', '', '', '', '');";//kuriame reiksmes table lentelej
        $result = mysqli_query($connection, $query);//siuncama uzklausa
        confirmQuery($result);//tikrinama uzklausa
        $query = "INSERT INTO `table` (`row_id`, `col_A`, `col_B`, `col_C`, `col_D`, `col_E`, `col_F`, `col_G`) VALUES (NULL, '', '', '', '', '', '', '');";//kuriame reiksmes table lentelej
        $result = mysqli_query($connection, $query);//siuncama uzklausa
        confirmQuery($result);//tikrinama uzklausa
        $query = "INSERT INTO `table` (`row_id`, `col_A`, `col_B`, `col_C`, `col_D`, `col_E`, `col_F`, `col_G`) VALUES (NULL, '', '', '', '', '', '', '');";//kuriame reiksmes table lentelej
        $result = mysqli_query($connection, $query);//siuncama uzklausa
        confirmQuery($result);//tikrinama uzklausa
        $query = "INSERT INTO `table` (`row_id`, `col_A`, `col_B`, `col_C`, `col_D`, `col_E`, `col_F`, `col_G`) VALUES (NULL, '', '', '', '', '', '', '');";//kuriame reiksmes table lentelej
        $result = mysqli_query($connection, $query);//siuncama uzklausa
        confirmQuery($result);//tikrinama uzklausa
        $query = "INSERT INTO `table` (`row_id`, `col_A`, `col_B`, `col_C`, `col_D`, `col_E`, `col_F`, `col_G`) VALUES (NULL, '', '', '', '', '', '', '');";//kuriame reiksmes table lentelej
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