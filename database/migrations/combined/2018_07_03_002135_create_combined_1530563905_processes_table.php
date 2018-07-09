<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1530563905ProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('processes')) {
            Schema::create('processes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('code');
                $table->string('name')->nullable();
                $table->decimal('minimum_lot_charge', 15, 2)->nullable();
                $table->tinyInteger('compliant_rohs')->nullable()->default('1');
                $table->tinyInteger('compliant_reach')->nullable()->default('1');
                $table->tinyInteger('archive')->nullable()->default('0');
                $table->integer('revision')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processes');
    }
}
