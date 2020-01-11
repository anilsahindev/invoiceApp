<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('address')->nullable();
            $table->string('invoice_number')->nullable();

            $table->jsonb('activity_participants')->nullable();
            $table->string('activity_place')->nullable();
            $table->dateTime('activity_check_in')->nullable();
            $table->dateTime('activity_check_out')->nullable();
            $table->jsonb('activity_rooms')->nullable();
            $table->jsonb('activity_flight_tickets')->nullable();
            $table->jsonb('activity_program')->nullable();

            $table->boolean('has_airport_shuttle')->nullable();
            $table->boolean('has_golf_shuttle')->nullable();

            $table->float('price_activity')->nullable();
            $table->float('price_extra_activity')->nullable();
            $table->float('price_deposit')->nullable();
            $table->float('price_total')->nullable();

            $table->dateTime('payment_due_date')->nullable();

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
        Schema::dropIfExists('invoices');
    }
}
