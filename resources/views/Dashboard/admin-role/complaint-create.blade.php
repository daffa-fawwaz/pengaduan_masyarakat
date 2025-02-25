<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input - Tailwind CSS (Dark Mode)</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-200">
    <div class="container mx-auto p-6">
        <div class="bg-gray-800 shadow-md rounded-lg p-6">
            <h3 class="text-xl font-bold">Input</h3>
            <p class="text-gray-400">Give textual form controls like input upgrade with custom styles, sizing, focus
                states, and more.</p>
        </div>

        <div class="mt-6 bg-gray-800 shadow-md rounded-lg p-6">
            <h4 class="text-lg font-semibold">Basic Inputs</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                <div>
                    <label for="basicInput" class="block text-sm font-medium text-gray-300">Nama Lengkap</label>
                    <input type="text" id="basicInput"
                        class="mt-1 block w-full px-4 py-2 border border-gray-600 rounded-lg shadow-sm bg-gray-700 text-white focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter email" value="{{ Auth::user()->name }}" disabled>
                </div>
                <div>
                    <label for="disabledInput" class="block text-sm font-medium text-gray-300">Alaamat Email</label>
                    <input type="text" id="disabledInput"
                        class="mt-1 block w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-400 cursor-not-allowed"
                        placeholder="Disabled Text" value="{{ Auth::user()->email }}" disabled>
                </div>
                <div>
                    <label for="readonlyInput" class="block text-sm font-medium text-gray-300">Readonly Input</label>
                    <input type="text" id="readonlyInput"
                        class="mt-1 block w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-400"
                        value="You can't update me :P" readonly>
                </div>
                <div>
                    <label for="helperText" class="block text-sm font-medium text-gray-300">With Helper Text</label>
                    <input type="text" id="helperText"
                        class="mt-1 block w-full px-4 py-2 border border-gray-600 rounded-lg shadow-sm bg-gray-700 text-white focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Name">
                    <p class="text-sm text-gray-400 mt-1">Find helper text here for given textbox.</p>
                </div>
            </div>
        </div>

        <div class="mt-6 bg-gray-800 shadow-md rounded-lg p-6">
            <h4 class="text-lg font-semibold">Input Styles</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                <div>
                    <label for="roundText" class="block text-sm font-medium text-gray-300">Rounded Input</label>
                    <input type="text" id="roundText"
                        class="mt-1 block w-full px-4 py-2 border border-gray-600 rounded-full shadow-sm bg-gray-700 text-white focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Rounded Input">
                </div>
                <div>
                    <label for="squareText" class="block text-sm font-medium text-gray-300">Square Input</label>
                    <input type="text" id="squareText"
                        class="mt-1 block w-full px-4 py-2 border border-gray-600 shadow-sm bg-gray-700 text-white focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Square Input">
                </div>
            </div>
        </div>

        <footer class="mt-6 text-center text-gray-400">
            <p>2023 &copy; Mazer. Crafted with ❤️ by <a href="https://saugi.me" class="text-blue-400">Saugi</a></p>
        </footer>
    </div>
</body>

</html>
