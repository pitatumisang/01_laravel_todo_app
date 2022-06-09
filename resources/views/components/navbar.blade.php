<header class=" bg-white ">
    <nav class="container mx-auto max-w-screen-md flex justify-between font-semibold py-4">
        <a href="/" class="text-xl">Todo App</a>

        <div class="flex gap-2 items-center">

            @auth
                <p class="mr-6 text-sm">Welcome, {{ auth()->user()->name }}</p>
                <form action="/logout">
                    <button type="submit" class="text-red-500 font-semibold hover:underline">
                        Log Out
                    </button>
                </form>
            @else
                <a href="/register" class="text-blue-500 hover:text-blue-700 hover:underline mr-4">Register</a>
                <a href="/login" class="text-blue-500 hover:text-blue-700 hover:underline">Log In</a>
            @endauth

        </div>
    </nav>
</header>
