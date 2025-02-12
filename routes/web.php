<?php
use Illuminate\Support\Facades\Route;
use App\Models\job;





Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function (){
    $jobs = job::with('employer')->simplePaginate(3);
    // paginate é um método que divide os resultados em páginas
    // simplePaginate é um método que divide os resultados em páginas, mas não exibe os links de navegação
    // cursoPaginate é um método que divide os resultados em páginas, mas exibe os links de navegação em estilo de curso
    return view('jobs',[
        'jobs' => $jobs

        ]);
});

Route::get('/jobs/{id}',function($id){

    $job = job::find($id);

    return view('job', ['job' => $job]);
});

Route::get('/contact',function(){
    return view('contact');
});
