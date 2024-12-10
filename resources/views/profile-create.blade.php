<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/css/create.css" />
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
					<a href="">
						<img src="/img/humen.png" alt="" />
						<span>Данные аккаунта</span>
					</a>
					<a href="" class="active">
						<img src="/img/lk/create.png" alt="" />
						<span>Создать тест</span>
					</a>
					<a href="">
						<img src="/img/lk/statistic.png" alt="" />
						<span>Статистика</span>
					</a>
					<a href="">
						<img src="/img/lk/solved.png" alt="" />
						<span>Мои решения</span>
					</a>
				</div>
				<a href="">
					<img src="/img/lk/exit.png" alt="" />
					<span>Выйти из аккаунта</span>
				</a>
			</nav>

			<div class="main">
				<form>
					<div class="input input__dark">
						<label for="name">Название</label>
						<input type="text" name="name" id="name" class="input--field" />
					</div>

					<section>
						<div>
							<h1>Количество вопросов</h1>
							<div class="input--wrap__img">
								<img src="/img/create/choice.png" alt="" />
								<div class="input input__dark">
									<label for="choice">С выбором</label>
									<input type="text" placeholder="число" name="choice" id="choice" class="input--field" />
								</div>
							</div>
							<div class="input--wrap__img">
								<img src="/img/create/blank.png" alt="" />
								<div class="input input__dark">
									<label for="blank">С бланком</label>
									<input type="text" placeholder="число" name="blank" id="blank" class="input--field" />
								</div>
							</div>
							<div class="input--wrap__img">
								<img src="/img/create/relation.png" alt="" />
								<div class="input input__dark">
									<label for="relation">На соотношение</label>
									<input type="text" placeholder="число" name="relation" id="relation" class="input--field" />
								</div>
							</div>
							<div class="input--wrap__img">
								<img src="/img/create/fill.png" alt="" />
								<div class="input input__dark">
									<label for="fill">На заполнение</label>
									<input type="text" placeholder="число" name="fill" id="fill" class="input--field" />
								</div>
							</div>
						</div>
						<div>
							<h1>Общее</h1>
							<div class="input input__dark">
								<label for="topic">Тема</label>
								<select name="topic" id="topic" class="input--field">
									<option value="1">тема 1</option>
									<option value="2">тема 2</option>
									<option value="3">тема 3</option>
									<option value="4">тема 4</option>
								</select>
							</div>
							<div class="input input__dark">
								<label for="difficulty">Тема</label>
								<select name="difficulty" id="difficulty" class="input--field">
									<option value="1">тема 1</option>
									<option value="2">тема 2</option>
									<option value="3">тема 3</option>
									<option value="4">тема 4</option>
								</select>
							</div>
							<div class="input input__dark">
								<label for="overCount">Количество вопросов</label>
								<input type="text" placeholder="число" name="overCount" id="overCount" class="input--field" />
							</div>
						</div>
					</section>

					<button type="submit" class="button button__blue button__bold">Сгенерировать</button>
				</form>
			</div>
		</main>
	</body>
</html>
