<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - KlinikLansia</title>
	@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="antialiased">
	<div class="min-h-screen grid grid-cols-12">
		<aside class="col-span-12 md:col-span-3 lg:col-span-2 bg-gray-100 p-4">
			<div class="flex justify-between items-center mb-4">
				<h2 class="font-semibold">Admin</h2>
				<span class="text-sm text-gray-600">{{ Auth::user()->name ?? 'Admin' }}</span>
			</div>
			<nav class="flex flex-col gap-2">
				<a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600">Dashboard</a>
				<a href="{{ route('admin.lansia.index') }}" class="hover:text-blue-600">Data Lansia</a>
				<hr class="my-2">
				<form method="POST" action="{{ route('admin.logout') }}" class="inline">
					@csrf
					<button type="submit" class="text-red-600 hover:text-red-800 text-left">Logout</button>
				</form>
			</nav>
		</aside>
		<main class="col-span-12 md:col-span-9 lg:col-span-10 p-6">
			@yield('content')
		</main>
	</div>
</body>
</html>


