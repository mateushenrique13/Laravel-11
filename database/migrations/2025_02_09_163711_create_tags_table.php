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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        }); //obs: posse sim criar varias tbls dentro de uma migration não a regra rigida de uma tbl por migration
        Schema::create('job_tag', function (Blueprint $table) {
            $table->id();
            //constrained() cria uma restição de chave estrangeira
            $table->foreignIdFor(\App\Models\Job::class, 'job_listing_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Tag::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
            //outra coisa c for deletar algum registro pela app do bd use no prompt PRAGMA foreign_keys=on assim os dados serão deletados em cascata igual no script acima

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('job_tag');
    }
};
