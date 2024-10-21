<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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


<div class="flex items-center justify-center min-h-screen">
    <div class="flex space-x-4 mt-36">
        <div
            class="w-80 p-4 bg-white rounded-lg shadow-md transform hover:scale-105 transition-transform duration-300 ease-in-out">
            <img class="w-full h-40 object-cover rounded-t-lg" alt="Card Image" src="https://via.placeholder.com/150">
            <div class="p-4">
                <h2 class="text-xl font-semibold">Carlos Escobar L.</h2>
                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis ante sit
                    amet tellus ornare tincidunt.</p>
                <div class="flex justify-between items-center mt-4">
                    <button
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400">Learn
                        More</button>
                </div>
            </div>
        </div>

        <div
            class="w-80 p-4 bg-white rounded-lg shadow-md transform hover:scale-105 transition-transform duration-300 ease-in-out">
            <img class="w-full h-40 object-cover rounded-t-lg" alt="Card Image" src="https://via.placeholder.com/150">
            <div class="p-4">
                <h2 class="text-xl font-semibold">Rois Simarra</h2>
                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis ante sit
                    amet tellus ornare tincidunt.</p>
                <div class="flex justify-between items-center mt-4">
                    <button
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400">Learn
                        More</button>
                </div>
            </div>
        </div>

        <div
            class="w-80 p-4 bg-white rounded-lg shadow-md transform hover:scale-105 transition-transform duration-300 ease-in-out">
            <img class="w-full h-40 object-cover rounded-t-lg" alt="Card Image" src="https://via.placeholder.com/150">
            <div class="p-4">
                <h2 class="text-xl font-semibold">Jorge Borrero</h2>
                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis ante sit
                    amet tellus ornare tincidunt.</p>
                <div class="flex justify-between items-center mt-4">
                    <button
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400">Learn
                        More</button>
                </div>
            </div>
        </div>

        <div
            class="w-80 p-4 bg-white rounded-lg shadow-md transform hover:scale-105 transition-transform duration-300 ease-in-out">
            <img class="w-full h-40 object-cover rounded-t-lg" alt="Card Image" src="https://via.placeholder.com/150">
            <div class="p-4">
                <h2 class="text-xl font-semibold">Cristian (EL SARGENTO)</h2>
                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis ante sit
                    amet tellus ornare tincidunt.</p>
                <div class="flex justify-between items-center mt-4">
                    <button
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400">Learn
                        More</button>
                </div>
            </div>
        </div>
    </div>
</div>
