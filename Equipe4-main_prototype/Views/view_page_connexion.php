
<?php 
$title = "Page D'accueil";
$nom_fichier_css = "connexion.css";
?>

<?php require "view_begin_html.php";?>

<header>
            <h1>Bienvenue sur le site de dépot du stage </h1>
        </header>

        <div class="login">
            <h2>Connexion</h2>
            <form action="#">
                <div class="user">
                    <input type="text" name="" id="usr" required=""/>
                    <label>Nom D'utilisateur</label>
                </div>

                <div class="user">
                    <input type="password" name="" id="pwd" required=""/>
                    <label for="">Mot De Passe</label>
                </div>
                <a href="?controller=accueil&action=accueil">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Submit
                </a>
            </form>
        </div>

<?php require "view_end_html.php";?>