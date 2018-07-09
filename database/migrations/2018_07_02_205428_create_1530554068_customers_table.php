<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1530554068CustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('customers')) {
            Schema::create('customers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('code')->nullable();
                $table->string('name')->nullable();
                $table->string('physical_address')->nullable();
                $table->string('address_extension')->nullable();
                $table->string('city')->nullable();
                $table->string('state')->nullable();
                $table->string('zip')->nullable();
                $table->string('company_phone')->nullable();
                $table->string('fax')->nullable();
                $table->string('email')->nullable();
                $table->string('contact1')->nullable();
                $table->string('extension1')->nullable();
                $table->string('contact2')->nullable();
                $table->string('phone2')->nullable();
                $table->string('extension2')->nullable();
                $table->text('note')->nullable();
                $table->string('billing_address')->nullable();
                $table->string('billing_city')->nullable();
                $table->string('billing_state')->nullable();
                $table->string('billing_zip')->nullable();
                $table->string('billing_phone')->nullable();
                $table->string('billing_fax')->nullable();
                $table->string('billing_email')->nullable();
                $table->string('ship_to_address')->nullable();
                $table->string('ship_to_city')->nullable();
                $table->string('ship_to_state')->nullable();
                $table->string('ship_to_zip')->nullable();
                $table->string('ship_to_phone')->nullable();
                $table->string('ship_to_fax')->nullable();
                $table->string('ship_to_email')->nullable();
                $table->string('tax_id')->nullable();
                $table->tinyInteger('cod')->nullable()->default('0');
                $table->tinyInteger('archive')->nullable()->default('0');
                $table->integer('revision')->nullable();
                $table->string('ship_to_address_code')->nullable();
                $table->string('destination_code')->nullable();
                $table->string('carrier_code')->nullable();
                
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
        Schema::dropIfExists('customers');
    }
}
