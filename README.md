# fibonacci
Una solución que permite calcular la secuencia de números Fibonacci existentes en un rango de números.

Secuencia de números Fibonacci: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610...

Algoritmo simple en PHP para calcular y devolver los números de la serie:
<pre>
function fibonacci($limit) {
  if ($limit&lt;1) return "";
  $ret = array(0,1);
  if ($limit&lt;3) return implode(", ", array_slice($ret, 0, $limit));
  for($i=2;$i&lt;$limit;$i++){
    $ret[] = $ret[$i-1]+$ret[$i-2];
  }
  return implode(", ", $ret);
}
</pre>
Realizar un algoritmo que calcule esta secuencia de números no es en sí de dificultad extrema, 
el problema viene cuando necesitamos saber un rango de la secuencia, por ejemplo, calcular la 
secuencia de números Fibonacci existentes entre 2 números dados. 

Ésto podríamos hacerlo modificando el algoritmo anterior, pero el código quedaría mucho menos limpio 
al tener que controlar los valores de cada posición calculada y ver si están entre los números dados.

Se podría usar también una función recursiva, pero créeme, no es ni mucho menos la mejor solución a la hora de 
calcular números grandes. El esfuerzo computacional es ENORME, ya que para cada número, 
es necesario calcular todos los números anteriores.

Echando un vistazo en <a href="https://es.wikipedia.org/wiki/Sucesi%C3%B3n_de_Fibonacci" target="blank">Wikipedia</a> 
empiezo a darle vueltas a la cabeza y decido implementar una solución siguiendo los 
principios de desarollo SOLID y utilizando la fórmula matemática para realizar todos los cálculos, 
consiguiendo así una mayor limpieza y eficiencia en el código.

Esta utilidad permite obtener un rango de números de la secuencia de Fibonacci sin 
tener que calcular todos los anteriores, por ejemplo, calcular los números de la serie de Fibonacci 
existentes entre el número 30 y 125 (éstos no pertenecen a la serie Fibonacci).

El resultado es: 34, 55 y 89

Ver en funcionamiento la solución Javascript: https://www.xorware.es/github/fibonacci/
