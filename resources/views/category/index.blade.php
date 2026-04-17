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

                <tr class="border-t">
                    <td class="px-4 py-3">Raw Material</td>
                    <td class="px-4 py-3">Basic construction materials</td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <button class="text-blue-600">Edit</button>
                        <button class="text-red-600">Delete</button>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</main>
@endsection
