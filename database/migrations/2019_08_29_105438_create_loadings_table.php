<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loadings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shipper');
            $table->string('contactNo');
            $table->date('loadingDate');
            $table->date('pickupDate');
            $table->string('loadingAdd');
            $table->string('loadingNum');
            $table->string('dCompanyName');;
            $table->string('dAddress');
            $table->string('dPerson');
            $table->string('dNumber');
            $table->bigInteger('invoiceNo')->nullable();
            $table->bigInteger('bookingNo');
            $table->string('conName');
            $table->string('conAddress');
            $table->string('conPhone');
            $table->string('oceanVess');
            $table->date('oceanDate');
            $table->string('shipPort');
            $table->string('delPort');
            $table->date('invoiceDate');
            $table->string('containerNo');
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
        Schema::dropIfExists('loadings');
    }
}