<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>George Boole</title>
</head>

@vite('resources/css/app.css')
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
        <!-- Formulario -->
        <div class="bg-white w-[45%] p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Método de Boole para Cálculo de Integrales</h1>

        <form id="booleForm" class="space-y-4">
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
                <label for="customFunction" class="block text-lg font-medium text-gray-700 mb-2">Función personalizada
                    (solo si eliges personalizada):</label>
                <input type="text" id="customFunction"
                    class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ejemplo: Math.sqrt(x)" disabled />
            </div>

            <div>
                <label for="a" class="block text-lg font-medium text-gray-700 mb-2">Límite inferior (a):</label>
                <input type="number" id="a"
                    class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="0" required />
            </div>

            <div>
                <label for="b" class="block text-lg font-medium text-gray-700 mb-2">Límite superior (b):</label>
                <input type="number" id="b"
                    class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="1" required />
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Calcular
                Integral</button>
        </form>

        <h2 class="mt-6 text-2xl font-semibold text-gray-800">Resultado: <span id="resultado" class="text-blue-500"></span>
        </h2>
        <div id="iteraciones" class="mt-4"></div>
    </div>

</body>


<script>
    document.getElementById('funcion').addEventListener('change', function() {
        const customFunctionInput = document.getElementById('customFunction');
        if (this.value === 'custom') {
            customFunctionInput.disabled = false;
        } else {
            customFunctionInput.disabled = true;
        }
    });

    document.getElementById('booleForm').addEventListener('submit', function(e) {
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
        const {
            resultado,
            pasos
        } = calcularBoole(a, b, funcion);

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

        return {
            resultado: integral,
            pasos: pasos
        };
    }
</script>
</div>
