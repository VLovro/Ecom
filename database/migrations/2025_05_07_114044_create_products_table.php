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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2)->index();
            $table->enum('gender', ['men','women','unisex'])->default('unisex')->index();
            $table->foreignId('brand_id')
            ->nullable()
            ->constrained()       // references brands.id
            ->cascadeOnDelete();
            $table->foreignId('team_id')
            ->nullable()
            ->constrained()
            ->cascadeOnDelete();

            $table->string('image_path')->nullable();
            $table->unsignedInteger('stock')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
