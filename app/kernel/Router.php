<?php

class Router {

    public static function analyse($request){
        $result = array(
            'controller'    => 'Error',
            'action'        => 'error404',
            'params'        => array()
        );

        if($request === '' || $request === '/'){ // Route vers la page d'accueil
            $result['controller']   = 'Page';
            $result['action']       = 'index';
        } else {
            $parts = explode('/', $request);

            //if($parts[0] == 'login' && (count($parts) == 1 || $parts[1] == '')){ // Route vers la page de connexion
            //    $result['controller']       = 'User';
            //    $result['action']           = 'login';
            //}

            if($parts[0] === "departement" && count($parts) == 2){ 
                $result['controller'] = 'Departement';
                $result['action'] = 'display';
                $result["params"]['id'] = $parts[1];  
            }
        }

        return $result;
    }
    
}