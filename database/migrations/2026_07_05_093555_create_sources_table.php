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
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('authors')->nullable();
            $table->string('journal')->nullable();
            $table->unsignedSmallInteger('year')->nullable();
            $table->string('doi')->nullable();
            $table->string('pmid')->nullable();
            $table->text('url')->nullable();
            $table->string('source_type')->nullable();
            $table->string('evidence_level')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();

            $table->index('year');
            $table->index('source_type');
            $table->index('evidence_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sources');
    }
};
