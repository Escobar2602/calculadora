<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Simpson Abierto</title>
    </head>

    @vite('resources/css/app.css')
    <div>
        <nav class="bg-cyan-800 dark:bg-gray-800 fixed top-0 left-0 z-40 w-full">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <div class="flex items-center">
                    <a href="/" class="flex items-center text-white px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </div>
                <div class="flex space-x-4">
                    <a href="/trapezoidal" class="text-white px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                        <span class="flex-1 ms-3 whitespace-nowrap">Trapezoidal</span>
                    </a>
                    <a href="/jorgeboole" class="text-white px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                        <span class="flex-1 ms-3 whitespace-nowrap">George Boole</span>
                    </a>
                    <a href="/Simpson3/8" class="text-white px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                        <span class="flex-1 ms-3 whitespace-nowrap">Simpson 3/8</span>
                    </a>
                    <a href="/Simpson1/3" class="text-white px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                        <span class="flex-1 ms-3 whitespace-nowrap">Simpson 1/3</span>
                    </a>
                    <a href="/simpson-abierto" class="text-white px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                        <span class="flex-1 ms-3 whitespace-nowrap">Simpson Abierto</span>
                    </a>
                </div>
            </div>
        </nav>

    </div>

    <body>
        <div class="p-6 sm:mix-blend-screen bg-gray-50 min-h-screen flex items-center justify-center">
            <div class="bg-white w-96 p-6 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Método Simpson Abierto</h1>

            <form id="simpsonForm" class="space-y-4">
                <div>
                    <label for="a" class="block text-lg font-medium text-gray-700 mb-2">Valor de a (límite
                        inferior):</label>
                    <input type="number" step="any" id="a"
                        class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label for="b" class="block text-lg font-medium text-gray-700 mb-2">Valor de b (límite
                        superior):</label>
                    <input type="number" step="any" id="b"
                        class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label for="n" class="block text-lg font-medium text-gray-700 mb-2">Número de particiones (n
                        debe ser par):</label>
                    <input type="number" id="n"
                        class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required min="2" step="2">
                </div>

                <div>
                    <label for="funcion" class="block text-lg font-medium text-gray-700 mb-2">Función f(x):</label>
                    <input type="text" id="funcion"
                        class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Ejemplo: x^2 + 3*x" required>
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Calcular</button>
            </form>

            <div id="resultado" class="mt-6" style="display:none;">
                <h2 class="text-2xl font-semibold text-gray-800">Resultado:</h2>
                <p class="mt-4">La integral definida es: <span id="resultadoValor" class="text-blue-500"></span></p>
            </div>
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
