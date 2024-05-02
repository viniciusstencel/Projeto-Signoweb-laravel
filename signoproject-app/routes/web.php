<?php
use App\Models\Voto;
use App\Http\Controllers\HomeController;
use App\Models\Enquete;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/criar-enquete', function () {
    return view('criar_enquete');
});

Route::post('/enviar-enquete', function (Request $info) {
    Enquete::create([
        'title' => $info->title,
        'vote1' => $info->vote1,
        'vote2' => $info->vote2,
        'vote3' => $info->vote3,
        'qtd_vote1'=> 0,
        'qtd_vote2'=> 0,
        'qtd_vote3'=> 0,
        'date'=> $info->date,
        'hour_start' => $info->hour_start,
        'hour_end' => $info->hour_end 
    ]);
    echo '<script>alert("Sucesso ao criar enquete");
    window.location.href="/";</script>';
});

Route::get('/mostrar-enquete/{id_enquete}', function ($id_enquete) {
 $enquete = Enquete::find($id_enquete);
 return view('enquete', ['enquete'=> $enquete]);
});

Route::get('/excluir/{id_enquete}', function ($id_enquete) {
    $enquete = Enquete::find($id_enquete);
    $enquete->delete();
    echo '<script>alert("Sucesso ao excluir enquete");
    window.location.href="/";</script>';
   });

   Route::post('/vote', function (Request $info) {
    
    if ($info->voto == 'vote1') {
        Enquete::where('id', $info->id_enquete)->increment('qtd_vote1');
    } elseif ($info->voto == 'vote2') {
        Enquete::where('id', $info->id_enquete)->increment('qtd_vote2');
    } elseif ($info->voto == 'vote3') {
        Enquete::where('id', $info->id_enquete)->increment('qtd_vote3');
    }

     
     echo '<script>alert("Sucesso ao votar na enquete");
         window.location.href="/";</script>';
});
Route::get('/editar-enquete/{id_enquete}', function ($enqueteInfo) {
    $enquete = Enquete::find($enqueteInfo);
    return view('enqueteEditar', ['enquete'=> $enquete]);
});
Route::post('/atualizar-enquete/{id}', function (Request $info, $id) {
    $enquete = Enquete::find($id);
    
    $enquete->update([
        'title' => $info->title,
        'vote1' => $info->vote1,
        'vote2' => $info->vote2,
        'vote3' => $info->vote3,
        'date'=> $info->date,
        'hour_start' => $info->hour_start,
        'hour_end' => $info->hour_end 
    ]);

    echo '<script>alert("Sucesso ao atualizar enquete");
    window.location.href="/";</script>';
});
   