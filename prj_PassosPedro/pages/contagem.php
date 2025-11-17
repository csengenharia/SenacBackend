<?php
$inicio = filter_input(INPUT_GET, "inicio", FILTER_VALIDATE_INT);
$passos = filter_input(INPUT_GET, "passos", FILTER_VALIDATE_INT);
$fim = filter_input(INPUT_GET, "fim", FILTER_VALIDATE_INT);
$resultado = "";

if ($inicio == false || $passos == false || $fim == false) {
  echo "Valores inválidos!!!";
} else {
  if ($inicio < $fim && $passos < $fim) {
    for ($cont = $inicio; $cont < $fim; $cont = $cont + $passos) {
      $resultado = $resultado . "<li> $cont </li>";
    }
  } else {
    echo "digite valores prováveis";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Passos</title>
</head>

<body>

  <ul>
    <?php echo $resultado;  ?>
  </ul>
  <p>
    <?php echo  " passos: " . $passos . " - inicio: " . $inicio . " - fim: " . $fim; ?>
  </p>
  <a href="../index.html">Voltar</a>
</body>

</html>