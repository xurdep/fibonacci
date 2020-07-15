<?php
	require_once("engine.php");
	$engine = new FibonacciEngine();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui, viewport-fit=cover">
	<meta name="description" content="Utilidades Fibonacci"/>
	<title>Fibonacci</title>
	<!-- //@ Estilos -->
	<link rel="stylesheet" href="../css/app.css" />
</head>
<body>

	<!-- //@ Contendor principal -->
	<div class="container">

		<!-- //@ Formulario -->
		<div class="panel">
			<h2>Datos de entrada</h2>
			<p class="help">
				Secuencia Números Fibonacci (50 primeros números): <br/> 
				<span id="fibonacciList">
					<?= implode(", ", $engine->computeByPosition(0, 50)); ?>
				</span>
			</p>
			<h3>Introduzca el rango de números a calcular:</h3>
			<p class="help">
				Calcula los n&uacute;meros de la secuencia de Fibonacci existentes entre los dos números proporcionados 
			</p>
			<p>
				<form method="GET" action="<?= htmlentities($_SERVER['PHP_SELF']); ?>">
					<div><span>Número 1</span> <input id="num1" name="num1" type="text" class="box" /></div>
					<br/>
					<div><span>Número 2</span> <input id="num2" name="num2" type="text" class="box" /></div>
					<p class="center">
						<input id="btCompute" type="submit" value="Calcular" class="button" />
					</p>					
				</form>				
			</p>

			<h2>Resultados</h2>
			<div id="resultList" class="box scrollable">
				<?php
					try {
						if (!empty($_GET['num1']) && !empty($_GET['num2']))
							echo implode(", ", $engine->computeByValue($_GET['num1'], $_GET['num2'])); 
						else 
							echo "";
						} 
					catch (\Throwable $th) {
						echo "ERROR: ".$th->getMessage();
					}
				?>
			</div>			
		</div>
	</div>

</body>
</html>