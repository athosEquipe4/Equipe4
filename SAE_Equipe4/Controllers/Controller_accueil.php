<?php 

class Controller_accueil extends Controller{

    public function action_accueil(){
        $data = [];
        $this->render("page_accueil",$data);
    }

    public function action_default(){
        $this->action_accueil();
    }

} 
?>