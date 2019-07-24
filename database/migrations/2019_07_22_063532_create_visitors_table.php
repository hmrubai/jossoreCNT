<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('profession')->nullable();
            $table->string('designation')->nullable();
            $table->date('log_date');
            $table->string('log_in_time')->nullable();
            $table->string('log_out_time')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('driver_phone_no')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('visit_from')->nullable();
            $table->string('visit_to')->nullable();
            $table->string('purpose')->nullable();
            $table->string('picture')->nullable();
            $table->string('fingure_print')->nullable();
            $table->string('barcode')->nullable();
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
        Schema::dropIfExists('visitors');
    }
}
