<?php

class MuseeController extends Controller {

    public function display(){
      $musee_data = Musee::getMusee($this->route['params']['id']);

      $dir = "././assets/img/img_musees" ;
      $fotomusee = "";
      $fichier = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
      $fichier->rewind();

      while($fichier->valid()){
        if(!is_dir($fichier->key())){
          $fotomusee .= '<img src="' . $fichier->key() . '"alt="' . $fichier->getFilename() . '">';
        }
        $fichier->next();
      }

      $template = $this->twig->loadTemplate('/Page/musee.html.twig');
      echo $template->render(array(
        'musees' => $musee_data,
        'fotomusees' => $fotomusee
      ));

    }








}
