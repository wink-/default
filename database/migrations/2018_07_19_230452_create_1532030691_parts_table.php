<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1532030691PartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('parts')) {
            Schema::create('parts', function (Blueprint $table) {
                $table->increments('id');
                $table->string('number')->nullable();
                $table->string('description')->nullable();
                $table->string('method_code')->nullable();
                $table->decimal('price', 15, 2)->nullable();
                $table->string('price_code')->nullable();
                $table->tinyInteger('certify')->nullable()->default('0');
                $table->string('specification')->nullable();
                $table->tinyInteger('bake')->nullable()->default('0');
                
                $table->timestamps();
                
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
        Schema::dropIfExists('parts');
    }
}
