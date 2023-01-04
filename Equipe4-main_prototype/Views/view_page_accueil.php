<?php 
$title = "Accueil";
$nom_fichier_css = "accueil.css";
?>

<?php require "view_begin_html.php";?>

<header>
            <nav class="navigation">
                <ul class="liens">
                    <li class="page">
                        <a href="?controller=bos&action=bos">BOS</a>
                    </li>
                    <li class="page">
                        <a href="?controller=cv&action=cv">CV</a>
                    </li>
                    <li class="page">
                        <a href="#">JDB</a>
                    </li>
                    <li class="page">
                        <a href="#">Profile</a>
                    </li>
                </ul>
            </nav>
        </header>

        <div class="main">
            <article class="box">
                <section class="bloc">
                    <h2>Dépot de bordereaux de stage</h2>
                    <p>
                        Il s'agit d'un document daté et signé part le
                        responsable de stage sur lequel figure trois grandes
                        parties, à savoir le stagiaire, l'entreprise et l'offre
                        de stage. Il regroupe toutes les informations
                        importantes pour que l'étudiant qui réalise le stage
                        reçoit validation.

                    </p>
                    <a href="?controller=bos&action=bos" class="direction">Direction Vers le
                        Dépot</a>
                </section>

                <section class="bloc">
                    <h2>Dépot de CV</h2>
                    <p>
                        Le CV est un document qui constitue le point de départ
                        de toute candidature que dépose un demandeur d'emploi
                        afin de trouver un nouvel emploi. L'objectif de ce
                        document est de pouvoir vous présenter au recruteur afin
                        qu'il y trouve de l'intérêt pour potentiellement vous
                        proposer un entretien.
                    </p>
                    <a href="#" class="direction">Direction Vers le
                        Dépot</a>
                </section>

                <section class="bloc">
                    <h2>Dépot de Journal de bord</h2>
                    <p>
                        Le journal de bord permet de garder une trace des
                        décisions et réflexions qui détermine le parcours de
                        recherche d'un étudiant. Il regroupe les informations
                        importantes pour suivre et estimer votre progression
                        vers un objectif.
                    </p>
                    <a href="#" class="direction">Direction Vers le
                        Dépot</a>
                </section>
            </article>

            <div class="commentaire">
                <h2>Commentaire</h2>
            </div>
        </div>
        

<?php require "view_end_html.php";?>