<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserReceiptSteps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("user_receipt_steps", function (Blueprint $table) {
            $table->dropColumn('detail');
            $table->string('image')->nullable();
            $table->integer('step')->unsigned();
            $table->string('content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("user_receipt_steps", function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('step');
            $table->dropColumn('content');
        });
    }
}
