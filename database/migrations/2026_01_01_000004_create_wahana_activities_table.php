<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('wahana_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wahana_id')->constrained('wahana')->cascadeOnDelete();
            $table->date('activity_date');
            $table->enum('status', ['active', 'inactive', 'maintenance', 'finished'])->default('active');
            $table->unsignedInteger('visitor_count')->default(0);
            $table->decimal('income', 14, 2)->default(0);
            $table->text('notes')->nullable();
            $table->foreignId('recorded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->index(['activity_date', 'status']);
        });
    }
    public function down(): void { Schema::dropIfExists('wahana_activities'); }
};
