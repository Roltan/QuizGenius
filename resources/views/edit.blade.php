<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/css/test.css" />
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
			<div class="settings">
				<h1>Настройки теста</h1>
				<div class="input">
					<label for="title">Название теста</label>
					<input type="text" name="title" id="title" class="input--field" />
				</div>
				<div class="input input__radio">
					<input type="checkbox" name="only_user" id="only_user" class="input--field toggle" />
					<label for="only_user">Только авторизованные тестируемые</label>
				</div>
				<div class="input input__radio">
					<input type="checkbox" name="leave" id="leave" class="input--field toggle" />
					<label for="leave">Запретить переключать страницу</label>
				</div>
				<div class="input">
					<label for="access">Доступ по</label>
					<select name="access" id="access" class="input--field">
						<option value="" disabled selected hidden>Выбрать вариант</option>
						<option value="1">тест 1</option>
						<option value="2">тест 2</option>
						<option value="3">тест 3</option>
						<option value="4">тест 4</option>
					</select>
				</div>
			</div>

			<div class="quest__edit">
				<div class="quest quest__choice">
					<span>задание задание задание задание задание задание задание задание задание задание задание задание задание</span>
					<div>
						<div class="input input__radio">
							<input type="radio" name="quest1" id="quest1choice1" class="input--field" disabled checked />
							<label for="quest1choice1">Label</label>
						</div>
						<div class="input input__radio">
							<input type="radio" name="quest1" id="quest1choice2" class="input--field" disabled />
							<label for="quest1choice2">Label</label>
						</div>
						<div class="input input__radio">
							<input type="radio" name="quest1" id="quest1choice3" class="input--field" disabled />
							<label for="quest1choice3">Label</label>
						</div>
						<div class="input input__radio">
							<input type="radio" name="quest1" id="quest1choice4" class="input--field" disabled />
							<label for="quest1choice4">Label</label>
						</div>
					</div>
				</div>
				<div class="buttons">
					<button>
						<img src="/img/edit/reset.png" alt="" />
					</button>
					<button>
						<img src="/img/edit/edit.png" alt="" class="openModalBtn" data-modal="questEdit1" />
					</button>
					<button>
						<img src="/img/edit/delet.png" alt="" />
					</button>
				</div>
			</div>
			<div class="modalka modalka--wrapper" id="questEdit1">
				<form class="quest--modal form">
					<div class="input">
						<label for="questEdit1Quest">Задание</label>
						<input type="text" name="questEdit1Quest" id="questEdit1Quest" class="input--field" />
					</div>
					<div class="answer">
						<div class="input input__radio">
							<input type="checkbox" name="questEdit1choice1" id="questEdit1choice1" class="input--field toggle" />
							<label for="questEdit1choice1">
								<div class="input">
									<input type="text" name="" id="" class="input--field" />
								</div>
							</label>
						</div>
						<div class="input input__radio">
							<input type="checkbox" name="questEdit1choice2" id="questEdit1choice2" class="input--field toggle" />
							<label for="questEdit1choice2"
								><div class="input">
									<input type="text" name="" id="" class="input--field" /></div
							></label>
						</div>
						<div class="input input__radio">
							<input type="checkbox" name="questEdit1choice3" id="questEdit1choice3" class="input--field toggle" />
							<label for="questEdit1choice3"
								><div class="input">
									<input type="text" name="" id="" class="input--field" /></div
							></label>
						</div>
						<div class="input input__radio">
							<input type="checkbox" name="questEdit1choice4" id="questEdit1choice4" class="input--field toggle" />
							<label for="questEdit1choice4"
								><div class="input">
									<input type="text" name="" id="" class="input--field" /></div
							></label>
						</div>
					</div>
					<div class="test--button test--button__max">
						<button class="test--add test--add__light">
							<div>
								<img src="/img/edit/add.png" alt="" />
							</div>
							Добавить вопрос
						</button>
						<button class="button button__blue button__bold">Сохранить</button>
					</div>
				</form>
			</div>

			<div class="quest__edit">
				<div class="quest quest__choice">
					<span>задание задание задание задание задание задание задание задание задание задание задание задание задание</span>
					<div>
						<div class="input input__radio">
							<input type="checkbox" name="quest1c1" id="quest2choice1" class="input--field" disabled />
							<label for="quest2choice1">Label</label>
						</div>
						<div class="input input__radio">
							<input type="checkbox" name="quest1c2" id="quest2choice2" class="input--field" disabled />
							<label for="quest2choice2">Label</label>
						</div>
						<div class="input input__radio">
							<input type="checkbox" name="quest1c3" id="quest2choice3" class="input--field" disabled />
							<label for="quest2choice3">Label</label>
						</div>
						<div class="input input__radio">
							<input type="checkbox" name="quest1c4" id="quest2choice4" class="input--field" disabled />
							<label for="quest2choice4">Label</label>
						</div>
					</div>
				</div>
				<div class="buttons">
					<button>
						<img src="/img/edit/reset.png" alt="" />
					</button>
					<button>
						<img src="/img/edit/edit.png" alt="" class="openModalBtn" data-modal="questEdit1" />
					</button>
					<button>
						<img src="/img/edit/delet.png" alt="" />
					</button>
				</div>
			</div>

			<div class="quest__edit">
				<div class="quest quest__blank">
					<span>задание задание задание задание задание задание задание задание задание задание задание задание задание</span>
					<div class="input">
						<label for="quest3">Ответ</label>
						<input type="text" name="quest3" id="quest3" class="input--field" disabled />
					</div>
				</div>
				<div class="buttons">
					<button>
						<img src="/img/edit/reset.png" alt="" />
					</button>
					<button>
						<img src="/img/edit/edit.png" alt="" class="openModalBtn" data-modal="questEdit2" />
					</button>
					<button>
						<img src="/img/edit/delet.png" alt="" />
					</button>
				</div>
			</div>
			<div class="modalka modalka--wrapper" id="questEdit2">
				<form class="quest--modal form">
					<div class="input">
						<label for="questEdit2Quest">Задание</label>
						<input type="text" name="questEdit2Quest" id="questEdit2Quest" class="input--field" />
					</div>
					<div class="answer answer__blank">
						<div class="input">
							<label for="questEdit2answer">Ответ</label>
							<input type="text" name="questEdit2answer" id="questEdit2answer" class="input--field" />
						</div>
					</div>
					<div class="test--button test--button__max">
						<button class="test--add test--add__light">
							<div>
								<img src="/img/edit/add.png" alt="" />
							</div>
							Добавить вопрос
						</button>
						<button class="button button__blue button__bold">Сохранить</button>
					</div>
				</form>
			</div>

			<div class="quest__edit">
				<div class="quest quest__fill">
					задание задание задание задание задание задание
					<span class="input input__little">
						<select name="quest4choice1" id="quest4choice1" class="input--field" disabled>
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
				<div class="buttons">
					<button>
						<img src="/img/edit/reset.png" alt="" />
					</button>
					<button>
						<img src="/img/edit/edit.png" alt="" class="openModalBtn" data-modal="questEdit3" />
					</button>
					<button>
						<img src="/img/edit/delet.png" alt="" />
					</button>
				</div>
			</div>
			<div class="modalka modalka--wrapper" id="questEdit3">
				<form class="quest--modal form">
					<span> В поле ввода напишите текст задания. В местах где хотите сделать выбор ответа, напишите варианты разделяя их “;” и заключив в <>. Пример <вариант 1;вариант 2;вариант 3> </span>
					<div class="input">
						<label for="questEdit2Quest">Задание</label>
						<textarea type="text" name="questEdit2Quest" id="questEdit2Quest" class="input--field"> </textarea>
					</div>
					<div class="test--button">
						<button class="button button__blue button__bold">Сохранить</button>
					</div>
				</form>
			</div>

			<div class="quest__edit">
				<div class="quest quest__relation">
					<span>задание задание задание задание задание задание задание задание задание задание задание задание задание</span>
					<div class="quest__relation--grid">
						<div>Текст варианта</div>
						<div class="interactive second-column" id="quest5choice1">Вариант 1</div>

						<div>Текст варианта</div>
						<div class="interactive second-column" id="quest5choice2">Вариант 2</div>

						<div>Текст варианта</div>
						<div class="interactive second-column" id="quest5choice3">Вариант 3</div>

						<div>Текст варианта</div>
						<div class="interactive second-column" id="quest5choice4">Вариант 4</div>
					</div>
				</div>
				<div class="buttons">
					<button>
						<img src="/img/edit/reset.png" alt="" />
					</button>
					<button>
						<img src="/img/edit/edit.png" alt="" class="openModalBtn" data-modal="questEdit4" />
					</button>
					<button>
						<img src="/img/edit/delet.png" alt="" />
					</button>
				</div>
			</div>
			<div class="modalka modalka--wrapper" id="questEdit4">
				<form class="quest--modal form">
					<div class="input">
						<label for="questEdit2Quest">Задание</label>
						<input type="text" name="questEdit2Quest" id="questEdit2Quest" class="input--field" />
					</div>
					<div class="answer answer__relation">
						<div class="input">
							<input type="text" name="" id="" class="input--field" />
						</div>
						<div class="input">
							<input type="text" name="" id="" class="input--field" />
						</div>
						<div class="input">
							<input type="text" name="" id="" class="input--field" />
						</div>
						<div class="input">
							<input type="text" name="" id="" class="input--field" />
						</div>

						<div class="input">
							<input type="text" name="" id="" class="input--field" />
						</div>
						<div class="input">
							<input type="text" name="" id="" class="input--field" />
						</div>
						<div class="input">
							<input type="text" name="" id="" class="input--field" />
						</div>
						<div class="input">
							<input type="text" name="" id="" class="input--field" />
						</div>
					</div>
					<div class="test--button test--button__max">
						<button class="test--add test--add__light">
							<div>
								<img src="/img/edit/add.png" alt="" />
							</div>
							Добавить пару
						</button>
						<button class="button button__blue button__bold">Сохранить</button>
					</div>
				</form>
			</div>

			<div class="test--button test--button__max">
				<button class="test--add">
					<div>
						<img src="/img/edit/add.png" alt="" />
					</div>
					Добавить вопрос
				</button>
				<button class="button button__blue button__bold">Сохранить тест</button>
			</div>
		</main>
	</body>
</html>
