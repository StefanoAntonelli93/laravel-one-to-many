<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // creo campo
            $table->unsignedBigInteger('type_id')->nullable()->after('id');
            // creo foreign key
            $table->foreign('type_id')->references('id')->on('types')
                // se elimino un campo in type associato a un project il campo diventa NULL
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // interrompo la relazione tra tabelle type e project
            $table->dropForeign('projects_type_id_foreign');
            //   cancello colonna foreign key
            $table->dropColumn('type_id');
        });
    }
};
