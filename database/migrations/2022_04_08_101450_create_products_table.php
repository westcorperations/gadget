<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
             $table->bigInteger('category_id');
            
            $table->string('name');
            $table->mediumText('small_description');
            $table->longText('description');
            $table->string('original_price');
            $table->string('selling_price');
            $table->string('quantity');
            $table->string('tax');
            $table->string('image');
            $table->tinyInteger('status');
            $table->tinyInteger('trending');
            $table->mediumText('meta_title');
            $table->mediumText('meta_keyword');
            $table->mediumText('meta_description');
            $table->timestamps();
            // $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
