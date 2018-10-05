<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('no action');
            $table->string('address')->charset('utf8')->collation('utf8_unicode_ci');
            $table->unsignedInteger('money_ship');
            $table->unsignedInteger('processing_status')->default(1);
            $table->dateTime('submit_time');
            $table->dateTime('delivery_time');
            $table->string('customer_note')->charset('utf8')->collation('utf8_unicode_ci');
            $table->unsignedInteger('payment_status');
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
        Schema::dropIfExists('orders');
    }
}
