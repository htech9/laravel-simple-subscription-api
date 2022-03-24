<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationNotifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_notifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id');
            $table->foreignId('subscription_id');
            $table->timestamps();

            $table->unique(['post_id', 'subscription_id']);
            $table->index(['post_id', 'subscription_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publication_notifs');
    }
}
