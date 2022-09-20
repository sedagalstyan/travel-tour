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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('title_en');
            $table->string('title_hy');
            $table->text('descr_en');
            $table->text('descr_hy');
            $table->text('days_en');
            $table->text('days_hy');
            $table->string('price');
            $table->string('discount')->default(0);
            $table->string('duration_en');
            $table->string('duration_hy');
            $table->string('min_age');
            $table->integer('max_people');
            $table->string('availability');
            $table->integer('available_seats');
            $table->string('from_en');
            $table->string('to_en');
            $table->string('from_hy');
            $table->string('to_hy');
            $table->string('rating')->default(0);
            $table->foreignId('destination_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints('destination_id');
        Schema::dropIfExists('tours');
    }
};
