<!-- Cette page va servir à définir quelle vue sera affichée sur la page d'accueil-->

<!-- ob_start permet de stopper l'affichage, hormis ce qu'il y a précédemment dans la page source (gabarit.php), mettant les infos suivante en tampon -->
<!-- on écrit toutes les infos à afficher -->
<?php ob_start(); ?>
<!-- Pour chaque billet dans la BDD -->
<?php foreach ($billets as $billet): ?>
    <article>
        <header>
            <!-- on affiche un lien avec le titre du billet, repéré par son id, et envoyant vers une page dédié à ce billet -->
            <a href="<?= "index.php?action=billet&id=". $billet['id'] ?>">
                <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
            </a>
            <!-- On affiche la date indiquée dans les infos du billet -->
            <time><?= $billet['date'] ?></time>

        </header>
        <!-- on affiche le contenu du billet-->
        <p><?= $billet['contenu'] ?></p>
    </article>
<hr/>
<!-- on clos la boucle permettant d'afficher chaque billet -->
<?php endforeach; ?>

<!-- ob_get_clean permet d'utiliser le tampon créé avec ob_start, de l'afficher dans la variable définie ($contenu), et relance le script-->
<?php $contenu = ob_get_clean(); ?>

<!-- on appelle ensuite le gabarit qui appelle la variable $contenu, qui va donc elle-meme afficher tout ce qu'il y a au-dessus -->
<?php require 'vue/gabarit.php'; ?>