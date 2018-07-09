<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b3a976022a85RelationshipsToUserActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_actions', function(Blueprint $table) {
            if (!Schema::hasColumn('user_actions', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '179975_5b3a4daeded47')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('user_actions', function(Blueprint $table) {
            if(Schema::hasColumn('user_actions', 'user_id')) {
                $table->dropForeign('179975_5b3a4daeded47');
                $table->dropIndex('179975_5b3a4daeded47');
                $table->dropColumn('user_id');
            }
            
        });
    }
}
