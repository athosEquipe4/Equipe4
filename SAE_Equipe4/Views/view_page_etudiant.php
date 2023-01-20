
<?php 
$title = "etudiant";
$nom_fichier_css = "etudiant.css";
?>
<?php require "view_begin_html.php";
?>
<?php  

    try{
        $bd = new PDO('mysql:host=localhost;dbname=sae_s3_internkeep;charset=utf8', 'root', '');
    }
    catch(Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

   


?>

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 5px;
}

table {
  width: 100%;
  margin: auto;
}

th {
  background-color: #f2f2f2;
}

th, td {
  text-align: left;
}

</style>

<?php
  
// un getteur pour l'id etudiant 
$student_id = $_GET['student_id'];

// Execute une requette pour selectionner les infos 
$query = $bd->query("SELECT * FROM etudiant WHERE student_id = $student_id");
$student = $query->fetch();

// affiche les infos dans un tableau
echo "<table>";
echo "<tr>";
echo "<th>student_id</th>";
echo "<th>nom</th>";
echo "<th>prenom</th>";
echo "<th>mail</th>";
echo "<th>stage_detention</th>";
echo "<th>visibility_flag</th>";
echo "<th>entreprise_id</th>";
echo "<th>groupe</th>";
echo "<th>personnel_id</th>";
echo "<th>formation_id</th>";
echo "</tr>";
echo "<tr>";
echo "<td>".$student['student_id']."</td>";
echo "<td>".$student['nom']."</td>";
echo "<td>".$student['prenom']."</td>";
echo "<td>".$student['mail']."</td>";
echo "<td>".$student['stage_detention']."</td>";
echo "<td>".$student['visibility_flag']."</td>";
echo "<td>".$student['entreprise_id']."</td>";
echo "<td>".$student['groupe']."</td>";
echo "<td>".$student['personnel_id']."</td>";
echo "<td>".$student['formation_id']."</td>";
echo "</tr>";
echo "</table>";

// requette pour les avoir les fichiers deposés 
$query = $bd->query("SELECT type,url FROM document WHERE student_id = $student_id");
$files = $query->fetchAll();

// verification
if (!empty($files)) {
    echo "<h2>Fichiers deposés</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>type</th>";
    echo "<th>url</th>";
    echo "</tr>";
    // boucle pour les liens 
    foreach ($files as $file) {
        echo "<tr>";
        echo "<td>".$file['type']."</td>";
        echo "<td><a href='".$file['url']."'>Download</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "cette etudiant n'a pas de document.";
}
?>
<?php require "view_end_html.php";?>