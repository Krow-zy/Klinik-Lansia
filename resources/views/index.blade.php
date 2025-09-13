<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KlinikLansia - Beranda</title>
	@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="antialiased">
	<div class="min-h-screen flex flex-col items-center justify-center p-6">
		<h1 class="text-3xl font-bold mb-6">KlinikLansia</h1>
		<p class="mb-8 text-gray-600">Sistem pendataan klinik lansia.</p>
		<nav class="flex gap-4">
			<a class="px-4 py-2 rounded bg-blue-600 text-white" href="{{ route('lansia.create') }}">Input Data Lansia</a>
		</nav>
	</div>
</body>
</html>


