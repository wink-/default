<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b3a975ff03c1RelationshipsToContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function(Blueprint $table) {
            if (!Schema::hasColumn('contacts', 'customer_id')) {
                $table->integer('customer_id')->unsigned()->nullable();
                $table->foreign('customer_id', '180019_5b3a68ccbaca3')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::table('contacts', function(Blueprint $table) {
            if(Schema::hasColumn('contacts', 'customer_id')) {
                $table->dropForeign('180019_5b3a68ccbaca3');
                $table->dropIndex('180019_5b3a68ccbaca3');
                $table->dropColumn('customer_id');
            }
            
        });
    }
}
