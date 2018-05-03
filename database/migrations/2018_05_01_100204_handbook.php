<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Handbook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handbooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('systemName');
            $table->string('description');
            $table->text('additionalFields')->nullable();
            $table->integer('relation')->nullable();
            $table->timestamps();
        });

        Schema::create('handbook_data', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('handbook_id')->unsigned()->index();
            $table->integer('data_id');
            $table->string('value');
            $table->string('title');
            $table->integer('relation')->nullable();
            $table->text('additionalFieldsData')->nullable();
            $table->timestamps();
            $table->foreign('handbook_id')->references('id')->on('handbooks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('handbooks');
        Schema::dropIfExists('handbook_data');
    }
}
