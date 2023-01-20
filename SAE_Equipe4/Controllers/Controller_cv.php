<?php 

class Controller_cv extends Controller{

    public function action_cv(){
    $data = [];
        $this->render("page_cv",$data);
    }

    public function action_default(){
        $this->action_cv();
    }

} 
?>