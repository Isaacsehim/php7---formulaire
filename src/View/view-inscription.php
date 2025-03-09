<?php 
include_once "../../templates/head.php";
?>
    <link rel="stylesheet" href="../../assets/css/inscription.css">
    <title>Formulaire</title>
</head>

<body>
    
        <h1>Formulaire d'inscription</h1>
        <h2>Remplissez le formulaire pour vous inscrire</h2>

        <?php
        include_once "../../templates/navbar.php";
        ?>

        <!-- Formulaire d'inscription -->
        <form action="" method="POST" novalidate>
        <p>Les champs marqués d'un * sont obligatoires</p>
            <label for="nom"></label>
            <span><?= $errors['nom'] ?? '' ?></span>
            <input type="text" id="nom" name="nom" placeholder="Nom*" value="<?= $_POST['nom'] ?? '' ?>" required>

            <label for="prenom"></label>
            <span><?= $errors['prenom'] ?? '' ?></span>
            <input type="text" id="prenom" name="prenom" placeholder="Prénom*" value="<?= $_POST['prenom'] ?? '' ?>" required>

            <label for="pseudo"></label>
            <span><?= $errors['pseudo'] ?? '' ?></span>
            <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo*" value="<?= $_POST['pseudo'] ?? '' ?>" required>

            <span class="genre">
                <span><?= $errors['genre'] ?? '' ?></span>

                <div>
                    <input type="radio" id="genre-homme" name="genre" value="homme" <?= (isset($_POST['genre']) && $_POST['genre'] == 'homme') ? 'checked' : '' ?> required>
                    <label for="genre-homme">♂️ Homme</label>
                </div>

                <div>
                    <input type="radio" id="genre-femme" name="genre" value="femme" <?= (isset($_POST['genre']) && $_POST['genre'] == 'femme') ? 'checked' : '' ?> required>
                    <label for="genre-femme">♀️ Femme</label>
                </div>

                <div>
                    <input type="radio" id="genre-autres" name="genre" value="autres" <?= (isset($_POST['genre']) && $_POST['genre'] == 'autres') ? 'checked' : '' ?> required>
                    <label for="genre-autres">🏳️‍🌈 Autres</label>
                </div>
            </span>

            <br>
            <label id="date_de_naissance" for="date_naissance">🎂 Date de naissance*</label>
            <span><?= $errors['date_naissance'] ?? '' ?></span>
            <input type="date" id="date_naissance" name="date_naissance" min="1920-01-01" max="2025-03-03" value="<?= $_POST['date_naissance'] ?? '' ?>" required>

            <label for="email"></label>
            <span><?= $errors['email'] ?? '' ?></span>
            <input type="email" id="email" name="email" placeholder="📧 Email*" value="<?= $_POST['email'] ?? '' ?>" required>

            <label for="password"></label>
            <span><?= $errors['password'] ?? '' ?></span>
            <div class="eye_change">
                <input type="password" id="pass" name="password" placeholder="🔑 Mot de Passe*" required>
                <span id="eye" onclick="changer()">🫣</span>
            </div>
            <script>
                let e2 = true;

                function changer2() {
                    let passInput = document.getElementById("confirm_password");
                    let eyeIcon = document.getElementById("eye");

                    if (e2) {
                        passInput.setAttribute("type", "text");
                        eyeIcon.textContent = "🧐";
                    } else {
                        passInput.setAttribute("type", "password");
                        eyeIcon.textContent = "🫣";
                    }
                    e2 = !e2;
                }
            </script>

            <label for="confirm_password"></label>
            <span><?= $errors['confirm_password'] ?? '' ?></span>
            <div class="eye_change">
                <input type="password" id="confirm_password" name="confirm_password" placeholder="🔑 Confirmation Mot de Passe*" required>
                <span id="eye" onclick="changer()">🫣</span>
            </div>
            <script>
                let e = true;

                function changer() {
                    let passInput = document.getElementById("pass");
                    let eyeIcon = document.getElementById("eye");

                    if (e) {
                        passInput.setAttribute("type", "text");
                        eyeIcon.textContent = "🧐";
                    } else {
                        passInput.setAttribute("type", "password");
                        eyeIcon.textContent = "🫣";
                    }
                    e = !e;
                }
            </script>


            <span class="checkbox">
                <input type="checkbox" id="cgu" name="cgu" required>
                <label for="cgu">J'accepte les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de confidentialité</a> de notre site.</label>
            </span>

            <input class="submit" type="submit" value="Envoyer">
        </form>

        <p>En cliquant sur "Envoyer", vous acceptez les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de confidentialité</a> de notre site.</p>

        <h2>Vous avez déjà un compte ?</h2>
        <a href="connexion.php">Connectez-vous</a>

        <?php
        include_once '../../templates/footer.php';
        ?>
 
</body>

</html>