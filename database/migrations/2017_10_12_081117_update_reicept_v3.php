<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReiceptV3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->float('price')->default(0)->change();
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn("seller");
        });
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign(["order_id"]);
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('CASCADE')->onUpdate('CASCADE');
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
            $table->dropColumn("price");
        });
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropColumn("quantity");
            $table->dropForeign(["order_id"]);
        });
    }
}
