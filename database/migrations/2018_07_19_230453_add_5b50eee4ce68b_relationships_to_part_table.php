<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b50eee4ce68bRelationshipsToPartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parts', function(Blueprint $table) {
            if (!Schema::hasColumn('parts', 'customer_id')) {
                $table->integer('customer_id')->unsigned()->nullable();
                $table->foreign('customer_id', '186448_5b50eee416ae6')->references('id')->on('customers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('parts', 'process_id')) {
                $table->integer('process_id')->unsigned()->nullable();
                $table->foreign('process_id', '186448_5b50eee43298b')->references('id')->on('processes')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parts', function(Blueprint $table) {
            
        });
    }
}
