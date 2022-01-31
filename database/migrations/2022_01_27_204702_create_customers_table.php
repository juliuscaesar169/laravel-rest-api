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
            $table->primary(['dni', 'id_com', 'id_reg']);
            $table->string('dni', 45);
            $table->integer('id_com');
            $table->integer('id_reg');
            $table->string('email', 120);
            $table->string('name', 45);
            $table->string('last_name', 45);
            $table->string('address', 255)->nullable($value = true);
            $table->date('date_reg');
            $table->enum('status', ['A', 'I', 'trash']);
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            // $table->foreign('com_id')->references('id')->on('communes');
            // $table->foreignId('com_id')->constrained('communes'); // snd way . to check
            $table->engine = 'MyISAM';
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
