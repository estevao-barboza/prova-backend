<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
Route::get('/instituicoes',function(){
    $caminho = storage_path('app/data/instituicoes.json');
    $json = file_get_contents($caminho);

    $dados = json_decode($json,true);

    $resultado = [];
    foreach ($dados as $item) {
        $resultado[$item['chave']] = $item['valor'];
    }

   
    return response()->json($resultado);
});
Route::get('/convenios',function(){
    $caminho = storage_path('app/data/convenios.json');
    $json = file_get_contents($caminho);

    $dados = json_decode($json,true);

    $resultado = [];
    foreach ($dados as $item) {
        $resultado[$item['chave']] = $item['valor'];
    }

   
    return response()->json($resultado);
});




Route::post('/simulacoes', function (Request $request) {

   
    if (!$request->has('valor_emprestimo')) {
        return response()->json(['erro' => 'valor_emprestimo é obrigatório'], 400);
    }

    $valor = $request->valor_emprestimo;

    $caminho = storage_path('app/data/taxas_instituicoes.json');
    $conteudo = file_get_contents($caminho);
    $taxas = json_decode($conteudo, true);

    
    $resultados = [];

    
    foreach ($taxas as $item) {

       
        if ($request->has('instituicoes') && !in_array($item['instituicao'], $request->instituicoes)) {
            continue;
        }

       
        if ($request->has('convenios') && !in_array($item['convenio'], $request->convenios)) {
            continue;
        }

      
        if ($request->has('parcela') && $item['parcelas'] != $request->parcela) {
            continue;
        }

      
        $valorParcela = round($valor * $item['coeficiente'], 2);

        
        $resultados[] = [
            'instituicao' => $item['instituicao'],
            'convenio' => $item['convenio'],
            'parcelas' => $item['parcelas'],
            'valor_parcela' => $valorParcela,
            'taxaJuros' => $item['taxaJuros']
        ];
    }

   
    return response()->json($resultados);
});