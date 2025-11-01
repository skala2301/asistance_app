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
        Schema::create('types', function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->string('label');
            $table->text('description')
                ->nullable();
            $table->timestamps();
        });

        Schema::create('statuses', function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('label');
            $table->foreignUuid('type_id')
                ->nullable()
                ->constrained('types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignUuid('status_id')
                ->nullable()
                ->constrained('statuses')
                ->onUpdate('cascade')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('status_id');
        });
        
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('types');
    }
};
