<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriesAliasAndDescriptionFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function ($table) {
            $table->string('alias')->unique();
            $table->mediumText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('categories', 'alias')) {
            Schema::table('categories', function ($table) {
                $table->dropColumn('alias');
            });
        }
        if (Schema::hasColumn('categories', 'description')) {
            Schema::table('categories', function ($table) {
               $table->dropColumn('description');
            });
        }
    }
}
