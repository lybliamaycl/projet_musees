<?php

class Theme extends Model{

    public static function getAllThemes(){
        $db = Database::getInstance();

        $sql = "SELECT * from themes";
        $themes = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        return $themes;
    }

    public static function getMuseeByTheme($idxtheme){
        $db = Database::getInstance();
        $sql = $db->prepare("SELECT * FROM musees INNER JOIN musees_has_themes WHERE musees_has_themes.themes_id_theme = :idtheme AND musees_has_themes.musees_id_musee = musees.id_musee ORDER BY mus_dep ASC");
        $sql->bindValue(':idtheme', $idxtheme, PDO::PARAM_INT);
        $sql->execute();
        $mustheme = $sql->fetchAll();

        return $mustheme;
    }

}
