{{-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método Trapezoidal</title>
    <script>
        function f(x) {
            // Define la función a integrar aquí (ejemplo: f(x) = x^2)
            return x * x;
        }

        function trapezoidalRule(a, b, n) {
            // Calcular el ancho de cada subintervalo
            let h = (b - a) / n;
            let integral = 0.5 * (f(a) + f(b)); // Inicializar con los extremos

            // Calcular la suma de los puntos intermedios
            for (let i = 1; i < n; i++) {
                integral += f(a + i * h);
            }

            integral *= h; // Multiplicar por el ancho del subintervalo
            return integral;
        }

        function calcularIntegral() {
            const a = parseFloat(document.getElementById('limite_inferior').value);
            const b = parseFloat(document.getElementById('limite_superior').value);
            const n = parseInt(document.getElementById('subintervalos').value);

            if (isNaN(a) || isNaN(b) || isNaN(n) || n <= 0) {
                alert("Por favor, ingresa valores válidos.");
                return;
            }

            const resultado = trapezoidalRule(a, b, n);
            document.getElementById('resultado').innerText = `La integral definida es: ${resultado}`;
        }
    </script>
</head>
<body>
    <div style="text-align: center; margin-top: 50px;">
        <h1>Cálculo de Integrales por el Método Trapezoidal</h1>
        <label for="limite_inferior">Límite Inferior (a):</label>
        <input type="number" id="limite_inferior" required>
        <br><br>
        <label for="limite_superior">Límite Superior (b):</label>
        <input type="number" id="limite_superior" required>
        <br><br>
        <label for="subintervalos">Número de Subintervalos (n):</label>
        <input type="number" id="subintervalos" required min="1">
        <br><br>
        <button onclick="calcularIntegral()">Calcular Integral</button>
        <h2 id="resultado"></h2>
    </div>
</body>
</html> --}}

{{-- //esta buena esta --}}

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trapezoidal Method</title>
    <script>
        function f(x) {
            // Aquí defines la función que deseas integrar.
            return Math.pow(x, 2); // Ejemplo: f(x) = x^2
        }

        function trapezoidalMethod(a, b, n) {
            const delta = (b - a) / n;
            let sum = 0;

            for (let i = 1; i < n; i++) {
                const xi = a + i * delta;
                sum += 2 * f(xi);
            }

            const result = (delta / 2) * (f(a) + sum + f(b));
            return result;
        }

        function calculateIntegral() {
            const a = parseFloat(document.getElementById('a').value);
            const b = parseFloat(document.getElementById('b').value);
            const n = parseInt(document.getElementById('n').value);

            const result = trapezoidalMethod(a, b, n);
            document.getElementById('result').textContent = `Resultado de la integral: ${result}`;
        }
    </script>
</head>
<body>

<h1>Cálculo de la Integral Definida por el Método Trapezoidal</h1>

<div>
    <label for="a">Límite inferior (a):</label>
    <input type="number" id="a" step="any">
</div>
<div>
    <label for="b">Límite superior (b):</label>
    <input type="number" id="b" step="any">
</div>
<div>
    <label for="n">Número de subdivisiones (n):</label>
    <input type="number" id="n">
</div>
<button onclick="calculateIntegral()">Calcular Integral</button>

<p id="result"></p>

</body>
</html> --}}


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método Trapezoidal - Cálculo de Integrales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label, input, select {
            margin: 10px 0;
            display: block;
        }
    </style>
</head>
<body>
    <h1>Método Trapezoidal para Cálculo de Integrales</h1>

    <form id="trapezoidalForm">
        <label for="funcion">Elige la función \(f(x)\):</label>
        <select id="funcion" name="funcion">
            <option value="x**2">x^2</option>
            <option value="Math.sin(x)">sin(x)</option>
            <option value="Math.cos(x)">cos(x)</option>
            <option value="Math.log(x)">log(x)</option>
            <option value="custom">Personalizada (usa "x" como variable)</option>
        </select>

        <label for="customFunction">Función personalizada (solo si eliges personalizada):</label>
        <input type="text" id="customFunction" placeholder="Ejemplo: Math.sqrt(x)" disabled />

        <label for="a">Límite inferior (a):</label>
        <input type="number" id="a" value="0">

        <label for="b">Límite superior (b):</label>
        <input type="number" id="b" value="1">

        <label for="n">Número de subdivisiones (n):</label>
        <input type="number" id="n" value="10" min="1">

        <button type="submit">Calcular Integral</button>
    </form>

    <h2>Resultado: <span id="resultado"></span></h2>

    <script>
        document.getElementById('funcion').addEventListener('change', function () {
            const customFunctionInput = document.getElementById('customFunction');
            if (this.value === 'custom') {
                customFunctionInput.disabled = false;
            } else {
                customFunctionInput.disabled = true;
            }
        });

        document.getElementById('trapezoidalForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Obtener valores del formulario
            const a = parseFloat(document.getElementById('a').value);
            const b = parseFloat(document.getElementById('b').value);
            const n = parseInt(document.getElementById('n').value);
            let funcion = document.getElementById('funcion').value;
            const customFunction = document.getElementById('customFunction').value;

            // Si el usuario elige función personalizada
            if (funcion === 'custom') {
                funcion = customFunction;
            }

            // Calcular la integral usando el método trapezoidal
            const resultado = calcularTrapezoidal(a, b, n, funcion);

            // Mostrar el resultado
            document.getElementById('resultado').textContent = resultado.toFixed(6);
        });

        function calcularTrapezoidal(a, b, n, funcion) {
            const delta = (b - a) / n;

            // Definir una función evaluadora para las funciones matemáticas
            const f = (x) => {
                return eval(funcion);
            };

            // Sumar los extremos f(a) y f(b)
            let sum = f(a) + f(b);

            // Sumar los puntos intermedios 2*f(x_i)
            for (let i = 1; i < n; i++) {
                const x = a + i * delta;
                sum += 2 * f(x);
            }

            // Aplicar la fórmula trapezoidal
            return (delta / 2) * sum;
        }
    </script>
</body>
</html>
