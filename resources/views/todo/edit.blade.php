<x-layout>
    <x-navbar />
    <main class="container mx-auto max-w-screen-sm">
        <a href="/" class="inline-block font-semibold text-blue-600 hover:underline mt-4"> &larr; Back</a>
        {{-- Update todo Form --}}
        <p class="text-xl font-semibold mt-4">Updating Todo - {{ $todo->id }}</p>
        <form action="/todo/{{ $todo->id }}" method="POST" class="bg-white rounded-lg p-4 mt-4">
            @csrf
            @method('put')
            <div class="">
                <div class="">
                    <label for="block completed" class=" text-sm font-medium text-gray-900">Edit Todo
                        Title</label>
                    <input type="text" id="title" name="title"
                           class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           value="{{ $todo->title }}">

                    @error('title')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex my-4 items-center gap-2">
                    <label for="completed" class=" text-sm font-medium text-gray-900">Mark As {{ $todo->is_completed ===
                        0 ? 'Complete' : 'Incomplete' }}</label>
                    <input class="w-4" type="checkbox" name="completed" id="completed" @checked($todo->is_completed ===
                    1)>
                </div>
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                    Todo</button>
            </div>

        </form>
    </main>
</x-layout>
