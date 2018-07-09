<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1530566490QuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('quotes')) {
            Schema::create('quotes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('partnumber')->nullable();
                $table->string('partdescription')->nullable();
                $table->string('specification')->nullable();
                $table->string('material');
                $table->enum('method', array('Barrel Plate', 'Bulk Process', 'Hand Operation', 'Lab Operation', 'Rack Plate'))->nullable();
                $table->integer('quantity_minimum')->nullable();
                $table->integer('quantity_maximum')->nullable();
                $table->decimal('price', 15, 2)->nullable();
                $table->enum('units', array('each', 'M', 'pound', 'ft', 'lot', 'in', 'sets'));
                $table->integer('quantity_price_break')->nullable();
                $table->decimal('price_break', 15, 2)->nullable();
                $table->string('thickness_minimum')->nullable();
                $table->string('thickness_maximum')->nullable();
                $table->string('weight')->nullable();
                $table->string('surface_area')->nullable();
                $table->string('baking_time_pre')->nullable();
                $table->string('baking_temp_pre')->nullable();
                $table->string('baking_time_post')->nullable();
                $table->string('baking_temp_post')->nullable();
                $table->string('bake_notes')->nullable();
                $table->tinyInteger('blasting')->nullable()->default('0');
                $table->string('blast_notes')->nullable();
                $table->tinyInteger('masking')->nullable()->default('0');
                $table->string('mask_notes')->nullable();
                $table->tinyInteger('testing')->nullable()->default('0');
                $table->string('testing_note')->nullable();
                $table->string('print')->nullable();
                $table->text('notes')->nullable();
                $table->text('comments')->nullable();
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
        Schema::dropIfExists('quotes');
    }
}
