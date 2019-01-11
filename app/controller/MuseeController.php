<?php

class MuseeController extends Controller {

    public function display(){
      $musee_data = Musee::getMusee($this->route['params']['id']);

      $dir = "./assets/img/img_musees/".$musee_data['MUS_NUMERO'].'/' ;

      $fotosmusee = [];
      $fichier = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
      $fichier->rewind();

      $i = 0;
      while($fichier->valid()){
        if(!is_dir($fichier->key())){
          $fotosmusee[$i]['src'] = $fichier->key();
          $fotosmusee[$i]['alt'] = $fichier->getFilename();
        }
        $fichier->next();
        $i++;
      }

      $template = $this->twig->loadTemplate('/Page/musee.html.twig');
      echo $template->render(array(
        'musee' => $musee_data,
        'fotosmusee' => $fotosmusee
      ));

    }








}
