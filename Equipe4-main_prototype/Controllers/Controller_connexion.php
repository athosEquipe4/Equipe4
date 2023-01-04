<?php 

class Controller_connexion extends Controller{

    public function action_connexion(){
    $data = [];
        $this->render("page_connexion",$data);
    }

    public function action_default(){
        $this->action_connexion();
    }

} 
?>