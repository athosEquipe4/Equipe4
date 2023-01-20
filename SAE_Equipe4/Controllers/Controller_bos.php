<?php 

class Controller_bos extends Controller{

    public function action_bos(){
    $data = [];
    $this->render("page_bos",$data);
    }

    public function action_default(){
        $this->action_bos();
    }
    

} 
?>