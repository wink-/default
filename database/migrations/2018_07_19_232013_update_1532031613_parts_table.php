<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1532031613PartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parts', function (Blueprint $table) {
            
if (!Schema::hasColumn('parts', 'procedure_code')) {
                $table->string('procedure_code')->nullable();
                }
if (!Schema::hasColumn('parts', 'material')) {
                $table->string('material')->nullable();
                }
if (!Schema::hasColumn('parts', 'material_name')) {
                $table->string('material_name')->nullable();
                }
if (!Schema::hasColumn('parts', 'material_condition')) {
                $table->string('material_condition')->nullable();
                }
if (!Schema::hasColumn('parts', 'thickness_minimum')) {
                $table->string('thickness_minimum')->nullable();
                }
if (!Schema::hasColumn('parts', 'thickness_maximum')) {
                $table->string('thickness_maximum')->nullable();
                }
if (!Schema::hasColumn('parts', 'thickness_unit_code')) {
                $table->string('thickness_unit_code')->nullable();
                }
if (!Schema::hasColumn('parts', 'surface_area')) {
                $table->string('surface_area')->nullable();
                }
if (!Schema::hasColumn('parts', 'surface_area_unit_code')) {
                $table->string('surface_area_unit_code')->nullable();
                }
if (!Schema::hasColumn('parts', 'weight')) {
                $table->string('weight')->nullable();
                }
if (!Schema::hasColumn('parts', 'weight_unit_code')) {
                $table->string('weight_unit_code')->nullable();
                }
if (!Schema::hasColumn('parts', 'length')) {
                $table->string('length')->nullable();
                }
if (!Schema::hasColumn('parts', 'width')) {
                $table->string('width')->nullable();
                }
if (!Schema::hasColumn('parts', 'height')) {
                $table->string('height')->nullable();
                }
if (!Schema::hasColumn('parts', 'dimension_unit_code')) {
                $table->string('dimension_unit_code')->nullable();
                }
if (!Schema::hasColumn('parts', 'material_thickness')) {
                $table->string('material_thickness')->nullable();
                }
if (!Schema::hasColumn('parts', 'material_thickness_unit_code')) {
                $table->string('material_thickness_unit_code')->nullable();
                }
if (!Schema::hasColumn('parts', 'special_requirement')) {
                $table->text('special_requirement')->nullable();
                }
if (!Schema::hasColumn('parts', 'note')) {
                $table->text('note')->nullable();
                }
if (!Schema::hasColumn('parts', 'quality_check_1')) {
                $table->integer('quality_check_1')->nullable()->unsigned();
                }
if (!Schema::hasColumn('parts', 'quality_check_2')) {
                $table->integer('quality_check_2')->nullable()->unsigned();
                }
if (!Schema::hasColumn('parts', 'quality_check_3')) {
                $table->integer('quality_check_3')->nullable()->unsigned();
                }
if (!Schema::hasColumn('parts', 'quality_check_4')) {
                $table->integer('quality_check_4')->nullable()->unsigned();
                }
if (!Schema::hasColumn('parts', 'quality_check_5')) {
                $table->integer('quality_check_5')->nullable()->unsigned();
                }
if (!Schema::hasColumn('parts', 'quality_check_6')) {
                $table->integer('quality_check_6')->nullable()->unsigned();
                }
if (!Schema::hasColumn('parts', 'archive')) {
                $table->tinyInteger('archive')->nullable()->default('0');
                }
if (!Schema::hasColumn('parts', 'revision')) {
                $table->integer('revision')->nullable()->unsigned();
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
        Schema::table('parts', function (Blueprint $table) {
            $table->dropColumn('procedure_code');
            $table->dropColumn('material');
            $table->dropColumn('material_name');
            $table->dropColumn('material_condition');
            $table->dropColumn('thickness_minimum');
            $table->dropColumn('thickness_maximum');
            $table->dropColumn('thickness_unit_code');
            $table->dropColumn('surface_area');
            $table->dropColumn('surface_area_unit_code');
            $table->dropColumn('weight');
            $table->dropColumn('weight_unit_code');
            $table->dropColumn('length');
            $table->dropColumn('width');
            $table->dropColumn('height');
            $table->dropColumn('dimension_unit_code');
            $table->dropColumn('material_thickness');
            $table->dropColumn('material_thickness_unit_code');
            $table->dropColumn('special_requirement');
            $table->dropColumn('note');
            $table->dropColumn('quality_check_1');
            $table->dropColumn('quality_check_2');
            $table->dropColumn('quality_check_3');
            $table->dropColumn('quality_check_4');
            $table->dropColumn('quality_check_5');
            $table->dropColumn('quality_check_6');
            $table->dropColumn('archive');
            $table->dropColumn('revision');
            
        });

    }
}
