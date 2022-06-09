<x-layout>

    <x-navbar/>

    <main class="container mx-auto max-w-screen-sm">


        {{-- Add todo Form --}}
        <form action="/todo" method="POST" class="bg-white rounded-lg p-4 mt-4">
            @csrf
            <div class="flex gap-4">
                <div class="flex-1">
                    <input type="text" id="title" name="title"
                           class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Add a todo">
                </div>
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Add
                    Todo
                </button>
            </div>
            @error('title')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </form>
        {{-- Todos List --}}
        <p class="text-xl my-2">Todo List</p>
        <div class="bg-white rounded-lg p-6">

            @forelse ($todos as $todo)
                <div class="flex justify-between items-center bg-gray-100 p-4 py-2 rounded-lg mb-2">
                    <input type="checkbox" name="completed" id="completed" disabled @checked($todo->is_completed === 1)>

                    @if ($todo->is_completed === 1)

                        <p class="flex-1 ml-6 text-gray-400 line-through font-bold">{{ $todo->title }}</p>
                    @else

                        <p class="flex-1 ml-6 text-gray-600 font-bold">{{ $todo->title }}</p>
                    @endif

                    <div class="flex gap-2">

                        <a href="/todo/{{ $todo->id }}/edit"
                           class="bg-blue-700 py-1 px-2 rounded-lg hover:bg-blue-800 text-sm text-white mr-2">Update</a>

                        <form action="/todo/{{ $todo->id }}" method="POST">
                            @csrf
                            @method('delete')

                            <button type="submit"
                                    class="bg-red-500 py-1 px-2 rounded-lg hover:bg-red-600 text-sm text-white">Delete
                            </button>

                        </form>
                    </div>
                </div>
            @empty
                <p class="text-2xl font-semibold text-center">Please add the todos</p>
            @endforelse

        </div>

    </main>
</x-layout>
