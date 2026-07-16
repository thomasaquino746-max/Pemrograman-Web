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
    Schema::create('incoming_products', function (Blueprint $table) {
        $table->id();

        $table->foreignId('product_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->integer('qty');

        $table->date('date');

        $table->string('supplier')->nullable();

        $table->text('note')->nullable();

        $table->timestamps();
    });
}
};
