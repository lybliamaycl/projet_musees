<?php

class PageController extends Controller {

    public function index(){
        $themes = Theme::getAllThemes();

        $template = $this->twig->loadTemplate('/Page/index.html.twig');
        echo $template->render(array(
            'themes'    => $themes
        ));
    }

    public function help(){
        $template = $this->twig->loadTemplate('/Page/help.html.twig');
        echo $template->render(array());
    }
}