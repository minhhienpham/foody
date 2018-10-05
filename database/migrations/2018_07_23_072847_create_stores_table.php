<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100 )->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('address', 100)->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('phone');
            $table->text('describe')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('image');
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('stores');
    }
}
