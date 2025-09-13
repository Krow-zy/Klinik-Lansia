<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('lansia_data', function (Blueprint $table) {
			$table->id();
			$table->string('nama_petugas');
			$table->string('nama_lansia');
			$table->date('tanggal_lahir');
			$table->date('tanggal');
			$table->string('nik')->unique();
			$table->text('alamat');
			$table->string('tempat_tinggal');
			$table->decimal('bb', 8, 2)->nullable();
			$table->decimal('tb', 8, 2)->nullable();
			$table->decimal('lp', 8, 2)->nullable();
			$table->string('tensi')->nullable();
			$table->decimal('gd', 8, 2)->nullable();
			$table->decimal('au', 8, 2)->nullable();
			$table->decimal('chdl', 8, 2)->nullable();
			$table->text('obat')->nullable();
			$table->text('kondisi')->nullable();
			$table->text('keluhan')->nullable();
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('lansia_data');
	}
};


