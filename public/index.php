<?php

use Controller\Ajax;

require_once("../vendor/autoload.php");
require_once("../controller/Ajax.php");

$data = new Ajax();
$contacts = $data->allContact();
$cats = $data->allCatt();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data->insertContact();
}

define("LINK", "http://localhost:8000/");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= LINK ?>style.css">
    <script src="script.js" defer></script>
</head>

<body>
    <div class="corps dflex fdc jcc aic">
        <h1>Voici votre carnet de contact</h1>
        <div class="filtre dflex">
            <label>Filter par</label>
            <select name="" id="" class="select">
                <option value="" selected disabled>Veuillez choisir une option </option>
                <option value="">Nom</option>
                <option value="">Prenom</option>
                <option value="">Catégorie</option>
            </select>
            <label for="">Veuillez saisir le critere correspondant</label>
            <input type="text" placeholder="saisir...">
            <button id="filtrer">Filter</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Catégorie</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact) { ?>
                    <tr class="contact">
                        <td><?= $contact['nom'] ?></td>
                        <td><?= $contact['prenom'] ?></td>
                        <td><?= $contact['categorie_id'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <button class="open-modal">Ajouter un nouveau contact</button>
    </div>
    <div id="modal-bloc" class="modal dflex jcc">
        <div class="modal-content form">
            <h3 class="title">Ajouter un nouveau contact</h3>
            <form id="ajoutForm" action="<?LINK?>" method="post" class="dflex fdc jcc aic fdc">
                <div class="dflex jcsb width-form">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" required>
                </div>
                <div class="dflex jcsb width-form">
                    <label for="prenom">Prénom:</label>
                    <input type="text" name="prenom" required>
                </div>
                <div class="dflex jcsb width-form">
                    <label for="categorie">Catégorie:</label>
                    <select name="categorie" required>
                        <option value="" selected disabled>Veuillez choisir une catégorie</option>
                        <?php foreach ($cats as $cat) { ?>
                            <option value="<?= $cat['id'] ?>"><?= $cat['libelle'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="dflex jcsb width-button">
                    <button id="add-contact">Ajouter</button>
                    <button class="cancel">Annuler</button>
                </div>
            </form>
        </div>
    </div>
    <div id="modal-bloc" class="modal1 dflex jcc">
        <div class="modal-content form">
            <h3 class="title">Faites votre modification pour editer ce contact</h3>
            <form id="ajoutForm" action="<? LINK ?>" method="post" class="dflex fdc jcc aic fdc">
                <?php foreach ($contacts as $contact) { ?>
                    <div class="dflex jcsb width-form">
                        <label for="nom">Nom:</label>
                        <input type="text" name="nom" value="" required>
                    </div>
                    <div class="dflex jcsb width-form">
                        <label for="prenom">Prénom:</label>
                        <input type="text" name="prenom" required>
                    </div>
                    <div class="dflex jcsb width-form">
                        <label for="categorie">Catégorie:</label>
                        <select name="categorie" required>
                            <option value="" selected disabled>Veuillez choisir une catégorie</option>
                            <?php foreach ($cats as $cat) { ?>
                                <option value="<?= $cat['id'] ?>"><?= $cat['libelle'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                <?php } ?>
                <div class="dflex jcsb width-button">
                    <button id="edit-contact">Editer</button>
                    <button class="cancel">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>