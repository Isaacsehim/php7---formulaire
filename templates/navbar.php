<nav>
    <ul>
        <li><a class="inscription" href="../../src/Controller/controller-inscription.php">📝 Inscription</a></li>
        <li><a class="connexion" href="../../src/Controller/controller-connexion.php">🔗 Connexion</a></li>
        <li><a class="accueil" href="../../src/Controller/controller-home.php">🏠 Accueil</a></li>
        <li><a class="creer" href="../../src/Controller/controller-post.php">➕ Créer</a></li>
        <li><a class="recherche" href="#">🔍 Recherche</a></li>
        <li>
            <a class="profil" href="../../src/Controller/controller-profil.php">
                <?php 
                    $user_id = $_SESSION['user_id'] ?? 'default';
                    $user_img = $_SESSION['user_img'] ?? 'default.png';
                    $avatar_path = "../../assets/img/users/$user_id/avatar/$user_img";
                ?>
                <img src="<?= htmlspecialchars($avatar_path) ?>" alt="Photo de profil"> Profil
            </a>
        </li>
        <li><a class="deconnexion" href="../../src/Controller/controller-deconnexion.php">🚪 Déconnexion</a></li>
    </ul>
</nav>
