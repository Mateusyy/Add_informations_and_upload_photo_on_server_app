<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 25.09.2018
 * Time: 15:08
 */


$informations = $data['stuff'];
?>
<h2>Jesteś zalogowany jako: <?=$_SESSION['login']?></h2>
<t><a href="../Models/logout.php"?>Wyloguj</a>
<br><br>
<table style="width:50%">
    <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Zdjęcie</th>
    </tr>


    <?php
    for ($i=0; $i<count($informations); $i++){
        $row = $informations[$i];

        $path = "../Media/Images/".$row['image'];
        echo "<tr>";
        echo "<td>".$row['firstName']."</td>";
        echo "<td>".$row['lastName']."</td>";
//        echo "<td>".$row['image']."</td>>";
        echo "<td><a href=$path />LINK</a></td>";
        echo "</tr>";
        }
    ?>
</table>



