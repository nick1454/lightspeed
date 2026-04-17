@extends('layouts.app')
@section('title', 'Category List')

@section('content')

<main class="p-6 space-y-6">

    <!-- TOP -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold">Category List</h2>

        <a href="{{ route('category.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
           + Add
        </a>
    </div>

    @if ($errors->any())
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200" role="alert">
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- TABLE -->
    <div class="bg-white rounded shadow">

        <table class="w-full text-sm">

            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Description</th>
                    <th class="px-4 py-3 text-right">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
            <tr class="border-t">
                    <td class="px-4 py-3">{{ $category->name }}</td>
                    <td class="px-4 py-3">{{ $category->description }}</td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <a class="text-blue-600" href="{{ route('category.edit', $category->id) }}">Edit</a>
                        <button class="text-red-600" onclick="deleteCategory('{{ $category->name }}',
                        '{{ route('category.destroy', $category->id) }}')">Delete</button>

            <tbody>
                <form id="delete-form" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>

    </div>

</main>
@endsection
 @section('scripts')
        <script>
            function deleteCategory(name,route) {
                if (confirm('Are you sure you want to delete category "' + name + '"?')) {
                    document.getElementById('delete-form').action = route;
                    document.getElementById('delete-form').submit();
                }
            }
        </script>
    @endsection