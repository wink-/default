<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b3a976046258RelationshipsToQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotes', function(Blueprint $table) {
            if (!Schema::hasColumn('quotes', 'customer_id')) {
                $table->integer('customer_id')->unsigned()->nullable();
                $table->foreign('customer_id', '180048_5b3a975c83e1f')->references('id')->on('customers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('quotes', 'contact_id')) {
                $table->integer('contact_id')->unsigned()->nullable();
                $table->foreign('contact_id', '180048_5b3a975ca3c17')->references('id')->on('contacts')->onDelete('cascade');
                }
                if (!Schema::hasColumn('quotes', 'process_id')) {
                $table->integer('process_id')->unsigned()->nullable();
                $table->foreign('process_id', '180048_5b3a975cc401c')->references('id')->on('processes')->onDelete('cascade');
                }
                if (!Schema::hasColumn('quotes', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '180048_5b3a975ce50ad')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('quotes', function(Blueprint $table) {
            if(Schema::hasColumn('quotes', 'customer_id')) {
                $table->dropForeign('180048_5b3a975c83e1f');
                $table->dropIndex('180048_5b3a975c83e1f');
                $table->dropColumn('customer_id');
            }
            if(Schema::hasColumn('quotes', 'contact_id')) {
                $table->dropForeign('180048_5b3a975ca3c17');
                $table->dropIndex('180048_5b3a975ca3c17');
                $table->dropColumn('contact_id');
            }
            if(Schema::hasColumn('quotes', 'process_id')) {
                $table->dropForeign('180048_5b3a975cc401c');
                $table->dropIndex('180048_5b3a975cc401c');
                $table->dropColumn('process_id');
            }
            if(Schema::hasColumn('quotes', 'user_id')) {
                $table->dropForeign('180048_5b3a975ce50ad');
                $table->dropIndex('180048_5b3a975ce50ad');
                $table->dropColumn('user_id');
            }
            
        });
    }
}
