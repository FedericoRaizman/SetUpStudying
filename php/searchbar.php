<?php
include("bar.php");

$con = new PDO("mysql:host=localhost;dbname=sus",'root','rootroot')
if(isset($_POST["submit"])){
    $str = $_POST["search"];
    $sth = $con->prepare("SELECT * FROM 'search' WHERE Nombre = '$str'");
    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth -> execute();

    if($row = $sth->fetch())
    {
        ?>
        <br><br><br>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
    </tr>
                <tr>
                <td><?php echo $row->Nombre; ?></td>
                <td><?php echo $row->Descripcion; ?></td>

             </tr>   
    </table>  
    <?php
    }
   
    else{
        echo "Nombre no existe";
    }
}

?>