<?php 
$title = "Prof";
$nom_fichier_css = "prof.css";
?>
<?php require "view_begin_html.php";
?>

<?php 



require "include/connect_db.php";



// selectionner tous les etudiants 
$query = $bd->query("SELECT * FROM etudiant");
$result = $query->fetchAll();

// verifie les resultats 
if (!empty($result)) {
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
    // boucle pour avoir tous les etudiants 
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td><a href='Views/view_page_etudiant.php?student_id=".$row['student_id']."'>".$row['student_id']."</a></td>";
        echo "<td>".$row['nom']."</td>";
        echo "<td>".$row['prenom']."</td>";
        echo "<td>".$row['mail']."</td>";
        echo "<td>".$row['stage_detention']."</td>";
        echo "<td>".$row['visibility_flag']."</td>";
        echo "<td>".$row['entreprise_id']."</td>";
        echo "<td>".$row['groupe']."</td>";
        echo "<td>".$row['personnel_id']."</td>";
        echo "<td>".$row['formation_id']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "la base de données est vide ";
}
?>

<?php require "view_end_html.php";?>