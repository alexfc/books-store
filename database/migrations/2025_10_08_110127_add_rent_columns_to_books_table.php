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
        Schema::table('books', function (Blueprint $table) {
            $table->timestamp('rent_end_date')->nullable()->after('status');
            $table->foreignId('buyer_id')->nullable()->after('rent_end_date')->constrained('buyers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['buyer_id']);
            $table->dropColumn(['rent_end_date', 'buyer_id']);
        });
    }
};
