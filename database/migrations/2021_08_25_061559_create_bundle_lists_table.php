<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBundleListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundle_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("bundle_id");
            $table->foreign("bundle_id")->references('id')->on('bundle_products');
            $table->unsignedBigInteger("product_id");
            $table->foreign("product_id")->references('id')->on('products');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bundle_lists');
    }
}
