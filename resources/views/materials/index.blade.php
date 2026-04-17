@extends('layouts.app')
@section('title', 'Materials List')

@section('content')
        <main class="flex-1 p-6 overflow-y-auto space-y-6">

            <!-- TOP BAR -->
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold">Material List</h2>

                <a href="{{ route('materials.form') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Add Material
                </a>
            </div>

            <!-- TABLE -->
            <div class="bg-white rounded shadow overflow-hidden">

                <table class="w-full text-sm">

                    <thead class="bg-gray-50 text-gray-600">
                        <tr>
                            <th class="px-4 py-3 text-left">Name</th>
                            <th class="px-4 py-3 text-left">Category</th>
                            <th class="px-4 py-3 text-left">Unit</th>
                            <th class="px-4 py-3 text-right">Stock</th>
                            <th class="px-4 py-3 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="px-4 py-3">Cement OPC</td>
                            <td class="px-4 py-3">Raw Material</td>
                            <td class="px-4 py-3">Bag</td>
                            <td class="px-4 py-3 text-right">120</td>
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
