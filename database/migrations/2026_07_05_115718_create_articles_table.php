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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('author_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->text('excerpt')->nullable();

            $table->string('content_format')->nullable();
            $table->string('status')->default('draft');

            $table->longText('body')->nullable();

            $table->text('quick_answer')->nullable();
            $table->text('what_the_science_says')->nullable();
            $table->string('evidence_strength')->nullable();
            $table->text('limitations_summary')->nullable();
            $table->text('real_life_meaning')->nullable();
            $table->text('key_takeaway')->nullable();

            $table->string('featured_image_path')->nullable();
            $table->string('featured_image_alt')->nullable();

            $table->string('seo_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image_path')->nullable();
            $table->text('canonical_url')->nullable();
            $table->boolean('noindex')->default(false);

            $table->unsignedSmallInteger('reading_time')->nullable();
            $table->boolean('is_featured')->default(false);

            $table->boolean('has_medical_disclaimer')->default(true);
            $table->boolean('claims_checked')->default(false);
            $table->boolean('sources_checked')->default(false);
            $table->boolean('limitations_stated')->default(false);

            $table->timestamp('published_at')->nullable();
            $table->timestamp('last_reviewed_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('status');
            $table->index('content_format');
            $table->index('evidence_strength');
            $table->index('published_at');
            $table->index('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
