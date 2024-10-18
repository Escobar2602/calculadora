<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método de Simpson 3/8 - Cálculo de Integrales</title>
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
    <h1>Método de Simpson 3/8 para Cálculo de Integrales</h1>

    <form id="simpsonForm">
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

        <button type="submit">Calcular Integral</button>
    </form>

    <h2>Resultado: <span id="resultado"></span></h2>

    <h3>Iteraciones:</h3>
    <pre id="iteraciones"></pre>

    <script>
        document.getElementById('funcion').addEventListener('change', function () {
            const customFunctionInput = document.getElementById('customFunction');
            if (this.value === 'custom') {
                customFunctionInput.disabled = false;
            } else {
                customFunctionInput.disabled = true;
            }
        });

        document.getElementById('simpsonForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Obtener valores del formulario
            const a = parseFloat(document.getElementById('a').value);
            const b = parseFloat(document.getElementById('b').value);
            let funcion = document.getElementById('funcion').value;
            const customFunction = document.getElementById('customFunction').value;

            // Si el usuario elige función personalizada
            if (funcion === 'custom') {
                funcion = customFunction;
            }

            // Calcular la integral usando el método de Simpson 3/8
            const resultado = calcularSimpson38(a, b, funcion);

            // Mostrar el resultado
            document.getElementById('resultado').textContent = resultado.integral.toFixed(6);

            // Mostrar iteraciones
            document.getElementById('iteraciones').textContent = resultado.iteraciones;
        });

        function calcularSimpson38(a, b, funcion) {
            const delta = (b - a) / 3;  // Usamos (b - a) / 3 para obtener los 4 puntos

            // Definir una función evaluadora para las funciones matemáticas
            const f = (x) => {
                return eval(funcion);
            };

            // Calcular los puntos x1, x2, x3 y x4
            const x1 = a;
            const x2 = a + delta;
            const x3 = a + 2 * delta;
            const x4 = b;

            // Calcular los valores de f(x) en cada punto
            const fx1 = f(x1);
            const fx2 = f(x2);
            const fx3 = f(x3);
            const fx4 = f(x4);

            // Aplicar la fórmula de Simpson 3/8
            const integral = (3 * delta / 8) * (fx1 + 3 * fx2 + 3 * fx3 + fx4);

            // Iteraciones detalladas
            const iteraciones = `x1 = ${x1.toFixed(6)}, f(x1) = ${fx1.toFixed(6)}\n` +
                                `x2 = ${x2.toFixed(6)}, f(x2) = ${fx2.toFixed(6)}\n` +
                                `x3 = ${x3.toFixed(6)}, f(x3) = ${fx3.toFixed(6)}\n` +
                                `x4 = ${x4.toFixed(6)}, f(x4) = ${fx4.toFixed(6)}\n` +
                                `\nIntegral aproximada = ${integral.toFixed(6)}`;

            return { integral, iteraciones };
        }
    </script>
</body>
</html>
