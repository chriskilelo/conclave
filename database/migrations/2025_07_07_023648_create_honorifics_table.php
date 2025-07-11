<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('honorifics', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->unique(); // e.g. 'mr', 'mrs', 'dr', 'prof', 'rev'
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('honorifics');
    }
};
