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
					<h1 class="welcome__title">Найдите<br>свою экскурсию</h1>
					<div data-tabs class="welcome__tabs tabs">
						<nav data-tabs-titles class="tabs__navigation">
							<button type="button" class="tabs__title title-tabs _tab-active">
								<span class="title-tabs__paragraph">Экскурсии</span>
								<span class="title-tabs__icon">
									<img src="img/icons/museum.svg" alt="museum">
								</span>
							</button>
						</nav>
						<div data-tabs-body class="tabs__content">
							<div class="tabs__body">
								<form class="selection-excursions" action="get">
									<select name="where" class="form">
										<option value="1">Турция</option>
										<option value="2">Мальдивы</option>
										<option value="3">Греция</option>
										<option value="4">Испания</option>
									</select>
									<input name="date" type="date" class="form">
									<button type="submit">Найти экскурсию</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="welcome__background">
					<picture>
						<source srcset="img/design/background.webp" type="image/webp"><img src="img/design/background.jpg" alt="background">
					</picture>
				</div>
			</section>
			<section class="page__excursions excursions">
				<div class="excursions__container">
					<div class="excursions__items">
						<div class="excursions__item">
							<a href="#" class="item-excursions">
								<div class="item-excursions_photo">
									<picture>
										<source srcset="img/design/andaman.webp" type="image/webp"><img src="img/design/andaman.jpg" alt="andaman">
									</picture>
								</div>
								<div class="item-excursions__body">
									<h3 class="item-excursions__title">Greece plaza hotel</h3>
									<p class="item-excursions__paragraph">
										Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur
										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
										dolore eu fugiat nulla pariatur.
									</p>
								</div>
							</a>
						</div>
						<div class="excursions__item">
							<a href="#" class="item-excursions">
								<div class="item-excursions_photo">
									<picture>
										<source srcset="img/design/andaman.webp" type="image/webp"><img src="img/design/andaman.jpg" alt="andaman">
									</picture>
								</div>
								<div class="item-excursions__body">
									<h3 class="item-excursions__title">Greece plaza hotel</h3>
									<p class="item-excursions__paragraph">
										Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur
										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
										dolore eu fugiat nulla pariatur.
									</p>
								</div>
							</a>
						</div>
						<div class="excursions__item">
							<a href="#" class="item-excursions">
								<div class="item-excursions_photo">
									<picture>
										<source srcset="img/design/andaman.webp" type="image/webp"><img src="img/design/andaman.jpg" alt="andaman">
									</picture>
								</div>
								<div class="item-excursions__body">
									<h3 class="item-excursions__title">Greece plaza hotel</h3>
									<p class="item-excursions__paragraph">
										Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur
										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
										dolore eu fugiat nulla pariatur.
									</p>
								</div>
							</a>
						</div>
						<div class="excursions__item">
							<a href="#" class="item-excursions">
								<div class="item-excursions_photo">
									<picture>
										<source srcset="img/design/andaman.webp" type="image/webp"><img src="img/design/andaman.jpg" alt="andaman">
									</picture>
								</div>
								<div class="item-excursions__body">
									<h3 class="item-excursions__title">Greece plaza hotel</h3>
									<p class="item-excursions__paragraph">
										Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur
										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
										dolore eu fugiat nulla pariatur.
									</p>
								</div>
							</a>
						</div>
						<div class="excursions__item">
							<a href="#" class="item-excursions">
								<div class="item-excursions_photo">
									<picture>
										<source srcset="img/design/andaman.webp" type="image/webp"><img src="img/design/andaman.jpg" alt="andaman">
									</picture>
								</div>
								<div class="item-excursions__body">
									<h3 class="item-excursions__title">Greece plaza hotel</h3>
									<p class="item-excursions__paragraph">
										Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur
										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
										dolore eu fugiat nulla pariatur.
									</p>
								</div>
							</a>
						</div>
						<div class="excursions__item">
							<a href="#" class="item-excursions">
								<div class="item-excursions_photo">
									<picture>
										<source srcset="img/design/andaman.webp" type="image/webp"><img src="img/design/andaman.jpg" alt="andaman">
									</picture>
								</div>
								<div class="item-excursions__body">
									<h3 class="item-excursions__title">Greece plaza hotel</h3>
									<p class="item-excursions__paragraph">
										Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur
										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
										dolore eu fugiat nulla pariatur.
									</p>
								</div>
							</a>
						</div>
						<div class="excursions__item">
							<a href="#" class="item-excursions">
								<div class="item-excursions_photo">
									<picture>
										<source srcset="img/design/andaman.webp" type="image/webp"><img src="img/design/andaman.jpg" alt="andaman">
									</picture>
								</div>
								<div class="item-excursions__body">
									<h3 class="item-excursions__title">Greece plaza hotel</h3>
									<p class="item-excursions__paragraph">
										Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur
										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
										dolore eu fugiat nulla pariatur.
									</p>
								</div>
							</a>
						</div>
						<div class="excursions__item">
							<a href="#" class="item-excursions">
								<div class="item-excursions_photo">
									<picture>
										<source srcset="img/design/andaman.webp" type="image/webp"><img src="img/design/andaman.jpg" alt="andaman">
									</picture>
								</div>
								<div class="item-excursions__body">
									<h3 class="item-excursions__title">Greece plaza hotel</h3>
									<p class="item-excursions__paragraph">
										Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur
										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
										dolore eu fugiat nulla pariatur.
									</p>
								</div>
							</a>
						</div>
						<div class="excursions__item">
							<a href="#" class="item-excursions">
								<div class="item-excursions_photo">
									<picture>
										<source srcset="img/design/andaman.webp" type="image/webp"><img src="img/design/andaman.jpg" alt="andaman">
									</picture>
								</div>
								<div class="item-excursions__body">
									<h3 class="item-excursions__title">Greece plaza hotel</h3>
									<p class="item-excursions__paragraph">
										Лучший отель греции с не забываемым видом на море. Lorem ipsum dolor sit amet, consectetur
										adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
										enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
										dolore eu fugiat nulla pariatur.
									</p>
								</div>
							</a>
						</div>
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