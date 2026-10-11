<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('wahana', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('operator_name')->nullable();
            $table->string('location')->nullable();
            $table->enum('status', ['active', 'inactive', 'maintenance', 'finished'])->default('inactive');
            $table->time('opening_time')->nullable();
            $table->time('closing_time')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('wahana'); }
};
