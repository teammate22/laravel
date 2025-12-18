<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Добавляем поле для статуса модерации
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            // Кто и когда отмодерировал
            $table->foreignId('moderated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('moderated_at')->nullable();

            // Причина отклонения (если нужно)
            $table->text('rejection_reason')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn(['status', 'moderated_by', 'moderated_at', 'rejection_reason']);
        });
    }
};
