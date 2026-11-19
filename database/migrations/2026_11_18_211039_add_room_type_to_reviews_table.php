<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            if (!Schema::hasColumn('reviews', 'user_id')) {
                $table->foreignId('user_id')->after('id')->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('reviews', 'room_type')) {
                $table->string('room_type')->after('user_id');
            }
            if (!Schema::hasColumn('reviews', 'rating')) {
                $table->integer('rating')->default(5)->after('room_type');
            }
            if (!Schema::hasColumn('reviews', 'comment')) {
                $table->text('comment')->after('rating');
            }
        });
    }

    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'room_type', 'rating', 'comment']);
        });
    }
};
