

<?php 
session_start();
$title = "Page D'accueil";
$nom_fichier_css = "connexion.css";
include ("include/connect_db.php");
require "view_begin_html.php";

//if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
  //  header("Location: ?controller=accueil&action=accueil");
//}

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM login WHERE username = :username AND password = :password";
    $stmt = $bd->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row['role'] === "Etudiant") {
    $_SESSION['role'] = "Etudiant";
    header("Location: ?controller=accueil&action=accueil");
}  elseif($row['role'] === "professeur") {
    $_SESSION['role'] = "professeur";
    header("Location: ?controller=prof&action=prof");
}
   else{
       echo "Veuillez resaisir votre mot de passe ou nom d'utilisateur ";
    }
        $_SESSION['username'] = $username;
} ?>

<body>
 <div class="container">
    <div class="header">
        <h1 >site de depot </h1>
    </div>
    <div class="main">
        <form method="POST">
            <span>
                <i class="fa fa-user"></i>
                <input type="text" placeholder="Nom d'utilisateur" name="username">
            </span><br>
            <span>
                <i class="fa fa-lock"></i>
                <input type="password" placeholder="Mot de passe " name="password">
            </span><br>
                <button type="submit" name="submit">connexion</button>

        </form>
    </div>
 </div>
</body>

<?php require "view_end_html.php";?>