<?php

// Função para minificar um arquivo JavaScript
function minificarJS($arquivoEntrada, $arquivoSaida) {
    // Lê o conteúdo do arquivo de entrada
    $js = file_get_contents($arquivoEntrada);
    
    // Remove comentários de várias linhas (/* ... */)
    $js = preg_replace('!/\*.*?\*/!s', '', $js);
    
    // Remove comentários de uma linha (// ...)
    $js = preg_replace('/\n\s*\/\/.*\n/', "\n", $js);
    
    // Remove espaços em branco, tabulações, quebras de linha, etc.
    $js = preg_replace('/\s+/', ' ', $js);
    $js = preg_replace('/\s*([{};,:])\s*/', '$1', $js);
    
    // Escreve o conteúdo minificado no arquivo de saída
    file_put_contents($arquivoSaida, $js);
}

// Caminho para o arquivo JavaScript de entrada e saída
$arquivoEntrada = '/home/zipcloudbr/web/cdn.zipcloud.com.br/public_html/ziper/libs/elementor/form-v1/form.js'; // Caminho completo para o arquivo JS
$arquivoSaida = '/home/zipcloudbr/web/cdn.zipcloud.com.br/public_html/ziper/libs/elementor/form-v1/form.min.js'; // Caminho completo onde deseja salvar o arquivo minificado

// Minifica o arquivo JavaScript
minificarJS($arquivoEntrada, $arquivoSaida);

echo 'Arquivo minificado com sucesso!';
?>
