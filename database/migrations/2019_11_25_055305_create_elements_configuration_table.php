<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementsConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elements_configuration', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('min', 10);
            $table->string('max', 10);
            $table->string('neutral', 10);
            $table->string('unit', 10);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elements_configuration');
    }
}
