<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditReceiptSteps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receipt_steps', function (Blueprint $table) {
            $table->dropColumn("detail");
            $table->integer('step')->unsigned();
            $table->text('content')->nullable();
            $table->integer('status')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingredients', function (Blueprint $table) {
            $table->dropColumn("step");
            $table->dropColumn("content");
            $table->dropColumn("status");
        });
    }
}
