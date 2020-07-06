<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->integer('age');
            $table->float('hight');
            $table->float('weight');
            $table->timestamps();
        });

        Schema::create('__people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('bio');
            $table->integer('person_id');
            $table->integer('locale_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
        Schema::dropIfExists('__people');
    }
}
