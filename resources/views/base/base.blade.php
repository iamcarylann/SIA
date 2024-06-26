<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NavigationHTMX</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>
</head>
<body class="flex h-screen">
    <div class="w-64 h-full overflow-auto bg-blue-700 text-white flex flex-col ">
        <div id="brand" class="text-2xl p-4 text-center">
            Commerce
        </div>
        <nav id="main-nav" class="flex flex-col">
            <a href="/" class="p-3 hover:bg-blue-400 text-center">Home</a>
            <a href="/about" class="p-3 hover:bg-blue-400 text-center">About</a>
            <a href="/products" class="p-3 hover:bg-blue-400 text-center">Products</a>
            <a href="/contact" class="p-3 hover:bg-blue-400 text-center">Contact Us</a>
        </nav>
    </div>
    <div class="flex-1 flex flex-col overflow-auto">
        <section class="flex-1 p-4">
            <article id="content">
                @yield('content')
            </article>
        </section>
        <footer class="text-center text-gray-500 py-3">
            Copyright &copy; 2024. All rights reserved.
        </footer>
    </div>
</body>
</html>
