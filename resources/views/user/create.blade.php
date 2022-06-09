<x-layout>
    <x-navbar />
    <main class="container mx-auto max-w-screen-sm bg-white py-4 px-8 mt-4 rounded-lg">
        <h1 class="text-2xl text-center font-medium uppercase mb-4">Register</h1>

        <form action="/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Name</label>
                <input type="text" id="name" name="name"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                       placeholder="your name" value="{{ old('name') }}">
                @error('name')
                <p class=" text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Email</label>
                <input type="email" id="email" name="email"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                       placeholder="example@example.com" value="{{ old('email') }}">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
                    Password</label>
                <input type="password" id="password" name="password"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">
                    Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                @error('password_confirmation')
                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>

            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
        <div class="mt-2">
            <span class="text-semibold">Aleready have an account?</span>
            <a href="/login" class="text-blue-600 underline font-semibold">Log In</a>
        </div>
    </main>
</x-layout>
