
<?php
include_once('../../templates/head.php');
?>

<body>
    <h1>Formulaire d'inscription</h1>

<?php
include_once("../../templates/navbar.php");
?>

    <p>Les champs marqués d'un * sont obligatoires</p>

    <!-- Formulaire d'inscription -->
    <form action="" method="POST" novalidate>

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

        <input class="submit" type="submit" value="Envoyer">
    </form>

<?php
include_once('../../templates/footer.php');
?>

</body>
</html>
