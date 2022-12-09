<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('lots', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('product_id')->constrained();
            $table->double('quantity')->default('0');
            $table->double('price_unitaire')->default('0');
            $table->double('price_vente')->default('0');
            $table->timestamp('date_created')->nullable();
            $table->longText('description');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lots');
    }
}
