{{-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método de Boole - Cálculo de Integrales</title>
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
    <h1>Método de Boole para Cálculo de Integrales</h1>

    <form id="booleForm">
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

    <script>
        document.getElementById('funcion').addEventListener('change', function () {
            const customFunctionInput = document.getElementById('customFunction');
            if (this.value === 'custom') {
                customFunctionInput.disabled = false;
            } else {
                customFunctionInput.disabled = true;
            }
        });

        document.getElementById('booleForm').addEventListener('submit', function (e) {
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

            // Calcular la integral usando el método de Boole
            const resultado = calcularBoole(a, b, funcion);

            // Mostrar el resultado
            document.getElementById('resultado').textContent = resultado.toFixed(6);
        });

        function calcularBoole(a, b, funcion) {
            const delta = (b - a) / 4;  // Cambiado a (b - a) / 4 ya que necesitamos 5 puntos

            // Definir una función evaluadora para las funciones matemáticas
            const f = (x) => {
                return eval(funcion);
            };

            // Calcular los puntos x1, x2, ..., x5
            const x1 = a;
            const x2 = a + delta;
            const x3 = a + 2 * delta;
            const x4 = a + 3 * delta;
            const x5 = b;

            // Aplicar la fórmula de Boole corregida
            const integral = (2 * delta / 45) * (7 * f(x1) + 32 * f(x2) + 12 * f(x3) + 32 * f(x4) + 7 * f(x5));

            return integral;
        }
    </script>
</body>
</html> --}}



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método de Boole - Cálculo de Integrales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label, input, select {
            margin: 10px 0;
            display: block;
        }
        #iteraciones {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Método de Boole para Cálculo de Integrales</h1>

    <form id="booleForm">
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
        <input type="number" id="a" value="0" required>

        <label for="b">Límite superior (b):</label>
        <input type="number" id="b" value="1" required>

        <button type="submit">Calcular Integral</button>
    </form>

    <h2>Resultado: <span id="resultado"></span></h2>
    <div id="iteraciones"></div>

    <script>
        document.getElementById('funcion').addEventListener('change', function () {
            const customFunctionInput = document.getElementById('customFunction');
            if (this.value === 'custom') {
                customFunctionInput.disabled = false;
            } else {
                customFunctionInput.disabled = true;
            }
        });

        document.getElementById('booleForm').addEventListener('submit', function (e) {
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

            // Calcular la integral usando el método de Boole
            const { resultado, pasos } = calcularBoole(a, b, funcion);

            // Mostrar el resultado
            document.getElementById('resultado').textContent = resultado.toFixed(6);
            document.getElementById('iteraciones').innerHTML = pasos.join('<br>');
        });

        function calcularBoole(a, b, funcion) {
            const delta = (b - a) / 4; // Cambiado a (b - a) / 4 ya que necesitamos 5 puntos

            // Definir una función evaluadora para las funciones matemáticas
            const f = (x) => {
                return eval(funcion);
            };

            // Calcular los puntos x1, x2, ..., x5
            const x1 = a;
            const x2 = a + delta;
            const x3 = a + 2 * delta;
            const x4 = a + 3 * delta;
            const x5 = b;

            // Evaluar la función en cada punto
            const f1 = f(x1);
            const f2 = f(x2);
            const f3 = f(x3);
            const f4 = f(x4);
            const f5 = f(x5);

            // Aplicar la fórmula de Boole corregida
            const integral = (2 * delta / 45) * (7 * f1 + 32 * f2 + 12 * f3 + 32 * f4 + 7 * f5);

            // Crear un array con los pasos
            const pasos = [
                `x1 = ${x1.toFixed(4)}, f(x1) = ${f1.toFixed(4)}`,
                `x2 = ${x2.toFixed(4)}, f(x2) = ${f2.toFixed(4)}`,
                `x3 = ${x3.toFixed(4)}, f(x3) = ${f3.toFixed(4)}`,
                `x4 = ${x4.toFixed(4)}, f(x4) = ${f4.toFixed(4)}`,
                `x5 = ${x5.toFixed(4)}, f(x5) = ${f5.toFixed(4)}`,
                `Resultado de la integral: ${integral.toFixed(6)}`
            ];

            return { resultado: integral, pasos: pasos };
        }
    </script>
</body>
</html>
