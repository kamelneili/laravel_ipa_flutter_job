<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string( 'title' );
            $table->text( 'content' );
            $table->string( 'featured_image' )->default('https://picsum.photos/200/200');
            $table->integer( 'category_id' );
           // $table->integer( 'user_id' );
            $table->string( 'price' );
            $table->string( 'oldPrice' );

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
        Schema::dropIfExists('products');
    }
}
