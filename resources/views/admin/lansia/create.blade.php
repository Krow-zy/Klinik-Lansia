@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Tambah Data</h1>

@if ($errors->any())
	<div class="p-3 mb-4 rounded bg-red-100 text-red-800">
		<strong>Terjadi kesalahan:</strong>
		<ul class="list-disc pl-6">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<form method="POST" action="{{ route('lansia.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
	@csrf
	@include('admin.lansia.partials.form-fields')
	<div class="md:col-span-2 flex items-center gap-3 mt-2">
		<a href="{{ route('admin.lansia.index') }}" class="px-4 py-2 rounded bg-gray-200">Batal</a>
		<button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white">Simpan</button>
	</div>
</form>
@endsection


