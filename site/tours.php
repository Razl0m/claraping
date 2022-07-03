<?php
session_start();
require_once "../base.php";
require_once "../general.php";
$Database = new dbQueryingForm('../Database.ini');
StartSession();
$allTours = true;
$needAuth = false;


function SearchTour($Database)
{
	if (isset($_GET["country"]) && $_GET["country"]) {
		$Database->SearchTour($_GET["country"]);
		global $allTours;
		$allTours = false;
	}
}

function OneTour($Database)
{
	if (isset($_GET["id"]) && $_GET["id"]) {
		$Database->Tour($_GET["id"]);
		global $allTours;
		$allTours = false;
	}
}

function BuyTour($Database)
{
	if (isset($_GET["buy"]) && $_GET["buy"]) {
		if ($_SESSION["is_auth"] == "true") {
			$Database->Tour($_GET["buy"]);
			global $allTours;
			$allTours = false;
			$_SESSION["booking"] = $_GET["buy"];
		} else {
			global $needAuth;
			$needAuth = true;
		}
	}
}

function BookingTour($Database)
{
	if (isset($_GET["dateOut"]) && isset($_GET["amountNights"])) {
		$_SESSION["bookingTour"] = [
			"dateOut" => $_GET["dateOut"],
			"amountNights" => $_GET["amountNights"],
			"idHotel" => $_SESSION["booking"],
			"idUser" => $_SESSION["id"],
			"start_date" => $_GET["amountNights"]
		];
		$_SESSION["booking"] = "false";
		$_SESSION["finalValue"] = $Database->BookingTour($_SESSION["bookingTour"]);
		$_SESSION["booking"] = "false";
	}
}

function ChargTour($Database)
{
	if (isset($_GET["finalValue"]) && isset($_GET["finalValue"]) != 0) {
		$Database ->ChargTour($_SESSION["finalValue"]);
		$_SESSION["finalValue"] = "";
		$_SESSION["bookingTour"] = "";
		$_SESSION["tourCharg"] = true;
		header('Location: home.php');
	}
}

?>


<!DOCTYPE html>
<html lang="ru">

<head>
	<title>Туры</title>
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
					<h1 class="welcome__title">Найдите тур<br>вашей мечты</h1>
					<div data-tabs class="welcome__tabs tabs">
						<nav data-tabs-titles class="tabs__navigation">
							<button type="button" class="tabs__title title-tabs _tab-active">
								<span class="title-tabs__paragraph">Туры</span>
								<span class="title-tabs__icon">
									<img src="img/icons/baggage.svg" alt="baggage">
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
					<div class="tours__items">
						<?php
						function mainFunction($Database)
						{
							if (CheckGet()) {
								SearchTour($Database);
								OneTour($Database);
								BuyTour($Database);
								BookingTour($Database);
								ChargTour($Database);
							}

							if (CheckPost()) {
							}
						}

						mainFunction($Database);
						if ($allTours) {
							$Database->ShowToursAll();
						}
						?>
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
	<?php
	if ($_SESSION["booking"] != "false") {
		echo $popUpTour;
	}
	if ($_SESSION["finalValue"] != "") {
		echo '<div class="popup popup_tour">
		<div class="popup__body">
      <div class="popup__line"><span class="popup__title">Оплата тура</span><a href="home.php?booking=exit" class="popup__exit">X</a></div>
					<form action="tours.php" method="get" class="popup__form form-popup">
						<div class="form-popup__line">
							<label class="form-popup__label" for="finalValue">Стоимость тура: ' . $_SESSION["finalValue"]["price"] . 'р</label>
							<input id="finalValue" hidden class="form-popup__input" name="finalValue" type="number">
						</div>
						<button type="submit" class="form-popup__button">Оплатить</button>
					</form>
				</div>
		</div>';
	}
	?>
	<?php
	if ($needAuth == true) {
		echo '<script language="javascript">alert("Перед бронированью тура необходимо авторизоваться и заполнить данные о туристах")</script>';
	}
	?>
	<script src="js/app.min.js?_v=20220620112007"></script>
</body>

</html>