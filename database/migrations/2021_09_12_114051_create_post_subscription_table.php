<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_subscription', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('subscriber_id');
            $table->timestamps();

            $table->foreign('subscriber_id')->references('id')->on('subscriber');
            $table->index(['subscriber_id', 'post_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_subscription');
    }
}
