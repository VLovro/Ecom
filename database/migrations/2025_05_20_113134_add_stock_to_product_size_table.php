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
        Schema::table('product_size', function (Blueprint $table) {
            $table->unsignedInteger('stock')->default(0)->after('size_id');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_size', function (Blueprint $table) {
            if (Schema::hasColumn('product_size', 'stock')) {
                $table->dropColumn('stock');
            }
        });
    }
};
