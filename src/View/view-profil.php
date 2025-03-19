<?php
include_once "../../templates/head.php";
?>
<link rel="stylesheet" href="../../assets/css/profil.css">
<title>Profil</title>
</head>

<body>

    <?php
    include_once "../../templates/navbar.php";
    ?>

    <div class="profil-container">
        <div class="profil-header">
            <img src="<?= '../../assets/img/users/' . htmlspecialchars($_SESSION['user_id']) . '/avatar/' . htmlspecialchars($_SESSION['user_img']) ?>"  alt="profil" class="profil">
            <h2> <?= htmlspecialchars($_SESSION['user_pseudo'] ?? 'Utilisateur') ?> </h2>
            
            <?php if (isset($_SESSION['user_pseudo'])) { ?>
                <a class="accueil" href="../../src/Controller/controller-home.php">Accueil</a>
                <button class="modifier">Modifier profil</button>
                <a class="deconnexion" href="../../src/Controller/controller-deconnexion.php">Déconnexion</a>
            <?php } ?>
        </div>

        <div class="stats">
            <p><?= isset($allPosts) ? count($allPosts) : 0 ?> Posts</p>
            <p> Followers</p>
            <p> Suivi(s)</p>
        </div>

        <div class="bio">
            <p>Bienvenue sur mon profil ! 🌟</p>
            <a class="add" href="../../src/Controller/controller-post.php">➕</a>
        </div>

        <div class="profil-posts-container">
            <?php if (isset($allPosts) && is_array($allPosts) && !empty($allPosts)) {
                foreach ($allPosts as $post) { ?>
                    <div class="profil-posts">
                        <a href="../../src/Controller/controller-openpost.php?post_id=<?= htmlspecialchars($post['post_id']) ?>">
                            <img src="<?= !empty($post['pic_name']) ? '../../assets/img/users/' . htmlspecialchars($post['user_id']) . '/' . htmlspecialchars($post['pic_name']) : '../../assets/img/default.jpg' ?>" alt="Publication">
                        </a>
                    </div>
                <?php }
            } else { ?>
                <p>Aucune publication pour l'instant.</p>
            <?php } ?>
        </div>

        <?php
        include_once "../../templates/footer.php";
        ?>
        </div>
    </div>
</body>

</html>
