<?php

class ThemeController extends Controller {

    public function displayTheme(){
       
        $mustheme = Theme::getMuseeByTheme($this->route['params']['id']);
        
       
        $template = $this->twig->loadTemplate('/Page/theme.html.twig');
        echo $template->render(array(
            'musees' => $mustheme,
            ));
    }

}