<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // settare la nuova colonna mettendo 'unsignedBigInteger'
            $table->unsignedBigInteger('category_id')->nullable()->after('id');
            // impostare poi la chiave esterna e a cosa fa riferimento
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // inverso quello fatto sopra
        Schema::table('posts', function (Blueprint $table) {

            // cancellare il vincolo con referenza alla tabella "posts"
            $table->dropForeign('posts_category_id_foreign');
            // cancellare la colonna
            $table->dropColumn('category_id');
        });
    }
}
