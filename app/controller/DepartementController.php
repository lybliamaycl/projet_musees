<?php

class DepartementController extends Controller {

    public function display(){
        //$themes = Theme::getAllThemes();
        $datas = Departement::getByDep($this->route['params']['id']);
        //$json_themes = json_encode($themes);
        $json_datas = json_encode($datas);

       // echo $json_themes;
        echo $json_datas;
    }

}