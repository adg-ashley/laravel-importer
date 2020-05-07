<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mysql2")->create('accounts', function (Blueprint $table) {
            $table->string('id', 16)->primary();
            $table->string('account_id'); // adgainer accountid
            $table->string('name'); // adgainer accountid
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
        Schema::connection("mysql2")->dropIfExists('accounts');
    }
}
