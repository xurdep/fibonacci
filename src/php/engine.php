<?php 

	/**
	 * ===================================================================================================================
	 * 
	 * 	- FibonacciEngine: Define el motor de cálculo, que imprime números de Fibonacci comprendidos
	 * 		entre un rango dado.
	 * 
	 * Para calcular los números y/o posiciones de los números de dicha
	 * secuencia he utilizado la fórmula matemática específicada en:
	 * https://es.wikipedia.org/wiki/Sucesi%C3%B3n_de_Fibonacci#F%C3%B3rmula_expl%C3%ADcita)
	 * 
	 * Me decanto por utilizar la fórmula matamática en vez de una función recursiva
	 * porque es mucho más eficiente y rápida. La función es mucho más lenta y costosa
	 * ya que para un rango de números necesita calcular todos los números anteriores.
	 * 
	 * 	@author: Jorge Pérez Linares (xurdep@gmail.com)
	 * 	@version 1.0
	 * 
	 * ===================================================================================================================
	 */


	/**
	 * ===========================================================================================
	 * Clase que define el Motor de la Secuencia de Números de Fibonacci.
	 * ===========================================================================================
	 */
	class FibonacciEngine {

		/**
		 * Permite obtener el número que ocupa la posicion indicada en 
		 * la secuencia de números Fibonacci 
		 */
		public function getValueByPosition($position) {
			$sq=sqrt(5);
			$a = 1/$sq;
			return (($a * pow((1+$sq)/2, $position)) - ($a * pow((1-$sq)/2, $position)));
		}

		/**
		 * Obtiene la posición en la secuencia Fibonacci cuyo valor sea igual o 
		 * más próximo al indicado
		 */
		private function getPositionByValue($value) {
			if ($value<0) throw new Exception("Value must be positive");
			if ($value==0) return 0;
			$position = 2.078087 * log($value) + 1.672276; 
			return round($position);
		}
		
		/**
		 * Obtiene la secuencia de números Fibonacci comprendida entre dos posiciones
		 * @param low posicion menor
		 * @param high posicion mayor
		 */
		public function computeByPosition($low, $high) {

			if ($low > $high || $low < 0) 
				throw new Exception("El numero mas alto ha de ser mayor que el menor y el menor ha de ser positivo"); 

			//@ Calcular e imprimir todos los números Fibonacci del rango 
			$numbers=[];
			for ($i=$low; $i<=$high; $i++) {
				$numbers[]=$this->getValueByPosition($i);
			}
			return $numbers;
		}		

		/**
		 * Obtiene la secuencia de números Fibonacci comprendida entre dos números
		 * @param low numero menor
		 * @param high numero mayor
		 */
		public function computeByValue($low, $high) {

			if ($low > $high || $low < 0) 
				throw new Exception("El numero mas alto ha de ser mayor que el menor y el menor ha de ser positivo"); 

			//@ Obtener las posiciones 
			$from = $this->getPositionByValue($low);
			$to = $this->getPositionByValue($high);
			
			//@ Ajustar los indices
			$valueFrom = $this->getValueByPosition($from);
			$valueTo = $this->getValueByPosition($to);
			if ($valueFrom < $low) $from++;
			if ($valueTo <= $high) $to++;

			//@ Calcular e imprimir todos los números Fibonacci del rango 
			$numbers=[];
			for ($i=$from; $i<$to; $i++) {
				$numbers[]=$this->getValueByPosition($i);
			}
			return $numbers;
		}	
	}


?>