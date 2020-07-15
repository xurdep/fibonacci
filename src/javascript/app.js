
var app = {

	engine: new FibonacciEngine(),

	build: function() {
		//@ Configurar el evento del Botón "Calcular"
		document.getElementById("btCompute").addEventListener('click', ()=>{ this.compute(); }, false);	
	},

	compute: function() {
		try {
			//@ Obtener los valores de las cajas de texto
			let num1 = parseInt(document.getElementById("num1").value);
			let num2 = parseInt(document.getElementById("num2").value);
			
			this.print("resultList", this.engine.computeByValue(num1, num2), ", ");
		}
		catch(err) {
			alert(err);
		}
	},

	print: function (whereEL, numbers, separator) {
		let node = document.getElementById(whereEL);
		if (node)  {
			node.innerHTML = Array.isArray(numbers) ? numbers.join(separator) : "Error";
		}
	},

	demo: function() {
		this.print("fibonacciList", this.engine.computeByPosition(0, 50), ", ");
	}
};

//@ Construir la APP
app.build();

app.demo();