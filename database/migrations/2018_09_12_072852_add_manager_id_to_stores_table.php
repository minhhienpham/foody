<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddManagerIdToStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {
          $table->unsignedInteger('manager_id')->default(1);
          $table->foreign('manager_id')
                  ->references('id')->on('users')
                  ->onDelete('no action'); 
        });
    }
}
