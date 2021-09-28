<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddFiledsToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->string('image', 500);
            $table->timestamp('publish_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->unsignedBigInteger('category_id');
            // $table->unsignedBigInteger('user_id');

            $table->foreignId('category_id');
            $table->foreignId('user_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->dropColumn('image');
            $table->dropColumn('publish_date');
            $table->dropColumn('category_id');
            $table->dropColumn('user_id');
        });
    }
}
