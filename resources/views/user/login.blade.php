<x-layout>
    <x-navbar />
    <p class="text-center text-xl font-medium my-6">Please Log In to create and view todos!</p>
    <main class=" container mx-auto max-w-screen-sm bg-white py-4 px-8 mt-4 rounded-lg">
        <h1 class="text-2xl text-center font-medium uppercase mb-4">Log In</h1>

        <form action="/login" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Email</label>
                <input type="email" id="email" name="email"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                       placeholder="example@example.com" value={{ old('email') }}>
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
                    Password</label>
                <input type="password" id="password" name="password"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                       value={{ old('password') }}>
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>


            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
        <div class="mt-2">
            <span class="text-semibold">Do not have an account yet?</span>
            <a href="/register" class="text-blue-600 underline font-semibold">Register</a>
        </div>
    </main>
</x-layout>
