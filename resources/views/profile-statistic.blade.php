<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/css/statistic.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
		<title>Document</title>
		<script defer src="/js/modal.js"></script>
	</head>
	<body>
		<header class="header header--lk">
			<div class="container">
				<div class="header--logo">
					<img src="img/лого.png" alt="" />
					<img src="img/burger.png" alt="" class="openModalBtn" data-modal="modal1" />
				</div>

				<div class="header--buttons">
					<span class="header--text">Личный кабинет</span>
				</div>
			</div>
		</header>
		<div class="modalka" id="modal1">
			<div class="navLK navLK__bar">
				<div>
					<figure></figure>
					<a href="/profile" class="active">
						<img src="/img/humen.png" alt="" />
						<span>Данные аккаунта</span>
					</a>
					<a href="/profile/create">
						<img src="/img/lk/create.png" alt="" />
						<span>Создать тест</span>
					</a>
					<a href="/profile/statistic">
						<img src="/img/lk/statistic.png" alt="" />
						<span>Статистика</span>
					</a>
					<a href="/profile/solved">
						<img src="/img/lk/solved.png" alt="" />
						<span>Мои решения</span>
					</a>
				</div>
				<a href="/logout">
					<img src="/img/lk/exit.png" alt="" />
					<span>Выйти из аккаунта</span>
				</a>
			</div>
		</div>

		<figure class="background"></figure>

		<main class="container">
			<nav class="navLK">
				<div>
					<figure></figure>
					<a href="/profile">
						<img src="/img/humen.png" alt="" />
						<span>Данные аккаунта</span>
					</a>
					<a href="/profile/create">
						<img src="/img/lk/create.png" alt="" />
						<span>Создать тест</span>
					</a>
					<a href="/profile/statistic" class="active">
						<img src="/img/lk/statistic.png" alt="" />
						<span>Статистика</span>
					</a>
					<a href="/profile/solved">
						<img src="/img/lk/solved.png" alt="" />
						<span>Мои решения</span>
					</a>
				</div>
				<a href="/logout">
					<img src="/img/lk/exit.png" alt="" />
					<span>Выйти из аккаунта</span>
				</a>
			</nav>

			<div class="main">
				<div class="statistic--header">
					<div class="input input__img">
						<label for="search"><img src="/img/lens.png" alt="" /></label>
						<input type="text" placeholder="поиск" name="search" id="search" class="input--field" />
					</div>
					<img src="/img/filter.png" alt="" class="openModalBtn" data-modal="modal2" />

					<div class="modalka" id="modal2">
						<form class="filter form">
							<div class="input">
								<label for="test">Тест</label>
								<select name="test" id="test" class="input--field">
									<option value="" disabled selected hidden>Выбрать вариант</option>
									<option value="1">тест 1</option>
									<option value="2">тест 2</option>
									<option value="3">тест 3</option>
									<option value="4">тест 4</option>
								</select>
							</div>

							<div class="input input__data">
								<label for="">Дата</label>
								<div>
									<select name="day" id="day" class="input--field">
										<option value="" disabled selected hidden>День</option>
										<option value="1">тест 1</option>
										<option value="2">тест 2</option>
										<option value="3">тест 3</option>
										<option value="4">тест 4</option>
									</select>
									<select name="month" id="month" class="input--field">
										<option value="" disabled selected hidden>Месяц</option>
										<option value="1">тест 1</option>
										<option value="2">тест 2</option>
										<option value="3">тест 3</option>
										<option value="4">тест 4</option>
									</select>
									<select name="year" id="year" class="input--field">
										<option value="" disabled selected hidden>Год</option>
										<option value="1">тест 1</option>
										<option value="2">тест 2</option>
										<option value="3">тест 3</option>
										<option value="4">тест 4</option>
									</select>
								</div>
							</div>

							<button type="submit" class="button button__light button__bold">Применить</button>
						</form>
					</div>
				</div>

				<div class="window">
					<div class="list">
						<a href="#" class="list--card">
							<span>Имя</span>
							<span>XX/XX</span>
							<span>Название теста</span>
							<span>Дата</span>
						</a>
						<a href="#" class="list--card">
							<span>Имя</span>
							<span>XX/XX</span>
							<span>Название теста</span>
							<span>Дата</span>
						</a>
						<a href="#" class="list--card">
							<span>Имя</span>
							<span>XX/XX</span>
							<span>Название теста</span>
							<span>Дата</span>
						</a>
						<a href="#" class="list--card">
							<span>Имя</span>
							<span>XX/XX</span>
							<span>Название теста</span>
							<span>Дата</span>
						</a>
						<a href="#" class="list--card">
							<span>Имя</span>
							<span>XX/XX</span>
							<span>Название теста</span>
							<span>Дата</span>
						</a>
						<a href="#" class="list--card">
							<span>Имя</span>
							<span>XX/XX</span>
							<span>Название теста</span>
							<span>Дата</span>
						</a>
						<a href="#" class="list--card">
							<span>Имя</span>
							<span>XX/XX</span>
							<span>Название теста</span>
							<span>Дата</span>
						</a>
						<a href="#" class="list--card">
							<span>Имя</span>
							<span>XX/XX</span>
							<span>Название теста</span>
							<span>Дата</span>
						</a>
						<a href="#" class="list--card">
							<span>Имя</span>
							<span>XX/XX</span>
							<span>Название теста</span>
							<span>Дата</span>
						</a>
						<a href="#" class="list--card">
							<span>Имя</span>
							<span>XX/XX</span>
							<span>Название теста</span>
							<span>Дата</span>
						</a>
					</div>
				</div>
			</div>
		</main>
	</body>
</html>
