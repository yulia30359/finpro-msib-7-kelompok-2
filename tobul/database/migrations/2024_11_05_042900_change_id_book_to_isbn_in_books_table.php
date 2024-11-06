<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeIdBookToIsbnInBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropPrimary('books_idbook_primary');
            $table->string('idBook', 255)->change();
            $table->primary('idBook');
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropPrimary('books_idbook_primary');
            $table->bigInteger('idBook')->unsigned()->change();
            $table->primary('idBook');
        });
    }
}