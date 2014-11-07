<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
      $table->integer('found_at')->nullable();
      $table->integer('listed_at')->nullable();
      $table->string('title')->nullable();
      $table->string('store_url')->nullable();
      $table->decimal('store_price', 10, 2)->nullable();
      $table->longtext('description')->nullable();
      $table->integer('expected_ship_days')->nullable();
      $table->string('amazon_url')->nullable();
      $table->string('amazon_category')->nullable();
      $table->string('asin')->nullable();
      $table->integer('amazon_rank')->nullable();
      $table->decimal('shipping_cost', 10, 2)->nullable();
      $table->decimal('amazon_price', 10, 2)->nullable();
      
			$table->integer('created_at');
			$table->integer('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
