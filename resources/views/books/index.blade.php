<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                    <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                        <span class="font-medium">Success!</span> {{ session('success') }}
                    </div>
                    @endif
                    <div class="my-4">
                        <form action="{{ route('books.index') }}" method="GET">
                            <div class="flex">
                                <input type="text" name="search" placeholder="Search by title or author..."
                                    class="block w-full border-gray-300 rounded-l-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    value="{{ request('search') }}">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-r-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                    <a href="{{ route('books.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Add New Book
                    </a>

                    <div class="mt-6">
                        <table class="min-w-full custom-table">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="whitespace-nowrap text-right text-sm font-medium action-buttons">Title</th>
                                    <th class="whitespace-nowrap text-right text-sm font-medium action-buttons">Author</th>
                                    <th class="whitespace-nowrap text-right text-sm font-medium action-buttons">Year</th>
                                    <th class="whitespace-nowrap text-right text-sm font-medium action-buttons">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($books as $book)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $book->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $book->author }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $book->publication_year }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('books.edit', $book) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">
                                        No books found.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>