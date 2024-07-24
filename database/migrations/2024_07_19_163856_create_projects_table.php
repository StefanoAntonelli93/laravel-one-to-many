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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            /*
-nome progetto
-descrizione
-data inizio
-data fine
-stato
-budget
-manager progetto
-cliente
-priorità
-creato il 
-aggironato il
 */
            $table->string('name', 50)->unique();
            $table->string('slug', 70)->nullable();
            $table->text('description')->nullable();
            $table->date('project_start_date')->nullable();
            $table->date('project_end_date')->nullable();
            $table->string('status', 30)->nullable();
            $table->decimal('budget', 15, 2)->nullable();
            $table->string('project_manager', 50)->nullable();
            $table->string('customer', 50)->nullable();
            $table->timestamp('creation_date')->nullable();
            $table->timestamp('update_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
