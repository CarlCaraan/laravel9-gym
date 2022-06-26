<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_inventories', function (Blueprint $table) {
            $table->id();
            $table->integer('equipment_id')->comment('equipment_categories=id')->nullable();
            $table->integer('facility_id')->comment('facility_categories=id')->nullable();
            $table->string('name')->nullable();
            $table->string('quantity')->nullable();
            $table->string('dop')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_inventories');
    }
};
