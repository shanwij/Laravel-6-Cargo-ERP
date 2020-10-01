<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Contact_First');
            $table->string('Contact_Last');
            $table->string('Email');
            $table->string('Phone');
            $table->string('Contact_Title');
            $table->date('Date_of_Initial_Contact');
            $table->string('Title');
            $table->string('Company');
            $table->string('Address');
            $table->string('Address_Street_1');
            $table->string('Address_City');
            $table->string('Address_State');
            $table->integer('Address_Zip');
            $table->string('Address_Country');
            $table->string('Status');   
            $table->string('Sales_Rep');
            $table->string('Project_Type');
            $table->string('Project_Description');
            $table->date('Proposal_Due_Date'); 
            $table->double('Budget');
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
        Schema::dropIfExists('contacts');
    }
}
