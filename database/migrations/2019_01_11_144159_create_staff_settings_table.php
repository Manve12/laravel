<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->boolean('ticketsStatistics');
            $table->boolean('ticketsOpen');
            $table->boolean('ticketsClosed');
            $table->boolean('tasksStatistics');
            $table->boolean('tasksOpened');
            $table->boolean('tasksClosed');
            $table->boolean('invoiceStatistics');
            $table->boolean('invoicePaid');
            $table->boolean('invoiceUnpaid');
            $table->boolean('invoiceCreate');
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
        Schema::dropIfExists('staff_settings');
    }
}
