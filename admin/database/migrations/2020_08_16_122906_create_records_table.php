<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('history_id');
            $table->foreign('history_id')->references('id')->on('histories');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->string('anamnesis')->nullable();
            $table->string('family_history')->nullable();
            $table->string('treatment_plan')->nullable();
            $table->string('diagnostic_conclusion')->nullable();
            $table->float('weight', 8,2)->nullable();
            $table->integer('height')->nullable();
            $table->integer('heart_rate')->nullable();
            $table->integer('respiratory_frequency')->nullable();
            $table->integer('systolic_bp')->nullable();
            $table->integer('diastolic_bp')->nullable();
            $table->float('temperature', 3, 1)->nullable();
            $table->string('allergy')->nullable();
            $table->string('chronic_diseases')->nullable();
            $table->boolean('hypertension')->nullable();
            $table->boolean('diabetes')->nullable();
            $table->boolean('smoker')->nullable();
            $table->boolean('drug_user')->nullable();
            $table->datetime('expected_return')->nullable();
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
        Schema::dropIfExists('records');
    }
}
