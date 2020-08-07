<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street', 200);
            $table->string('number', 50);
            $table->string('district', 200);
            $table->string('complement', 200);
            $table->string('state', 200);
            $table->string('country', 200);
            $table->string('cep', 50);
            $table->string('city',100);
            $table->boolean('active')->default(1);
            $table->string('responsible_type');
            $table->string('responsible_id');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
