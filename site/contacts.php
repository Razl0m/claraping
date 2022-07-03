<!DOCTYPE html>
<html lang="ru">

<head>
	<title>Экскурсии</title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<!-- <style>body{opacity: 0;}</style> -->
	<link rel="stylesheet" href="css/style.min.css?_v=20220620112007">
	<link rel="shortcut icon" href="favicon.ico">
	<!-- <meta name="robots" content="noindex, nofollow"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="wrapper">
		<header class="header">
			<div class="header__container">
				<nav class="header__nav">
					<a href="home.php" class="header__logo">
						<picture>
							<source srcset="img/design/Logo.webp" type="image/webp"><img src="img/design/Logo.png" alt="Logo">
						</picture>
					</a>
					<ul class="header__menu menu-header">
						<li class="menu-header__item"><a href="home.php">Главная</a></li>
						<li class="menu-header__item"><a href="tours.php">Туры</a></li>
						<li class="menu-header__item"><a href="excursions.php">Экскурсии</a></li>
						<li class="menu-header__item"><a href="news.php">Новости</a></li>
						<li class="menu-header__item"><a href="contacts.php">Контакты</a></li>
						<li class="menu-header__item"><a href="agency.php">Представительство</a></li>
					</ul>
					<div class="header__search-user">
						<a href="search.php" class="header__search">
							<img src="img/icons/search.svg" alt="search">
						</a>
						<a href="user.php" class="header__user">
							<img src="img/icons/user.svg" alt="user">
						</a>
					</div>
				</nav>
			</div>
		</header>


		<main class="page">
			<section class="page__welcome welcome">
				<div class="welcome__container">
					<h1 class="welcome__title">Наши контакты</h1>
				</div>
				<div class="welcome__background">
					<picture>
						<source srcset="img/design/background.webp" type="image/webp"><img src="img/design/background.jpg" alt="background">
					</picture>
				</div>
			</section>
			<section class="page__contacts contacts">
				<div class="contacts__container">
					<div class="contacts_items">
						<div class="contacts__item item-contacts">
							<div class="item-contacts__icon">
								<img src="img/icons/watch.svg" alt="watch">
							</div>
							<p class="item-contacts__info">Ежедневно 10:00-18:00</p>
							<p class="item-contacts__name">Время работы</p>
						</div>
						<div class="contacts__item item-contacts">
							<div class="item-contacts__icon">
								<img src="img/icons/near.svg" alt="near">
							</div>
							<p class="item-contacts__info">Арбатская дом 3</p>
							<p class="item-contacts__name">Главный офис</p>
						</div>
						<div class="contacts__item item-contacts">
							<div class="item-contacts__icon">
								<img src="img/icons/call.svg" alt="call">
							</div>
							<p class="item-contacts__info">+38 (063)833 24 15</p>
							<p class="item-contacts__name">Наш телефон</p>
						</div>
					</div>
					<div class="item-contacts__map">
						<picture>
							<source srcset="img/design/map.webp" type="image/webp"><img src="img/design/map.jpg" alt="map">
						</picture>
					</div>
				</div>
			</section>
		</main>
		<footer class="footer">
			<div class="footer__container">
				<nav class="footer__nav">
					<a href="#" class="footer__logo">
						<picture>
							<source srcset="img/design/Logo.webp" type="image/webp"><img src="img/design/Logo.png" alt="Logo">
						</picture>
					</a>
					<ul class="footer__menu menu-footer">
						<li class="menu-footer__item"><a href="#">Главная</a></li>
						<li class="menu-footer__item"><a href="#">Туры</a></li>
						<li class="menu-footer__item"><a href="#">Экскурсии</a></li>
						<li class="menu-footer__item"><a href="#">Новости</a></li>
						<li class="menu-footer__item"><a href="#">Контакты</a></li>
						<li class="menu-footer__item"><a href="#">Представительство</a></li>
					</ul>
				</nav>
			</div>
			<div class="footer__bottom">
				<div class="footer__container">
					<p class="footer__rights">© All rights reserved. Made by Kirill B.</p>
				</div>
			</div>
		</footer>
	</div>
	<script src="js/app.min.js?_v=20220620112007"></script>
</body>

</html>