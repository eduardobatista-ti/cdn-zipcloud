<?php

function minificarJS($arquivoEntrada, $arquivoSaida) {
    // Lê o conteúdo do arquivo de entrada
    $js = file_get_contents($arquivoEntrada);
    
    // Preservar strings e regex usando uma função callback
    $js = preg_replace_callback(
        '/(?:"[^"\\\\]*(?:\\\\.[^"\\\\]*)*"|\'[^\'\\\\]*(?:\\\\.[^\'\\\\]*)*\'|\/[^\/\\\\]*(?:\\\\.[^\/\\\\]*)*\/[gimsuy]*)/',
        function($matches) {
            // Substituir espaços internos e novas linhas dentro de strings e regex por placeholders
            return preg_replace('/\s+/', ' ', $matches[0]);
        },
        $js
    );

    // Remove comentários de várias linhas (/* ... */)
    $js = preg_replace('!/\*.*?\*/!s', '', $js);
    
    // Remove comentários de uma linha (// ...) que não estão dentro de strings ou regex
    $js = preg_replace('/(^|[^\\\])\/\/.*$/m', '$1', $js);
    
    // Remove espaços em branco extras e quebras de linha
    $js = preg_replace('/\s+/', ' ', $js);
    
    // Remove espaços em branco ao redor de operadores e pontuações
    $js = preg_replace('/\s*([{};,:])\s*/', '$1', $js);
    
    // Remove espaços em branco ao redor de operadores aritméticos e lógicos
    $js = preg_replace('/\s*([\+\-\*\/=&|<>!])\s*/', '$1', $js);
    
    // Remove espaços em branco ao redor de parênteses e colchetes
    $js = preg_replace('/\s*([\(\)\[\]])\s*/', '$1', $js);
    
    // Escreve o conteúdo minificado no arquivo de saída
    file_put_contents($arquivoSaida, $js);
}

// Caminho para o arquivo JavaScript de entrada e saída
$arquivoEntrada = '/home/zipcloudbr/web/cdn.zipcloud.com.br/public_html/ziper/libs/elementor/form-v1/form.js'; // Caminho completo para o arquivo JS
$arquivoSaida = '/home/zipcloudbr/web/cdn.zipcloud.com.br/public_html/ziper/libs/elementor/form-v1/form.min.js'; // Caminho completo onde deseja salvar o arquivo minificado
// Minifica o arquivo JavaScript
minificarJS($arquivoEntrada, $arquivoSaida);

$arquivoEntrada = '/home/zipcloudbr/web/cdn.zipcloud.com.br/public_html/ziper/libs/woocommerce/cart/cart.js'; // Caminho completo para o arquivo JS
$arquivoSaida = '/home/zipcloudbr/web/cdn.zipcloud.com.br/public_html/ziper/libs/woocommerce/cart/cart.min.js'; // Caminho completo onde deseja salvar o arquivo minificado
// Minifica o arquivo JavaScript
minificarJS($arquivoEntrada, $arquivoSaida);

echo 'Arquivo minificado com sucesso!';
?>
