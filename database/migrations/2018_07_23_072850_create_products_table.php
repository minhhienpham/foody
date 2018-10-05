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
            $table->string('name', 100 )->charset('utf8')->collation('utf8_unicode_ci');
            $table->text('describe')->nullable()->charset('utf8')->collation('utf8_unicode_ci');
            $table->unsignedInteger('price');
            $table->unsignedInteger('store_id');
            $table->foreign('store_id')
                    ->references('id')->on('stores')
                    ->onDelete('no action');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->onDelete('no action');
            $table->timestamps();
            $table->softDeletes('deleted_at');
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
