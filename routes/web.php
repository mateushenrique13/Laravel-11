<?php
use Illuminate\Support\Facades\Route;
use App\Models\job;





Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function (){
    $jobs = job::with('employer')->latest()->simplePaginate(3);
    // paginate é um método que divide os resultados em páginas
    // simplePaginate é um método que divide os resultados em páginas, mas não exibe os links de navegação
    // cursoPaginate é um método que divide os resultados em páginas, mas exibe os links de navegação em estilo de curso
    return view('jobs.index',[
        'jobs' => $jobs

        ]);
});

Route::get('/jobs/create', function(){
    return view('jobs.create');
});


//rota coringa pois tudo que tenha /jobs/ e depois qualquer coisa  será redirecionado para a rota abaixo por isso os coringas ficam sempre no final do codigo
Route::get('/jobs/{id}',function($id){

    $job = job::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function(){
    //validação...
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});

Route::get('/contact',function(){
    return view('contact');
});
