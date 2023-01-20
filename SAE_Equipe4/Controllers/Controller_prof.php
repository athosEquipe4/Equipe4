<?php 

class Controller_prof extends Controller{

    public function action_prof(){
    $data = [];
    $this->render("page_prof",$data);
    }

    public function action_default(){
        $this->action_prof();
    }
    

} 
?>