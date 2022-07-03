<?php
session_start();
require_once "../base.php";
require_once "../general.php";
$Database = new dbQueryingForm('../Database.ini');
StartSession();
$authError;
$errorMessage;

function ShowPopUp()
{
	if (isset($_GET["showPopUp"])) {
		$_SESSION["showPopUp"] = $_GET["showPopUp"];
	}
}

function exitFromProfile()
{
	if (isset($_GET["exit"])) {
		$_SESSION["is_auth"] = "false";
		$_SESSION["role"] = "0";
		$_SESSION["showPopUp"] = "auth";
		header('Location: home.php');
	}
}

function delTourist($Database)
{
	if (isset($_GET["delTourist"])) {
		if ($_GET["delTourist"] != "") {
			$Database->DelTourist($_GET["delTourist"]);
		}
	}
}

function addTourist($Database)
{
	if (isset($_POST["birthday__tourist"]) && isset($_POST["gender__tourist"]) && isset($_POST["passport__tourist"]) && isset($_POST["fio__tourist"])) {
		$Database->NewTourist($_POST["fio__tourist"], $_POST["passport__tourist"], $_POST["gender__tourist"], $_POST["birthday__tourist"], $_SESSION["login"]);
		header('Location: user.php');
	}
}

function updateUser($Database)
{
	if (isset($_POST["login__update"]) || isset($_POST["email__update"]) || isset($_POST["password__update"])) {
		if (isset($_POST["password__update"]) and $_POST["password__update"] != "") {
			$Database->UpdatePassword($_SESSION["login"], $_POST["password__update"]);
		}
		if (isset($_POST["email__update"]) and $_POST["email__update"] != "") {
			$Database->UpdateEmail($_SESSION["login"], $_POST["email__update"]);
		}
		if (isset($_POST["login__update"]) and $_POST["login__update"] != "") {
			$Database->UpdateLogin($_SESSION["login"], $_POST["login__update"]);
		}
		$_SESSION['is_auth'] = "false";
		header('Location: user.php');
	}
}

function handlingPopUp($Database)
{
	function CheckAuthOrRegit()
	{
		if (isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["email"])) {
			$dataPost["type"] = "regit";
			$dataPost["login"] = $_POST["login"];
			$dataPost["password"] = $_POST["password"];
			$dataPost["email"] = $_POST["email"];
		} elseif (isset($_POST["login"]) && isset($_POST["password"])) {
			$dataPost["type"] = "auth";
			$dataPost["login"] = $_POST["login"];
			$dataPost["password"] = $_POST["password"];
		}
		return $dataPost;
	}

	function IncomeUser($user)
	{
		$_SESSION["is_auth"] = "true";
		$_SESSION["role"] = $user["role"];
		$_SESSION["login"] = $user["login"];
		$_SESSION["email"] = $user["email"];
		$_SESSION["id"] = $user["idUser"];
		header('Location: user.php');
	}

	if (isset($_POST["login"])) {
		$dataPost = CheckAuthOrRegit();
		if ($dataPost["type"] == "regit") {
			$user = $Database->Regit($dataPost);
			if ($user != -1) {
				IncomeUser($user);
			} else {
				global $authError, $errorMessage;
				$authError = true;
				$errorMessage = "Логин или почта уже занята!";
			}
		} elseif ($dataPost["type"] == "auth") {
			$user = $Database->Auth($dataPost);
			if ($user > 0) {
				IncomeUser($user);
			} else {
				global $authError, $errorMessage;
				$authError = true;
				$errorMessage = "Неверный логин или пароль!";
			}
		}
	}
}

function ActionWithUser($Database)
{
	if (isset($_GET["userUp"])) {
		$Database->ActionWithUser($_GET["userUp"], "userUp");
		header('Location: user.php');
	} elseif (isset($_GET["userDown"])) {
		$Database->ActionWithUser($_GET["userDown"], "userDown");
		header('Location: user.php');
	} elseif (isset($_GET["deleteUser"])) {
		$Database->ActionWithUser($_GET["deleteUser"], "delete");
		header('Location: user.php');
	}
}


