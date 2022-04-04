<?php
    include('header.php');
?>
            
            <!--Début contenu-->
            <div class="px-3 py-3">
                
                <!--Début formulaire-->
                <form action="post.php" method="post" enctype="multipart/form-data">
                    <p>* Ces zones sont obligatoires</p>

                    <!--1er champs de formulaire-->
                    <fieldset>
                        <!--Zones de textes-->
                        <div class="mb-3">
                        <legend class="fs-1">Vos coordonées</legend>
<br>
                            <label class="form-label" for="nom">Votre nom*</label>
                            <input class="form-control" type="text" name="nom" id="nom" placeholder="Veuillez saisir votre nom" required>
                            <div class="required" id="nomM"></div>
<br>
                            <label class="form-label" for="prénom">Votre prénom*</label>
                            <input class="form-control" type="text" name="prénom" id="prénom" placeholder="Veuillez saisir votre prénom" required>
                            <div class="required" id="prenomM"></div>

                        </div>
                        <!--Boutons radio-->
                        <label class="form-label" >Sexe*</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexe" id="sexe1" value="féminin">
                            <label class="form-check-label" for="sexe1">Féminin</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexe" id="sexe2" value="masculin">
                            <label class="form-check-label" for="sexe2">Masculin</label>
                        </div>
                        <div class="required" id="sexeM"></div>
<br>
                        <!--Zones de texte-->
                        <div class="mb-3">
                            <label class="form-label" for="naissance">Date de naissance*</label>
                            <input class="form-control" type="date" name="naissance" id="naissance" required>
                            <div class="required" id="naissanceM"></div>
<br>
                            <label class="form-label" for="code">Code postal*</label>
                            <input class="form-control" type="text" name="code postal" id="code" required>
                            <div class="required" id="codeM"></div>
<br>
                            <label class="form-label" for="adresse">Adresse</label>
                            <input class="form-control" type="text" name="adresse" id="adresse">
<br>
                            <label class="form-label" for="ville">Ville</label>
                            <input class="form-control" type="text" name="ville" id="ville">
<br>
                            <label class="form-label" for="email">Email*</label>
                            <input class="form-control" type="text" name="email" id="email" placeholder="dave.looper@afpa.fr" required>
                            <div class="required" id="emailM"></div>
                        </div>
<br>
                    </fieldset>

                    <!--2nd champ de formulaire-->
                    <fieldset>
                        
                        <!--Liste déroulante-->
                        <legend class="fs-1">Votre demande</legend>
                            <label class="form-label" for="sujet">Sujet*</label>
                            <select id="sujet" class="form-select"required>
                                <option value="" selected>Veuillez sélectionner un sujet</option>
                                <option value="commandes">Mes commandes</option>
                                <option value="question">Question sur un produit</option>
                                <option value="reclamation">Réclamation</option>
                                <option value="autres">Autres</option>
                            </select>
                            <div class="required" id="sujetM">Marche pas</div>
<br>
                            <!--Zone de texte-->
                        <div class="mb-3">
                            <label class="form-label" for="question">Votre question*</label>
                            <textarea class="form-control" name="question" cols="30" rows="2" required></textarea>
                            <div class="required" id="questionM"></div>
                        </div>
                    </fieldset>

<br>                <!--Case à cocher-->
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="traitement informatique" id="traitement" required>
                        <label class="form-check-label" for="traitement">* J'accepte le traitement informatique de ce formulaire</label>
                        <div class="required" id="traitementM"></div>
                    </div>
<br>
                    <!--Boutons envoyer/annuler-->
                    <button class="btn btn-dark" type="submit">Envoyer</button>
                    <button class="btn btn-dark" type="reset">Annuler</button>
                    
                </form>
            </div>

<?php
    include('footer.php');
?>