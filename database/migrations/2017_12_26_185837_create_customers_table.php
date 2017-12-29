<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('cpf', 11);
            $table->string('rg', 255);
            $table->integer('gender'); // 0 => Mulher; 1 => Homem
            $table->string('email', 255);
            $table->string('phone', 255);

            $table->string('cep', 30);
            $table->string('address', 255);
            $table->string('building_number', 255);
            $table->string('complement', 255);
            $table->string('district', 255);
            $table->string('city', 255);
            $table->string('uf', 2);

            $table->dateTime('birthday'); // Aniversario
            $table->longText('description');

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
        Schema::dropIfExists('customers');
    }
}
