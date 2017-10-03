<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveLevels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('levels');
        Schema::table('ingredients', function($table) {
            $table->integer("status")->unsigned()->nullable();
            $table->string("unit")->nullable()->change();
        });
        Schema::table("users",function($table){
            $table->dropColumn("level_id");
            $table->integer("role")->unsigned();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('ingredients', function($table) {
            $table->dropColumn('status');
            $table->dropColumn('unit');
        });
        Schema::table("users",function($table){
            $table->dropColumn("role");
        });
    }
}
