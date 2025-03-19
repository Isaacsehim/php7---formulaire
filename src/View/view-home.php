<?php
include_once "../../templates/head.php";
?>
<link rel="stylesheet" href="../../assets/css/home.css">
<title>Feed</title>
</head>

<body>

    <?php
    include_once "../../templates/navbar.php";
    ?>

    <div class="profil-container">
        <div class="profil-header">
            <img src="<?= '../../assets/img/users/' . htmlspecialchars($_SESSION['user_id']) . '/avatar/' . htmlspecialchars($_SESSION['user_img']) ?>" alt="profil" class="profil">
            <h2><?= htmlspecialchars($_SESSION['user_pseudo'] ?? 'Utilisateur') ?></h2>

            <?php if (isset($_SESSION['user_pseudo'])) { ?>
                <button class="modifier">👤 Modifier profil</button>
                <button class="add">➕ Créer</button>
            <?php } ?>
        </div>

        <div class="stats">
            <p><?= isset($allPosts) ? count($allPosts) : 0 ?> Posts</p>
            <p>Followers</p>
            <p>Suivi(s)</p>
        </div>

        <div class="bio">
            <p>Bienvenue sur mon profil ! 🌟</p>
        </div>

        <div class="posts-container">
            <?php

            foreach ($allPosts as $post) { ?>
                <div class="post">
                    <p>
                        <strong><?= htmlspecialchars($post['user_pseudo']) ?></strong>
                        <span>• <?= date("d/m/Y - H:i", $post['post_timestamp']) ?></span>
                    </p>

                    <?php 
                    $imagePath = "../../assets/img/users/" . $post['user_id'] . "/" . $post['pic_name'];
                    if (file_exists($imagePath)) { ?>
                            <img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($post['pic_name']) ?>" href="../../src/Controller/controller-openpost.php?post_id=<?= htmlspecialchars($post['post_id']) ?>">
                        </a>
                    <?php } ?>

                    <div>
                    <i class="fa-sharp-duotone fa-solid fa-heart" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 1;"></i> <i class="fa-solid fa-heart"></i>
                        <i class="fa-regular fa-comment"></i> <i class="fa-solid fa-comment"></i>
                    </div>

                    <p><strong>33 J'aime</strong></p>
                    <p><strong><?= htmlspecialchars($post['user_pseudo']) ?></strong> <?= htmlspecialchars($post['post_description']) ?></p>

                    <a href="#">Afficher les 3 commentaires</a>
                    <a href="#">Ajouter un commentaire...</a>
                </div>
            <?php } ?>
        </div>

    </div>

    <?php
    include_once "../../templates/footer.php";
    ?>

</body>
</html>
