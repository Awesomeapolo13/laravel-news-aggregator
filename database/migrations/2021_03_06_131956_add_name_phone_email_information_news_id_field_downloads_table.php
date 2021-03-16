<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamePhoneEmailInformationFieldNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('downloads', function (Blueprint $table) {
            $table->string('name', 100);
            $table->string('phone', 100);
            $table->string('email', 100);
            $table->string('info', 100);
            $table->unsignedBigInteger('news_id');

            $table->foreign('news_id')
            ->on('news')
            ->references('id')
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('downloads', function (Blueprint $table) {
            $table->dropForeign(['news_id']);
            $table->dropColumn(['name', 'phone', 'email', 'info', 'news_id']);
        });
    }
}
