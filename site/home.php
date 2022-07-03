<?php
session_start();
require_once "../base.php";
require_once "../general.php";
$Database = new dbQueryingForm('../Database.ini');
StartSession();

function subscribe($Database)
{
	if (isset($_POST["subscribe-email"]) && $_POST["subscribe-email"] != "") {
		$Database->subscription($_POST["subscribe-email"]);
		header('Location: home.php');
	}
}
function clearBooking() {
	if (isset($_GET["booking"]) && $_GET["booking"] != "") {
		$_SESSION["booking"] = "false";
		$_SESSION["finalValue"] = "0";
		$_SESSION["tourCharg"] = "";
		header('Location: home.php');
	}
}

function mainFunction($Database)
{
	if (CheckGet()) {
		clearBooking();
	}

	if (CheckPost()) {
		subscribe($Database);
	}
}

mainFunction($Database);


?>


<!DOCTYPE html>
<html lang="ru">

<head>
	<title>Главная</title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<!-- <style>body{opacity: 0;}</style> -->
	<link rel="stylesheet" href="css/style.css?_v=20220620112007">
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
					<div class="welcome__titles">
						<h2 class="welcome__title-1">Путишествуйте вместе с нами</h2>
						<h1 class="welcome__title-2">Туристическая Фирма</h1>
						<h2 class="welcome__title-3">Эксклюзивные туры<br>за границу</h2>
					</div>
					<div data-tabs class="welcome__tabs tabs">
						<nav data-tabs-titles class="tabs__navigation">
							<button type="button" class="tabs__title title-tabs _tab-active">
								<span class="title-tabs__paragraph">Туры</span>
								<span class="title-tabs__icon">
									<img src="img/icons/baggage.svg" alt="baggage">
								</span>
							</button>
							<button type="button" class="tabs__title title-tabs">
								<span class="title-tabs__paragraph">Экскурсии</span>
								<span class="title-tabs__icon">
									<img src="img/icons/museum.svg" alt="museum">
								</span>
							</button>
						</nav>
						<div data-tabs-body class="tabs__content">
							<div class="tabs__body">
								<form class="selection-tours" action="tours.php" method="GET">
									<select name="from" class="form">
										<option value="1">Москва</option>
										<option value="2">Уфа</option>
										<option value="3">Владимир</option>
										<option value="4">Архангельск</option>
									</select>
									<select name="country" class="form">
									<option value="Турция">Турция</option>
										<option value="Мальдивы">Мальдивы</option>
										<option value="Греция">Греция</option>
										<option value="Испания">Испания</option>
									</select>
									<input name="date" type="date" class="form">
									<select name="nights" class="form">
										<option value="1">На 7 ночей</option>
										<option value="2">На 10 ночей</option>
										<option value="3">На 15 ночей</option>
									</select>
									<select name="amount" class="form">
										<option value="2">2 Взрослых</option>
									</select>
									<button type="submit">Найти туры</button>
								</form>
							</div>
							<div class="tabs__body">
								<form class="selection-excursions" action="get">
									<select name="where" class="form">
										<option value="1">Турция</option>
										<option value="2">Мальдивы</option>
										<option value="3">Греция</option>
										<option value="4">Испания</option>
									</select>
									<input name="date" type="date" class="form">
									<button type="submit">Найти Экскурсию</button>
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
			<section class="page__tours tours">
				<div class="tours__container">
					<h2 class="tours__title">Самые захватывающие туры</h2>
					<div class="tours__items">
						<?php
						$Database -> ShowTours();
						?>
					</div>
					<a class="tours__all" href="tours.php">Смотреть все</a>
				</div>
			</section>
			<section class="page__excursions excursions">
				<div class="excursions__container">
					<h2 class="excursions__title">Экскурсии</h2>
					<div class="excursions__items">
						<?php
						$Database->ShowExcursions();
						?>
					</div>
					<a class="excursions__all" href="excursions.php">Смотреть все</a>
				</div>
			</section>
			<section class="page__news news">
				<div class="news__container">
					<h2 class="news__title">Последние новости</h2>
					<div class="news__items">
						<?php
						$Database->ShowNews();
						?>
					</div>
					<a class="news__all" href="news.php">Смотреть все</a>
				</div>
			</section>
			<section class="page__contacts contacts">
				<div class="contacts__container">
					<h2 class="contacts__title">Контакты</h2>
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
						<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A77920e61a408aff7f5bf509df685f3b2c18f0dbd4dab21a96f1dfae2dfcdf44c&amp;source=constructor" width="1280" height="600" frameborder="0"></iframe>
					</div>
				</div>
			</section>
			<section class="page__agency agency">
				<div class="agency__container">
					<h2 class="agency__title">Представительство</h2>
					<div class="agency__items">
						<?php
						$Database->ShowAgency();
						?>
					</div>
				</div>
			</section>
			<section class="page__subscribe subscribe">
				<h3 class="subscribe__subtitle">Не пропустите новые туры и экскурсии</h3>
				<h2 class="subscribe__title">Подпишитесь на рассылку<br>от Claraping</h2>
				<form method="POST" class="subscribe__form">
					<input required class="subscribe__input" type="email" name="subscribe-email" placeholder="Почта">
					<button class="subscribe__sumbite">Подписаться</button>
				</form>
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
	<?php
	if ($_SESSION["tourCharg"] == true) {
		$_SESSION["tourCharg"] = false;
		echo '<script language="javascript">alert("Тур успешно оплачен!")</script>';
	}
	?>
	<script src="js/app.min.js?_v=20220620112007"></script>
</body>

</html>