<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->string('name',100)->unique();
            $table->string('code',20)->unique();
            $table->string('slug',150)->unique();
            $table->string('banner')->nullable();
            $table->decimal('price',10, 2);
            $table->text('description');
            $table->text('product_feature');
            $table->tinyInteger('popular')->default(0);
            $table->integer('offer_ratio')->default(0);
            $table->tinyInteger('offer')->default(0);
            $table->tinyInteger('publication_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