function mainFunction($Database)
{
	if (CheckGet()) {
		ShowPopUp();
		exitFromProfile();
		delTourist($Database);
		ActionWithUser($Database);
	}

	if (CheckPost()) {
		handlingPopUp($Database);
		updateUser($Database);
		addTourist($Database);
	}
}

mainFunction($Database);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<title>Экскурсии</title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="favicon.ico">
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
					<h1 class="welcome__title">Личный кабинет</h1>
					<?php
					if ($_SESSION["is_auth"] == "true") {
						echo '<h2 class="welcome__title">Вы авторизованы!</h2>';
						echo '<a class="welcome__exit" href="user.php?exit=true">Выйти</a>';
					}
					?>
				</div>
				<div class="welcome__background">
					<picture>
						<source srcset="img/design/background.webp" type="image/webp"><img src="img/design/background.jpg" alt="background">
					</picture>
				</div>
			</section>
			<section class="page__userinfo userinfo">
				<?php
				if ($_SESSION["role"] == 1 && $_SESSION["is_auth"] == "true") {
					echo '<div class="userinfo__container">
						<h2 class="authorized__edit">Изменить данные авторизации</h2>
						<form class="form-edit" method="post">
							<div class="form-line">

							<label class="form-edit__label" for="login__update">Логин</label>
							<input class="form-edit__input-text" type="text" value="' . $_SESSION['login'] . '" name="login__update" placeholder="Login">
							
							</div>
							<div class="form-line">

							<label class="form-edit__label" for="email__update">Почта</label>
							<input value="' . $_SESSION["email"] . '" class="form-edit__input-text" type="email" name="email__update" placeholder="Email">
							
							</div>
							<div class="form-line">

							<label class="form-edit__label" for="password__update">Пароль</label>
							<input class="form-edit__input-text" type="password" name="password__update" placeholder="Пароль">
							
							</div>
							<input class="form-edit__input-submit" type="submit" value="Отправить">
						</form>
					</div>';
				}
				if ($_SESSION["role"] == 1 && $_SESSION["is_auth"] == "true") {
					echo '<div class="userinfo__container">
						<h2 class="authorized__edit">Добавить данные туристов</h2>
						<form class="form-edit" method="post">
							<div class="form-line">
							
							<label class="form-edit__label" for="login__update">ФИО</label>
							<input class="form-edit__input-text" required type="text" name="fio__tourist" placeholder="ФИО">
							
							</div>
							<div class="form-line">

							<label class="form-edit__label" for="email__update">Номер и серия паспорта</label>
							<input class="form-edit__input-text" required type="text" name="passport__tourist" placeholder="Паспорт">
							
							</div>
							<div class="form-line">
							
							<label class="form-edit__label" for="email__update">Пол</label>
							<input class="form-edit__input-text" required type="text" name="gender__tourist" placeholder="Пол">
							
							</div>

							<div class="form-line">
							
							<label class="form-edit__label" for="email__update">День рождениe</label>
							<input class="form-edit__input-text" required type="date" name="birthday__tourist" placeholder="Дата">
							
							</div>
							<input class="form-edit__input-submit" type="submit" value="Добавить">
						</form>
					</div>';
				}
				if ($_SESSION["role"] == 1 && $_SESSION["is_auth"] == "true") {
					$Database->ShowTourist($_SESSION["id"]);
				}
				if ($_SESSION["role"] == 3 && $_SESSION["is_auth"] == "true") {
					echo '<section class="page__users users">
					<div class="users__container">
						<h2 class="users__title">Список пользователей</h2>
						<div class="users__items">';
					$Database->ShowUsers();
					echo '</div>
					</div>
				</section>';
				}
				?>
			</section>
			<?php
			if ($_SESSION["is_auth"] == "false") {
				if ($_SESSION["showPopUp"] == "auth") {
					echo $popUpAuth;
				} else {
					echo $popUpRegit;
				}
			}
			?>
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
	<?php
	if (isset($authError) and $authError) {
		echo '<script language="javascript">alert("' . $errorMessage . '")</script>';
	}
	?>
</body>

</html>