<?php include "includes/header.php"?>
<?php include "includes/functions.php"?>
<?php include "includes/database.php"?>
<?php session_start();?>

</head>

<?php 
//paspaudus mygtukui save siunciama visa lentele atgal y duomenu baze taip atnaujina informacija
if(isset($_POST['save'])){//suveikia jeigu is formos atsiunciamas jog yra nuspausta mygutkas save
  $query = "SELECT * FROM `table`";//paemam visa lentele is duomenu bazes
  $result = mysqli_query($connection, $query);
  confirmQuery($result);
  $number_of_rows = mysqli_num_rows($result);//patikrinam kiek yra is viso eiluciu

  for($i=1;$i<=$number_of_rows;$i++){//sukam tiek ciklu kiek yra eiluciu lentelej

    $A = $_POST[$i . "A"];//pritaikom kintamujui inputo value, input name = '1A' ...
    $B = $_POST[$i . "B"];
    $C = $_POST[$i . "C"];
    $D = $_POST[$i . "D"];
    $E = $_POST[$i . "E"];
    $F = $_POST[$i . "F"];
    $G = $_POST[$i . "G"];

  $query = "UPDATE `table` SET ";//updatinam lentele
  $query .= "col_A = '{$A}', ";//istatom y lentele duomenis kurie yra pakeisti inpute (arba ne)
  $query .= "col_B = '{$B}', ";
  $query .= "col_C = '{$C}', ";
  $query .= "col_D = '{$D}', ";
  $query .= "col_E = '{$E}', ";
  $query .= "col_F = '{$F}', ";
  $query .= "col_G = '{$G}' ";
  $query .=" WHERE row_id = {$i}";//ten kur eilues id atitinka dabartinio ciklo id
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
  }
  header("Refresh:0");//refreshinam svetaine nes nevisada refreshinas
}
?>

<body>

<div class="container" style="">
  <div class="col-12 card border rounded shadow-lg p-2" style="margin-bottom: 50px;">

    <div class="col-12 col-xl-12">

    <form action="table.php" method="post" id="" style="">
      <table class="" id="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">row_id</th>
            <th scope="col" id="cell01">col_A</th>
            <th scope="col" id="cell02">col_B</th>
            <th scope="col" id="cell03">col_C</th>
            <th scope="col" id="cell04">col_D</th>
            <th scope="col" id="cell05">col_E</th>
            <th scope="col" id="cell06">col_F</th>
            <th scope="col" id="cell07">col_G</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

      <?php 
      $query = "SELECT * FROM `table`";//paemam visus duomenis is duombazes lenteles `table`
      $result = mysqli_query($connection, $query);//siunciam query
      confirmQuery($result);//tikrinam query
      $row_number = 0;//ciklo budu skaiciuosim kelinta eilute yra israsyta
      while($row = mysqli_fetch_array($result)){//pritaikom kintamiesiams user reiksmes
        $row_id = $row['row_id'];//pritaikom kintamiesiams reiksmes is duombazes
        $col_A = $row['col_A'];
        $col_B = $row['col_B'];
        $col_C = $row['col_C'];
        $col_D = $row['col_D'];
        $col_E = $row['col_E'];
        $col_F = $row['col_F'];
        $col_G = $row['col_G'];

        echo "<tr id='row{$row_number}'>";//spausdinam visa lentele
        echo "<th scope='row'>{$row_number}</th>";
        echo "<th scope='row'>{$row_id}</th>";
        echo "<td id='cell{$row_id}1'><input type='text' class='form-control input-control' value='{$col_A}' name='{$row_id}A' id='{$row_number}A' readonly></td>";
        echo "<td id='cell{$row_id}2'><input type='text' class='form-control input-control' value='{$col_B}' name='{$row_id}B' id='{$row_number}B' readonly></td>";
        echo "<td id='cell{$row_id}3'><input type='text' class='form-control input-control' value='{$col_C}' name='{$row_id}C' id='{$row_number}C' readonly></td>";
        echo "<td id='cell{$row_id}4'><input type='text' class='form-control input-control' value='{$col_D}' name='{$row_id}D' id='{$row_number}D' readonly></td>";
        echo "<td id='cell{$row_id}5'><input type='text' class='form-control input-control' value='{$col_E}' name='{$row_id}E' id='{$row_number}E' readonly></td>";
        echo "<td id='cell{$row_id}6'><input type='text' class='form-control input-control' value='{$col_F}' name='{$row_id}F' id='{$row_number}F' readonly></td>";
        echo "<td id='cell{$row_id}7'><input type='text' class='form-control input-control' value='{$col_G}' name='{$row_id}G' id='{$row_number}G' readonly></td>";
        echo "<td><input type='button' class='btn btn-primary btn-block' style='width: 100px;' value='Edit' id='editrow{$row_number}' onclick='toggleEditRow({$row_number});'></td>";
        echo "</tr>";
        $row_number++;//dadedam vieneta kitam ciklui
      }?>
      
        </tbody>
      </table>

      </div>

      <div class="col-xl-12 col-12 text-right">
        <input type='button' class='btn btn-primary' style='width: 150px;' value='Select Hide' id='hidebtn'>
        <input type="submit" class="btn btn-success" style="width: 100px" value="Save" name="save" id="savetable">
      </div>

    </form>

  </div>

  <div class="col-12 card border rounded shadow-lg p-2" style="margin-bottom: 50px; display: none;" id="checkboxes">
    <div class="col-12 col-xl-12">
    <input type="checkbox" class="checkboxShowAll" id="cShowAll" checked> Show All<br>
    <input type="checkbox" class="checkbox" id="ccol_A" checked> col_A<br>
    <input type="checkbox" class="checkbox" id="ccol_B" checked> col_B<br>
    <input type="checkbox" class="checkbox" id="ccol_C" checked> col_C<br>
    <input type="checkbox" class="checkbox" id="ccol_D" checked> col_D<br>
    <input type="checkbox" class="checkbox" id="ccol_E" checked> col_E<br>
    <input type="checkbox" class="checkbox" id="ccol_F" checked> col_F<br>
    <input type="checkbox" class="checkbox" id="ccol_G" checked> col_G<br>
    </div>
  </div>


                <script type="text/javascript" src="js/script.js"></script>
                <script type="text/javascript" src="js/table.js"></script>
                <?php include "includes/databasepanel.php"?>

</div>


<?php 


?>

</body>
</html>