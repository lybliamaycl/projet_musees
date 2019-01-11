<?php

class Musee extends Model{

    public static function getMusee($idmusee){
        $db = Database::getInstance();

        $sql = $db->prepare("SELECT * FROM musees WHERE id_musee = :idMusee");
        $sql->bindValue (':idMusee', $idmusee, PDO::PARAM_INT);
        $sql->execute();
        $museedata = $sql->fetch();

        return $museedata;

    }

}
