<?php

// database/migrations/xxxx_xx_xx_xxxxxx_add_columns_to_transactions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


    class CreateTransactionsTable extends Migration
    {
        public function up()
        {
            Schema::create('transactions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('item_id')->constrained('items');
                $table->string('name');
                $table->enum('type', ['Sale', 'Purchase']);
                $table->string('size');
                $table->string('color');
                $table->integer('qty');
                $table->decimal('total_price', 8, 2);
                $table->date('date');
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
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('type');
            $table->dropColumn('size');
            $table->dropColumn('color');
            $table->dropColumn('qty');
            $table->dropColumn('total_price');
            $table->dropColumn('date');
        });
    }
}

