<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductStockExpritDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW product_exprit_date AS (
            SELECT*FROM product_stock_exprit_date WHERE CAST (reorder_point AS INT) >= CAST (inventorys AS INT)
        )"
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS product_exprit_date');
    }
}
