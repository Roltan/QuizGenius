<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/css/solved.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
		<title>Document</title>
		<script defer src="/js/modal.js"></script>
	</head>
	<body>
		<header class="header">
			<div class="container">
				<div class="header--logo">
					<img src="/img/лого.png" alt="" />
				</div>

				<div class="header--buttons">
					<button class="button button__blue openModalBtn" data-modal="modal1">Вход</button>
					<button class="button button__blue openModalBtn" data-modal="modal2">Регистрация</button>
				</div>
			</div>
		</header>

		<figure class="background"></figure>

		<div class="modalka modalka--wrapper" id="modal1">
			<form class="form--login form" id="login">
				<h1>Вход</h1>
				<div class="input">
					<label for="email_login">Почта</label>
					<input type="email" name="email" id="email_login" class="input--field" />
				</div>
				<div class="input">
					<label for="password_login">Пароль</label>
					<input type="password" name="email" id="password_login" class="input--field" />
				</div>
				<button type="submit" class="button button__blue button__bold">Войти</button>
			</form>
		</div>
		<div class="modalka modalka--wrapper" id="modal2">
			<form class="form--login from" id="register">
				<h1>Регистрация</h1>
				<div class="input">
					<label for="name">Имя</label>
					<input type="text" name="name" id="name" class="input--field" />
				</div>
				<div class="input">
					<label for="email_reg">Почта</label>
					<input type="email" name="email" id="email_reg" class="input--field" />
				</div>
				<div class="input">
					<label for="password_reg">Пароль</label>
					<input type="password" name="password" id="password_reg" class="input--field" />
				</div>
				<div class="input">
					<label for="password_confirmation">Повторите пароль</label>
					<input type="password" name="password_confirmation" id="password_confirmation" class="input--field" />
				</div>
				<div class="input input__checkbox">
					<input type="checkbox" name="rule" id="rule" />
					<label for="rule">
						<span>
							Я соглашаюсь на обработку
							<a href="#">персональных данных</a>
						</span>
					</label>
				</div>
				<button type="submit" class="button button__blue button__bold">Зарегистрироваться</button>
			</form>
		</div>

		<main class="container">
			<div class="main--header__row">
				<h1 class="main--header">Название теста</h1>
				<h1 class="main--header">Тема теста</h1>
			</div>

			<div class="settings">
				<h1>Имя тестируемого: NAME</h1>

				<div>
					<div>
						<span>Оценка: Х</span>
						<span>Процент правильных ответов: XX%</span>
						<span>Дата прохождения: xx-xx-xxxx</span>
					</div>
					<div>
						<span>Набрал баллов: XX</span>
						<span>Потрачено времени: XXX</span>
						<span>
							<img src="/img/checkbox/true.png" alt="" />
							Не покидал страницу
						</span>
					</div>
				</div>
			</div>

			<div class="quest quest__choice">
				<span>задание задание задание задание задание задание задание задание задание задание задание задание задание</span>
				<div>
					<div class="input input__radio">
						<input type="checkbox" name="quest1c1" id="quest2choice1" class="input--field true" disabled checked />
						<label for="quest2choice1">Label</label>
					</div>
					<div class="input input__radio">
						<input type="checkbox" name="quest1c2" id="quest2choice2" class="input--field false" disabled checked />
						<label for="quest2choice2">Label</label>
					</div>
					<div class="input input__radio">
						<input type="checkbox" name="quest1c3" id="quest2choice3" class="input--field" disabled checked />
						<label for="quest2choice3">Label</label>
					</div>
					<div class="input input__radio">
						<input type="checkbox" name="quest1c4" id="quest2choice4" class="input--field" disabled />
						<label for="quest2choice4">Label</label>
					</div>
				</div>
			</div>
			<div class="quest quest__blank">
				<span>задание задание задание задание задание задание задание задание задание задание задание задание задание</span>
				<div class="input--wrap__img">
					<img src="/img/checkbox/false.png" alt="" />
					<div class="input">
						<label for="quest3">Ответ</label>
						<input type="text" name="quest3" id="quest3" class="input--field" disabled />
					</div>
				</div>
			</div>
			<div class="quest quest__fill">
				задание задание задание задание задание задание
				<span class="input input__little">
					<select name="quest4choice1" id="quest4choice1" class="input--field true" disabled>
						<option value="" disabled selected hidden>вариант</option>
						<option value="1">тема 1</option>
						<option value="2">тема 2</option>
						<option value="3">тема 3</option>
						<option value="4">тема 4</option>
					</select>
				</span>
				задание задание задание задание задание задание
				<span class="input input__little">
					<select name="quest4choice2" id="quest4choice2" class="input--field" disabled>
						<option value="" disabled selected hidden>вариант</option>
						<option value="1">тема 1</option>
						<option value="2">тема 2</option>
						<option value="3">тема 3</option>
						<option value="4">тема 4</option>
					</select>
				</span>
				задание задание задание задание задание задание задание задание задание задание задание задание задание
				<span class="input input__little">
					<select name="quest4choice2" id="quest4choice2" class="input--field" disabled>
						<option value="" disabled selected hidden>вариант</option>
						<option value="1">тема 1</option>
						<option value="2">тема 2</option>
						<option value="3">тема 3</option>
						<option value="4">тема 4</option>
					</select>
				</span>
				задание задание задание
			</div>
			<div class="quest quest__relation">
				<span>задание задание задание задание задание задание задание задание задание задание задание задание задание</span>
				<div class="quest__relation--grid quest__relation--grid__solved">
					<div>Текст варианта</div>
					<img src="/img/checkbox/true.png" alt="" />
					<div class="interactive second-column" draggable="true" id="quest5choice1">Вариант 1</div>

					<div>Текст варианта</div>
					<img src="/img/checkbox/false.png" alt="" />
					<div class="interactive second-column" draggable="true" id="quest5choice2">Вариант 2</div>

					<div>Текст варианта</div>
					<img src="/img/checkbox/false.png" alt="" />
					<div class="interactive second-column" draggable="true" id="quest5choice3">Вариант 3</div>

					<div>Текст варианта</div>
					<img src="/img/checkbox/false.png" alt="" />
					<div class="interactive second-column" draggable="true" id="quest5choice4">Вариант 4</div>
				</div>
			</div>

			<div class="test--button">
				<button class="button button__blue button__bold">Назад</button>
			</div>
		</main>
	</body>
</html>
