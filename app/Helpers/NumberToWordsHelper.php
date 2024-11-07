<?php
function gerarOrdinal($numero) {
    if ($numero < 1 || $numero > 1000) {
        return 'Número fora do intervalo';
    }

    $unidades = [
        1 => 'primeiro', 2 => 'segundo', 3 => 'terceiro', 4 => 'quarto', 5 => 'quinto',
        6 => 'sexto', 7 => 'sétimo', 8 => 'oitavo', 9 => 'nono', 10 => 'décimo'
    ];

    $especial = [
        11 => 'décimo primeiro', 12 => 'décimo segundo', 13 => 'décimo terceiro', 14 => 'décimo quarto', 15 => 'décimo quinto',
        16 => 'décimo sexto', 17 => 'décimo sétimo', 18 => 'décimo oitavo', 19 => 'décimo nono'
    ];

    if ($numero <= 10) {
        return $unidades[$numero];
    } elseif ($numero <= 19) {
        return $especial[$numero];
    } elseif ($numero < 100) {
        $dezena = intdiv($numero, 10);
        $unidade = $numero % 10;
        $nomeDezena = $dezena === 2 ? 'vigésimo' : ($dezena === 3 ? 'trigésimo' : ($dezena === 4 ? 'quadragésimo' : 'quadragésimo'));
        return $nomeDezena . ($unidade > 0 ? ' ' . $unidades[$unidade] : '');
    } elseif ($numero < 1000) {
        $centena = intdiv($numero, 100);
        $restante = $numero % 100;
        $nomeCentena = $centena === 1 ? 'centésimo' : ($centena . ' centésimo');
        return $nomeCentena . ($restante > 0 ? ' ' . gerarOrdinal($restante) : '');
    } else {
        // Para 1000
        return 'milésimo';
    }
}

?>