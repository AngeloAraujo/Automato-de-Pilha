<!DOCTYPE html>
<html lang="en">

<head>
    <title>Autômato de TopoPilha</title>
</head>

<body>
    <form action="" method="get">
        <input type="text" name="Cadeia">
        <input type="submit" value="Enviar  ">
    </form>

    <?php
    //Uma forma de definir a linguagem de um AP é pela situação de TopoPilha vazia.
    if (isset($_GET['Cadeia'])) {
        $Cadeia = $_GET['Cadeia'];
        $EstadoInicialInicial = 'q0';
        $TopoPilha = 'X';
        $Transicoes = [
            'aX' => ['EstadoInicial' => 'q0', 'TopoPilha' => 'AAX'],
            'aA' => ['EstadoInicial' => 'q0', 'TopoPilha' => 'AAA'],
            'bA' => ['EstadoInicial' => 'q1', 'TopoPilha' => ''],
            'bX' => ['EstadoInicial' => 'q0', 'TopoPilha' => 'X']
        ];

        do {
            $EstadoInicialInicial = $Transicoes[$Cadeia[0] . $TopoPilha[0]]['EstadoInicial'];
            $TopoPilha = $Transicoes[$Cadeia[0] . $TopoPilha[0]]['TopoPilha'] . substr($TopoPilha, 1);
            $Cadeia = substr($Cadeia, 1);
        } while (strlen($Cadeia) > 0 && $TopoPilha != 'X');

        //Elimina o topo da lista. Se houver apenas o simbolo inicial (K) ela ficará vazia e a palavra é aceita
        $TopoPilha = substr($TopoPilha, 1);

        if (empty($TopoPilha) && empty($Cadeia)) echo 'Palavra aceita ';
        else echo 'Palavra não aceita - EstadoInicial: ' . $EstadoInicialInicial . ' - TopoPilha: ' . $TopoPilha;
    }
    ?>
</body>

</html>