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
    Schema::table('products', function (Blueprint $table) {
        // first drop the index on category_id
        //$table->dropIndex(['category_id']);
        // then drop the column itself
        //$table->dropColumn('category_id');
    });
}

public function down(): void
{
    Schema::table('products', function (Blueprint $table) {
        $table->unsignedBigInteger('category_id')->nullable()->index();
    });
}
};
