<?php 
$title = "CV";
$nom_fichier_css = "cv.css";

?>



<?php
session_start();
$username = $_SESSION['username'];
require "include/connect_db.php";
if(!empty($_FILES)){

    $file_name = $_FILES['uploaded_file']['name'];
    $file_extension = strrchr($file_name,".");

    $file_tmp_name = $_FILES['uploaded_file']['tmp_name'];

    $file_dest = "files/".$file_name;

    //$extensions_autorisees = array('.pdf','.PDF');
    
    
        
        if(move_uploaded_file($file_tmp_name,$file_dest) && $_FILES['uploaded_file']['error']==0){

           $query = $bd->query("SELECT user_id FROM login WHERE username = '$username'");
            $user_id = $query->fetch();
            $_SESSION['user_id'] = $user_id['user_id'];

            $req = $bd->prepare('INSERT INTO document(type,url,student_id) VALUES (:type,:url,:student_id)');
            $req->bindValue(':type',$file_name);
            $req->bindValue(':url',$file_dest);
            $req->bindValue(':student_id',$user_id['user_id']);
            
            //Exécution de la requête
            $req->execute();
            $query->execute();
            
            
            echo "<p>"."Fichier envoyé avec succès"."</p>";
        }
        else{
            echo "<p>"."Erreur lors de l'envoie"."</p>";
        }
    
        echo "<h1>"."Fichiers enregistrés"."</h1>";

        $req = $bd->query('SELECT type,url from document');

        while($data = $req->fetch()){
            echo $data['type'].' : '.'<a href="'.$data['url'].'">'.$data['type'].'</a>'."<br>";
        }
        
    //echo "<br>"."<br>"."Nom : ".$file_name."<br>";
    //echo "Extension : ".$file_extension;
}
?>


<?php require "view_begin_html.php";?>

    
    <body>
	<div class="text">
    <p>
        Vous voici dans la page qui vous est dédiée en tant qu'étudiant pour vous permmettre de déposer des fichier.
    </p>
</div>
<div class="wrapper">
    <div class="box">
        <div class="input-bx">
            <h2 class="upload-area-title">Dépôt de fichiers</h2>
            <form  method="post" enctype="multipart/form-data">
                <input type="file" id="upload" accept=".doc,.docx,.pdf,.odt,.txt,.jpg,.png" hidden name="uploaded_file">
                <label for="upload" class="uploadlabel">
                    <span><i class="fa fa-cloud-upload"></i></span>
                    <p id="upload">Choisir les fichiers à uploader</p>
                </label>
                <input type="submit" value="Envoyer">
                <button type="button" onclick="location.href='?controller=accueil&action=accueil'">Annuler</button>
            </form>
        </div>

        <div id="filewrapper">
            <h3 class="uplaoded">Fichiers uploadés</h3>
        </div>
    </div>
</div>
<style type="text/css">
	 input[type="submit"], button {
        width: 100px;
        padding: 10px 20px;
        margin: 10px;
        border-radius: 10px;
        background-color: blue; /* Green */
        color: white;
        cursor: pointer;
        font-size: 1em;
        text-align: center;
    }
    input[type="submit"]:hover, button:hover {
        background-color: #3E8E41; /* Dark Green */
    }
    button {
        background-color: #f44336; /* Red */
    }
    button:hover {
        background-color: #da190b; /* Dark Red */
    }
</style>
</style>

<script type="text/javascript">
	window.addEventListener("load", ()=>{
    const input = document.getElementById("upload");
    const filewrapper = document.getElementById("filewrapper");

    input.addEventListener("change", (e)=>{
        let fileName = e.target.files[0].name;
        let filetype = e.target.value.split(".").pop();
        fileshow(fileName, filetype);
    });

    const fileshow = (fileName, filetype)=>{
        const showfileboxElem = document.createElement("div");
        showfileboxElem.classList.add("showfilebox");
        const leftElem = document.createElement("div");
        leftElem.classList.add("left");
        const fileTypeElem = document.createElement("span");
        fileTypeElem.classList.add("filetype");
        fileTypeElem.innerHTML=filetype;
        leftElem.append(fileTypeElem);
        const filetitleElem = document.createElement("h3");
        filetitleElem.innerHTML = fileName;
        leftElem.append(filetitleElem);
        showfileboxElem.append(leftElem);
        const rightElem = document.createElement("div");
        rightElem.classList.add("right");
        showfileboxElem.append(rightElem);
        const crossElem = document.createElement("span");
        crossElem.innerHTML="&#215;";
        rightElem.append(crossElem);
        filewrapper.append(showfileboxElem);

        crossElem.addEventListener("click", ()=>{
            filewrapper.removeChild(showfileboxElem);
        });
    }
})
</script>

	<script src="script.js"></script>

<?php require "view_end_html.php";?>
