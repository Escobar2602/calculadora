<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método Simpson Abierto</title>
</head>

<body>
    <h1>Método Simpson Abierto</h1>

    <form id="simpsonForm">
        <label for="a">Valor de a (límite inferior):</label>
        <input type="number" step="any" id="a" required><br><br>

        <label for="b">Valor de b (límite superior):</label>
        <input type="number" step="any" id="b" required><br><br>

        <label for="n">Número de particiones (n debe ser par):</label>
        <input type="number" id="n" required min="2" step="2"><br><br>

        <label for="funcion">Función f(x):</label>
        <input type="text" id="funcion" placeholder="Ejemplo: x^2 + 3*x" required><br><br>

        <button type="submit">Calcular</button>
    </form>

    <div id="resultado" style="display:none;">
        <h2>Resultado:</h2>
        <p>La integral definida es: <span id="resultadoValor"></span></p>
    </div>

    <script>
        document.getElementById('simpsonForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Obtener los valores del formulario
            const a = parseFloat(document.getElementById('a').value);
            const b = parseFloat(document.getElementById('b').value);
            let n = parseInt(document.getElementById('n').value);
            const funcion = document.getElementById('funcion').value;

            // Verificar si n es par
            if (n % 2 !== 0) {
                alert('n debe ser un número par');
                return;
            }

            // Convertir la función ingresada a una función ejecutable
            const f = new Function('x', `return ${funcion.replace(/\^/g, '**')};`);

            // Calcular h
            const h = (b - a) / n;

            let integral = 0;

            // Aplicar la fórmula de Simpson Abierto
            for (let i = 0; i <= n; i++) {
                const x = a + i * h;
                if (i === 0 || i === n) {
                    integral += f(x);
                } else if (i % 2 === 0) {
                    integral += 2 * f(x);
                } else {
                    integral += 4 * f(x);
                }
            }

            integral = (h / 3) * integral;

            // Mostrar el resultado
            document.getElementById('resultado').style.display = 'block';
            document.getElementById('resultadoValor').innerText = integral;
        });
    </script>
</body>
</html>
