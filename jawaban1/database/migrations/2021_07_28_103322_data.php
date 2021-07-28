<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Data extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function($table){
            $table->increments('id');
            $table->string('barcode', 255);
            $table->string('product_name', 255);
            $table->float('price');
            $table->string('status', 255);
        });

        DB::table('data')->insert([
            ['barcode' => '1111', 'product_name' => 'APPLE', 'price' => 10.00, 'status' => 'READY'],
            ['barcode' => '1111', 'product_name' => 'APPLE', 'price' => 20.00, 'status' => 'DELIVERED'],
            ['barcode' => '1111', 'product_name' => 'APPLE', 'price' => 30.00, 'status' => 'SENT'],
            ['barcode' => '1111', 'product_name' => 'APPLE', 'price' => 10.00, 'status' => 'ONHOLD'],
            ['barcode' => '1111', 'product_name' => 'APPLE', 'price' => 20.00, 'status' => 'PACKING'],
            ['barcode' => '1111', 'product_name' => 'APPLE', 'price' => 40.00, 'status' => 'SENT'],
            ['barcode' => '1111', 'product_name' => 'APPLE', 'price' => 50.00, 'status' => 'SENT'],
            ['barcode' => '1122', 'product_name' => 'PINEAPPLE', 'price' => 10.00, 'status' => 'READY'],
            ['barcode' => '1122', 'product_name' => 'PINEAPPLE', 'price' => 10.00, 'status' => 'DELIVERED'],
            ['barcode' => '1122', 'product_name' => 'PINEAPPLE', 'price' => 10.00, 'status' => 'PACKING'],
            ['barcode' => '1122', 'product_name' => 'PINEAPPLE', 'price' => 10.00, 'status' => 'DELIVERED'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
