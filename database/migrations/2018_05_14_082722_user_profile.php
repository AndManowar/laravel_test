<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->string('surname');
            $table->string('name');
            $table->string('last_name');
            $table->string('birthday')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('region')->nullable();
            $table->integer('country')->nullable();
            $table->integer('city')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->primary(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_profile');
    }
}
