<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('dni', 45); // or $table->string('dni', 45)->unique();
            // $table->unsignedBigInteger('com_id');
            // $table->primary(['dni', 'com_id', 'reg_id']);
            $table->string('email', 120);
            $table->string('name', 45);
            $table->string('last_name', 45);
            $table->string('address', 255)->nullable()->change();
            $table->date('date_reg');
            $table->enum('status', ['A', 'I', 'trash']);
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            // $table->foreign('com_id')->references('id')->on('communes');
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
