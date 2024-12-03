<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_items_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Item name
            $table->string('category');
            $table->string('size');  // Size (e.g., S, M, L)
            $table->string('color');  // Color of the item
            $table->decimal('price', 8, 2);  // Price of the item
            $table->integer('stock');  // Stock quantity
            $table->timestamps();  // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}

