<?php 
include_once "../../templates/head.php";
?>
    <link rel="stylesheet" href="../../assets/css/profil.css">
    <title>Formulaire</title>
</head>

<body>

<?php
include_once "../../templates/navbar.php";
?>

<div class="profil-container">
    <div class="profil-header">
        <img src="../../assets/img/users/14/aeroport.jpg" alt="profil" class="profil">
            <h2> <?= $_SESSION['user_pseudo']?> </h2>
            <button class="modifier">Modifier profil</button>
            <button class="deconnexion">Déconnexion</button>
    </div>

    <div class="stats">
        <p> Posts</p>
        <p> Followers</p>
        <p> Suivi(s)</p>
    </div>

    <div class="bio">
        <p>Bienvenue sur mon profil ! 🌟</p>
		<button class="add">➕</button>
    </div>

    <div class="profil-posts">
        <!-- <p>Aucune publication pour l'instant.</p> -->
		<img src="../../assets/img/users/14/aeroport.jpg" alt="aeroport">
		<img src="../../assets/img/users/14/avion.jpg" alt="avion">
		<img src="../../assets/img/users/14/bateau.jpg" alt="bateau">
		<img src="../../assets/img/users/14/rando.jpg" alt="rando">
    </div>
</div>

<?php
include_once "../../templates/footer.php";
?>

</body>
</html>
