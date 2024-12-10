<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/css/profile.css" />
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
		<div class="modalka modalka--wrapper" id="modal1">
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
			</nav>

			<div class="main">
				<div>
					<img src="/img/lk/humen.png" alt="" />
					<div class="input input__dark">
						<label for="name">Имя</label>
						<input type="text" name="name" id="name" class="input--field" readonly />
					</div>
					<div class="input input__dark">
						<label for="email">Почта</label>
						<input type="email" name="email" id="email" class="input--field" readonly />
					</div>
				</div>
			</div>
		</main>
	</body>
</html>
