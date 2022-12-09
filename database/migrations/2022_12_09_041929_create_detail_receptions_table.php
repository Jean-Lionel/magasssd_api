<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailReceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('detail_receptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lot_id')->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('product_id')->constrained();
            $table->double('quantity');
            $table->double('prix_unitaire');
            $table->foreignId('reception_id')->constrained();
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
        Schema::dropIfExists('detail_receptions');
    }
}
