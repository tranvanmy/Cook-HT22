<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReceiptV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->integer('time')->unsigned()->nullable();
            $table->integer('ration')->nullable()->nullable();
            $table->integer('complex')->unsigned()->nullable();
            $table->integer('status')->unsigned()->default(2);
        });
        Schema::table("receipt_steps",function(Blueprint $table){
           $table->string("image")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->dropColumn('time');
            $table->dropColumn('ration');
            $table->dropColumn('complex');
            $table->dropColumn('status');
        });
        Schema::table("receipt_steps",function(Blueprint $table){
            $table->dropColumn("image");
        });
    }
}
