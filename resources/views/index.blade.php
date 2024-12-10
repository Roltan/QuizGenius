<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Document</title>
		<link rel="stylesheet" href="/css/index.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
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
			<form class="form--login form" id="register">
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
			<div class="slogan">Создайте свой тест за считанные минуты!</div>

			<div class="index--main">
				<section class="descriptions">
					<div>
						<img src="/img/index/1666071.png" alt="" />
						<span>Разнообразные тематики</span>
					</div>
					<div>
						<img src="/img/index/125375123.png" alt="" />
						<span>Подробная статистика ответов</span>
					</div>
					<div>
						<img src="/img/index/123671253.png" alt="" />
						<span>Экономия времени</span>
					</div>
					<div>
						<img src="/img/index/7036414.png" alt="" />
						<span>Обширная база вопросов</span>
					</div>
				</section>
				<div class="line"></div>
				<form class="form">
                    <div>
                        <div class="input">
                            <label for="overCount">Количество вопросов</label>
                            <input type="text" name="overCount" id="overCount" class="input--field" />
                        </div>
                        <div class="input">
                            <label for="topic">Выберете тему</label>
                            <select name="topic" id="topic" class="input--field">
                                <option value="1">тема 1</option>
                                <option value="2">тема 2</option>
                                <option value="3">тема 3</option>
                                <option value="4">тема 4</option>
                            </select>
                        </div>
                    </div>

					<button type="submit" class="button button__blue button__bold">Сгенерировать</button>
				</form>
			</div>
		</main>
	</body>
</html>
