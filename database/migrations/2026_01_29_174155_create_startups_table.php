<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('startups', function (Blueprint $table) {
            $table->id(); 
            $table->string('nome');
            $table->string('setor');
            $table->string('email_contato');
            $table->timestamp('data_cadastro')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('startups');
    }
};
