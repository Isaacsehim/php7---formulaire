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
				<a class="add" href="../../src/Controller/controller-post.php">➕ Créer</a>
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
			if (!empty($allPosts)) {
				$post = $allPosts[0];
			?>
				<div class="post">
					<p>
						<strong><?= htmlspecialchars($post['user_pseudo']) ?></strong>
						<span>• <?= date("d/m/Y - H:i", $post['post_timestamp']) ?></span>
					</p>

					<?php 
					$imagePath = "../../assets/img/users/" . $post['user_id'] . "/" . $post['pic_name'];
					if (file_exists($imagePath)) { ?>
						<img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($post['pic_name']) ?>">
					<?php } ?>

					<p><strong><?= htmlspecialchars($post['user_pseudo']) ?></strong> <?= htmlspecialchars($post['post_description']) ?></p>
					
					
					<p><strong>33 J'aime</strong></p>
					<i class="fa-regular fa-heart" style="color: #ff0000;" id="like"></i>

					<?php 
					$commentCount = Model_comment::countComment($_GET['post_id']) ?? 0;
					if ($commentCount > 0) { ?>
						<i class="fa-solid fa-comment" style="color: #63E6BE;" id="comment"></i>
						<a href="#">Afficher les <?= $commentCount ?> commentaires</a>
					<?php } else { ?>
						<i class="fa-regular fa-comment" style="color: #63E6BE;" id="uncomment"></i>
						<a href="#">Ajouter un premier commentaire</a>
					<?php } ?>
					<form action="../../src/Controller/controller-comments.php" method="post">
						<textarea id="comment" name="comment" placeholder="Écrivez votre commentaire ici*" required><?= htmlspecialchars($_POST['comment'] ?? '') ?></textarea>
						<button class="submit" type="submit">Publier</button>
					</form>
				</div>
			<?php } else { ?>
				<p>Aucun post disponible.</p>
			<?php } ?>
		</div>

	</div>

	<?php
	include_once "../../templates/footer.php";
	?>

</body>
</html>
