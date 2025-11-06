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
        Schema::table('user_roles', function(Blueprint $table) {
            $table->timestamps();
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('status_id')
                ->nullable()
                ->constrained('statuses')
                ->onUpdate('cascade')
                ->nullOnDelete();
            $table->string('name');
            $table->string('label');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('role_permissions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('role_id')
                ->constrained('roles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignUuid('permission_id')
                ->constrained('permissions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop tables in reverse order (because of foreign keys)
        Schema::dropIfExists('role_permissions');
        Schema::dropIfExists('permissions');
        
        // Remove the timestamps from user_roles table
        Schema::table('user_roles', function(Blueprint $table) {
            $table->dropTimestamps();
        });
    }
};
