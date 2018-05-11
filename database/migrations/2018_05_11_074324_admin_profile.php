<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_profile', function (Blueprint $table) {
            $table->integer('admin_id')->unsigned();
            $table->string('surname');
            $table->string('name');
            $table->string('last_name');
            $table->string('birthday');
            $table->string('avatar');
            $table->timestamps();
            $table->foreign('admin_id')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');

            $table->primary(['admin_id']);
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
