<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   // database/migrations/xxxx_xx_xx_xxxxxx_create_announcements_tables.php
public function up(): void {
    Schema::create('announcements', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('body');
        $table->enum('audience_type', ['all','roles','users'])->default('all')->index();
        $table->json('targets')->nullable(); // when roles/users: store ['frontend', ...] or [userIds...]
        $table->timestamp('starts_at')->nullable()->index();
        $table->timestamp('ends_at')->nullable()->index();
        $table->boolean('is_sticky')->default(false);
        $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
        $table->timestamps();
    });

    Schema::create('announcement_reads', function (Blueprint $table) {
        $table->id();
        $table->foreignId('announcement_id')->constrained()->cascadeOnDelete();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->timestamp('read_at');
        $table->unique(['announcement_id','user_id']);
    });
}
public function down(): void {
    Schema::dropIfExists('announcement_reads');
    Schema::dropIfExists('announcements');
}

};
