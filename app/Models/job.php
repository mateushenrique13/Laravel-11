<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model {
    use HasFactory;
    protected $table = 'job_listings';

    // seeu usar protected $guarded = []; ele vai permitir que todos os campos sejam preenchidos
    // se eu usar protected $fillable = ['title', 'salary']; ele vai permitir que apenas os campos title e salary sejam preenchidos
    protected $fillable = ['employer_id','title', 'salary'];

    public function employer() {
        return $this->belongsTo(Employer::class);
    }
    public function tags() {
        //foreignPivotKey diz para o laravel qual é a coluna q ele vai procurar o id do job
        //só pq o padrão é ele procurar na culuna job_id mas ela não existe no meu bd
        return $this->belongsToMany(Tag::class, foreignPivotKey:"job_listing_id");
    }
}
