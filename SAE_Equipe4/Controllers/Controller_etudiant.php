
<?php
class Controller_etudiant extends Controller{

    public function action_etudiant(){
    $data = [];
    $this->render("page_etudiant",$data);
    }

    public function action_default(){
        $this->action_etudiant();
    }
    

} 
?>
