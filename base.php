<?php
$popUpAuth = '<div class="popup popup_auth">
      <div class="popup__body">
         <div class="popup__line"><span class="popup__title">Авторизация</span><a href="home.php" class="popup__exit">X</a></div>
         <form action="user.php" method="POST" class="popup__form form-popup">
            <div class="form-popup__line">
               <label class="form-popup__label" for="login">Логин:</label>
               <input class="form-popup__input" maxlength="128" required id="login" name="login" type="text">
            </div>
            <div class="form-popup__line">
               <label class="form-popup__label" for="password">Пароль:</label>
               <input class="form-popup__input" maxlength="128" required id="password" name="password" type="password">
            </div>
            <a class="form-popup__link" href="user.php?showPopUp=regit">Зарегестрироваться</a>
            <button type="submit" class="form-popup__button">Войти</button>
         </form>
      </div>
</div>';

$popUpRegit = '<div class="popup popup_registr">
		<div class="popup__body">
      <div class="popup__line"><span class="popup__title">Регистрация</span><a href="home.php" class="popup__exit">X</a></div>
			<form action="user.php" method="POST" class="popup__form form-popup">
				<div class="form-popup__line">
					<label class="form-popup__label" for="login">Логин:</label>
					<input class="form-popup__input" maxlength="128" required id="login" name="login" type="text">
				</div>
				<div class="form-popup__line">
					<label class="form-popup__label" for="password">Пароль:</label>
					<input class="form-popup__input" maxlength="128" required id="password" name="password" type="password">
				</div>
				<div class="form-popup__line">
					<label class="form-popup__label" for="email">Почта:</label>
					<input class="form-popup__input" maxlength="128" required id="email" name="email" type="email">
				</div>
            <a class="form-popup__link" href="user.php?showPopUp=auth">Авторизоваться</a>
				<button type="submit" class="form-popup__button">Зарегестрироваться</button>
			</form>
		</div>
</div>';

$popUpTour = '<div class="popup popup_tour">
		<div class="popup__body">
      <div class="popup__line"><span class="popup__title">Оформление тура</span><a href="home.php?booking=exit" class="popup__exit">X</a></div>
			<form action="tours.php" method="get" class="popup__form form-popup">
				<div class="form-popup__line">
					<label class="form-popup__label" for="dateOut">Дата вылета:</label>
					<input class="form-popup__input" maxlength="128" required id="dateOut" name="dateOut" type="date">
				</div>
				<div class="form-popup__line">
					<label class="form-popup__label" for="amountNights">Колличество ночей:</label>
					<input class="form-popup__input" required id="amountNights" name="amountNights" min="1" max="20" step="1" value="7" type="number">
				</div>
				<button type="submit" class="form-popup__button">Оформить</button>
			</form>
		</div>
</div>';

$ChargTour = '';

function CheckPost()
{
   if (!empty($_POST)) {
      return true;
   } else {
      return false;
   }
}

function CheckGet()
{
   if (!empty($_GET)) {
      return true;
   } else {
      return false;
   }
}

function StartSession()
{
   if (!isset($_SESSION["is_auth"])) {
      $_SESSION["is_auth"] = "false";
      $_SESSION["role"] = "0";
      $_SESSION["showPopUp"] = "auth";
      $_SESSION["booking"] = "false";
      $_SESSION["finalValue"] = "";
   }
}
