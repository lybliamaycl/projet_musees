<?php

class DepartementController extends Controller {

    public function display(){
        $datas = Departement::getByDep($this->route['params']['id']);
        $json_datas = json_encode($datas);

        echo $json_datas;
    
    }

}