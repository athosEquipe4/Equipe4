<?php 

$title = "bordereaux De Stage";
$nom_fichier_css = "bos.css";
?>

<?php

require "include/connect_db.php";
session_start();
$username = $_SESSION['username'];

// On vérifie si le tableau $_files n'est pas vide
if(!empty($_FILES)){
    // $file_name = Le nom du fichier
    $file_name = $_FILES['fichier']['name'];
    // $file_extension : Contient l'extension du fichier Ex : .pdf
    $file_extension = strrchr($file_name,".");
    
    $file_tmp_name = $_FILES['fichier']['tmp_name'];

    // Contient la destination du fichier qui se trouve dans /files
    $file_dest = "files/".$file_name;
    
    $extensions_autorisees = array('.pdf','.PDF','.doc','.DOC','.docx','.DOCX','.xls','.XLS','.xlsx','.XLSX','.jpeg','.JPEG','.png','.PNG');

        if(move_uploaded_file($file_tmp_name,$file_dest) && $_FILES['fichier']['error']==0 && in_array($file_extension,$extensions_autorisees)){
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
            echo "<p>"."Erreur lors de l'envoie, veuillez respecter l'extension du fichier"."</p>";
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

<header>
            <h1>Dépot De bordereaux Du Stage</h1>
        </header>
        <div class="main">
            <form method="POST" enctype="multipart/form-data">
                <div class="stagiaire">
                    <h2>Stagiaire</h2>

                    <label>Nom : </label>
                    <input type="text" name="nom" id="nom"/>

                    <label>Prénom : </label>
                    <input type="text" name="prenom" id="prenom">

                    <label>Adresse : </label>
                    <input type="text" name="adresse" id="adr">

                    <label>Ville : </label>
                    <input type="text" name="ville" id="ville">

                    <label>Code Postal : </label>
                    <input type="number" name="code_postal" id="codePostal">

                    <label>Mail : </label>
                    <input type="email" name="mail" id="mail">
                    <hr>
                </div>
                <div class="entreprise">
                    <h2>L'Entreprise</h2>

                    <label>Raison Sociale : </label>
                    <input type="text" name="raison" id="reso"/>

                    <label>Nb Salarié : </label>
                    <input type="number" name="nb_salarié" id="nb">
                 
                    <label>Siret : </label>
                    <input type="text" name="siret" id="siret">

                    <label>Type d'Entreprise : </label>
                    <input type="text" name="type_entreprise" id="type">

                    <label>Adresse : </label>
                    <input type="text" name="adresse_entreprise" id="adrEnt">

                    <label>Ville : </label>
                    <input type="text" name="ville" id="villeEnt">

                    <label>Code Postal : </label>
                    <input type="number" name="code_postal" id="codePostalEnt">

                    <label> Domaine d'activités de l'Entreprise</label>
                    <input type="text" name="domaine_activité_entreprise" id="domaine">
                    <hr>
                </div>
                <div class="control_depot">
                    <div class="depot">
                        <label> Cliquer pour déposer un ficher :]</label>
                        <input id="ficher" type="file" name="fichier" required />
                    </div>
                    <button type="submit" class="send" >VALIDER</button>
                    <button type="button" class="send" id="myButton"
                    onclick="location.href='?controller=accueil&action=accueil'">ANNULER</button>
                </div>
            </form>
        </div>
        <script type="text/javascript">
            document.getElementById("myButton").onclick = function () {
                location.href = "?controller=accueil&action=accueil";
            };
        </script>

<?php require "view_end_html.php";?>

