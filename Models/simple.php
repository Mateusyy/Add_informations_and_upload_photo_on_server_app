<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 25.09.2018
 * Time: 08:45
 */



class simple extends Model{

    public function setDB($data){
        $firstname = $data['firstName'];
        $lastname = $data['lastName'];
        $filename = $_FILES['file']['name'];
        $fileaddress = "Media/Images/$filename";


        if ( 0 < $_FILES['file']['error'] ) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
            return false;
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], 'Media/Images/' . $_FILES['file']['name']);

        }


        $query = "INSERT INTO simpledata (id, firstName, lastName, image) VALUES (NULL, :firstname, :lastname, :fileaddress)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':fileaddress', $fileaddress);

        if ($stmt->execute() == false){
            echo "Nie działa";
            return false;
        }
        else{
            echo "Dane dodane do bazy";
            return true;
        }
    }
}