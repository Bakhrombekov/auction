<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('code', 255)->unique();
            $table->string('author', 255);
            $table->integer('year', false, true);
            $table->foreignId('classification_id')->constrained('classifications');
            $table->text('description')->nullable();
            $table->dateTime('auction_date')->default(now());
            $table->integer('price');
            $table->foreignId('status_id')->constrained('product_statuses');
            $table->foreignId('category_id')->constrained('categories');
            $table->string('image', 255)->nullable();
            $table->foreignId('material_id')->constrained('materials');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
