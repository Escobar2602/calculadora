<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método de Simpson 1/3</title>
    @vite('resources/css/app.css')
</head>

<body style="background-image: url('{{ asset('images/4054966.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div>
        <nav class="bg-gray-500 bg-opacity-70 dark:bg-gray-800 fixed top-0 left-0 z-40 w-full">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <div class="flex items-center">
                    <a href="/" class="flex items-center text-white px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                        <span class="ms-3">Inicio</span>
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

    <div class="p-6 sm:mix-blend-screen min-h-screen flex items-center justify-center">
        <div class="flex flex-col lg:flex-row items-center space-x-4">
            <!-- Imagen -->
            <div class="hidden lg:block mr-52 mt-14 float">
                <img src="{{ asset('images/niño.png') }}" alt="Descripción de la imagen"
                    class="w-[87%] h-auto rounded-lg shadow-md">
                <h1 class="text-white text-4xl font-extrabold">EL QUE ESTUDIA TRIUNFA</h1>
            </div>
            <style>
                @keyframes float {
                    0% {
                        transform: translatey(0);
                    }

                    50% {
                        transform: translatey(-50px);
                    }

                    100% {
                        transform: translatey(0);
                    }
                }

                .float {
                    animation: float 3s ease-in-out infinite;
                }
            </style>
            <div class="bg-white w-[45%] p-6 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Cálculo de Integral Definida - Método de
                Simpson 1/3</h1>
            <form id="integralForm" class="space-y-4">
                <div>
                    <label for="funcion" class="block text-lg font-medium text-gray-700 mb-2">Elige la función
                        \(f(x)\):</label>
                    <select id="funcion" name="funcion"
                        class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="x**2">x^2</option>
                        <option value="Math.sin(x)">sin(x)</option>
                        <option value="Math.cos(x)">cos(x)</option>
                        <option value="Math.log(x)">log(x)</option>
                        <option value="custom">Personalizada (usa "x" como variable)</option>
                    </select>
                </div>

                <div>
                    <label for="customFunction" class="block text-lg font-medium text-gray-700 mb-2">Función
                        personalizada (si es el caso):</label>
                    <input type="text" id="customFunction"
                        class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Ejemplo: Math.sqrt(x)" disabled />
                </div>

                <div>
                    <label for="a" class="block text-lg font-medium text-gray-700 mb-2">Límite inferior
                        (a):</label>
                    <input type="number" id="a"
                        class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="0">
                </div>

                <div>
                    <label for="b" class="block text-lg font-medium text-gray-700 mb-2">Límite superior
                        (b):</label>
                    <input type="number" id="b"
                        class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="1">
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Calcular
                    Integral</button>
            </form>

            <h2 class="mt-6 text-2xl font-semibold text-gray-800 text-center">Resultado: <span id="resultado"
                    class="text-blue-500"></span></h2>
        </div>
    </div>
</body>
<script>
    // Habilitar o deshabilitar función personalizada
    document.getElementById('funcion').addEventListener('change', function() {
        const customFunctionInput = document.getElementById('customFunction');
        if (this.value === 'custom') {
            customFunctionInput.disabled = false;
        } else {
            customFunctionInput.disabled = true;
        }
    });

    // Manejo del formulario
    document.getElementById('integralForm').addEventListener('submit', function(e) {
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
