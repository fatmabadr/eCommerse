
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('name_english');
            $table->string('name_arabic');
            $table->string('slag_english');
            $table->string('slag_arabic');
            $table->string('code');
            $table->string('quantity');
            $table->string('tags_english');
            $table->string('tags_arabic');
            $table->string('size_english')->nullable();
            $table->string('color_english');
            $table->string('size_arabic')->nullable();
            $table->string('color_arabic');
            $table->integer('selling_price');
            $table->integer('discount_price')->nullable();
            $table->string('short_description_english');
            $table->string('short_description_arabic');
            $table->text('long_description_english');
            $table->text('long_description_arabic');
            $table->integer('hotDeals')->default(0);
            $table->integer('featured')->default(0);
            $table->integer('specialoffer')->default(0);
            $table->integer('specialdeals')->default(0);
            $table->integer('status')->default(0);
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
};
