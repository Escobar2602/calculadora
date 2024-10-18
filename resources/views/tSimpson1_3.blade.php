<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método de Simpson 1/3</title>
</head>
<body>


    <h1>Cálculo de Integral Definida - Método de Simpson 1/3</h1>

    <form id="integralForm">
        <label for="funcion">Elige la función \(f(x)\):</label>
        <select id="funcion" name="funcion">
            <option value="x**2">x^2</option>
            <option value="Math.sin(x)">sin(x)</option>
            <option value="Math.cos(x)">cos(x)</option>
            <option value="Math.log(x)">log(x)</option>
            <option value="custom">Personalizada (usa "x" como variable)</option>
        </select>

        <label for="customFunction">Función personalizada (si es el caso):</label>
        <input type="text" id="customFunction" placeholder="Ejemplo: Math.sqrt(x)" disabled />

        <label for="a">Límite inferior (a):</label>
        <input type="number" id="a" value="0">

        <label for="b">Límite superior (b):</label>
        <input type="number" id="b" value="1">

        <button type="submit">Calcular Integral</button>
    </form>

    <h2>Resultado: <span id="resultado"></span></h2>

    <script>
        // Habilitar o deshabilitar función personalizada
        document.getElementById('funcion').addEventListener('change', function () {
            const customFunctionInput = document.getElementById('customFunction');
            if (this.value === 'custom') {
                customFunctionInput.disabled = false;
            } else {
                customFunctionInput.disabled = true;
            }
        });

        // Manejo del formulario
        document.getElementById('integralForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const a = parseFloat(document.getElementById('a').value);
            const b = parseFloat(document.getElementById('b').value);
            let funcion = document.getElementById('funcion').value;
            const customFunction = document.getElementById('customFunction').value;

            if (funcion === 'custom') {
                funcion = customFunction;
            }

            const resultado = calcularSimpson13(a, b, funcion);

            document.getElementById('resultado').textContent = resultado.toFixed(6);
        });

        // Función para el cálculo de Simpson 1/3
        function calcularSimpson13(a, b, funcion) {
            const delta = (b - a) / 2;

            const f = (x) => eval(funcion);

            const x1 = a;
            const x2 = (a + b) / 2;
            const x3 = b;

            const integral = (delta / 3) * (f(x1) + 4 * f(x2) + f(x3));

            return integral;
        }
    </script>
</body>
</html>
