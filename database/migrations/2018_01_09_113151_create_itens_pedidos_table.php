<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensPedidosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('itenspedido', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('pedido_id')->unsigned();
			$table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
			$table->string('descricao');
			$table->integer('quantidade');
			$table->float('preco',8,2);
			$table->string('cor')->nullable();
			$table->float('peso',8,3)->nullable();
			$table->string('link');
			$table->text('obs_cliente')->nullable();
			$table->text('obs_admin')->nullable();
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
		Schema::drop('itenspedido');
	}

}
