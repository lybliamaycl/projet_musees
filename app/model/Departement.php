<?php

class Departement extends Model{

    public static function getByDep($idDep){
        $db = Database::getInstance();

        $sql = $db->prepare("SELECT * FROM musees WHERE mus_dep = :id");
        $sql->bindValue(':id', $idDep, PDO::PARAM_INT);
        $sql->execute();
        $datas = $sql->fetchAll();
    
        return $datas;
    }

}