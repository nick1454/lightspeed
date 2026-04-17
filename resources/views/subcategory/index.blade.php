@extends('layouts.app')
@section('title', 'Subcategory List')
@section('content')

<main class="p-6 space-y-6">

    <!-- TOP -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold">Subcategory List</h2>

        <a href="/subcategory/form"
           class="bg-blue-600 text-white px-4 py-2 rounded">
           + Add Subcategory
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
                    <th class="px-4 py-3 text-left">Category</th>
                    <th class="px-4 py-3 text-left">Subcategory</th>
                    <th class="px-4 py-3 text-left">Description</th>
                    <th class="px-4 py-3 text-right">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($subcategories as $item)
                <tr class="border-t">
                    <td class="px-4 py-3">{{ $item->category->name }}</td>
                    <td class="px-4 py-3">{{ $item->name }}</td>
                    <td class="px-4 py-3">{{ $item->description }}</td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <a href="{{ route('subcategory.edit', $item->id) }}" title="Edit" class="text-blue-600">Edit</a>
                        <button click="deleteItem('{{ $item->name }}',{{ route('subcategory.destroy', $item->id) }})" class="text-red-600">Delete</button>
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
        function deleteItem(name,route) {
            if (confirm('Are you sure you want to delete unit "' + name + '"?')) {
                document.getElementById('delete-form').action = route;
                document.getElementById('delete-form').submit();
            }
        }
    </script>
@endsection
