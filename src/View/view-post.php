<?php 
include_once "../../templates/head.php";
?>
    <link rel="stylesheet" href="../../assets/css/post.css">
    <title>Créer un Post</title>
</head>

<body>

    <h1>Créer un Post</h1>
    <h2>Remplissez le formulaire pour publier un post</h2>

    <?php
    include_once "../../templates/navbar.php";
    ?>

    <!-- Formulaire de création de post -->
    <form action="../../src/Controller/controller-post.php" method="POST" enctype="multipart/form-data" novalidate>
        <p>Les champs marqués d'un * sont obligatoires</p>

        <label for="contenu">Contenu du post*</label>
        <span><?= $errors['description'] ?? '' ?></span>
        <textarea id="contenu" name="description" placeholder="Écrivez votre post ici*" required><?= $_POST['description'] ?? '' ?></textarea>

        <label for="image">Image*</label>
        <span><?= $errors['photo'] ?? '' ?></span>
		<input type="file" name="photo" id="fileToUpload">
        <input class="submit" type="submit" value="Publier">
    </form>

    <?php
    include_once '../../templates/footer.php';
    ?>

</body>

</html>