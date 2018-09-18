<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>@yield('title') | Blader Example</title>
		<style>
			* {
				text-align: center;
			}
			nav {
				padding: 20px;
			}
			nav a {
				color: #09f;
			}
			main {
				padding: 20px;
				border-top: 1px solid #eee;
			}
		</style>
	</head>

	<body>
		<h1>Blader Example</h1>

		<nav>
			<a href="/">Home</a> |
			<a href="/about">About</a>
		</nav>

		<main>
			@yield('content')
		</main>
	</body>

</html>
