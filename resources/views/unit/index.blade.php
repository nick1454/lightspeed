@extends('layouts.app')
@section('title', 'Unit List')
@section('content')
        <!-- CONTENT -->
        <main class="p-6 space-y-6">

            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold">Unit List</h2>

                <a href="{{ route('unit.create') }}"
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

            @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200" role="alert">
                <p>{{ session('success') }}</p>
            </div>
            @endif
            <!-- TABLE -->
            <div class="bg-white rounded shadow">

                <table class="w-full text-sm">

                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left">Unit Name</th>
                            <th class="px-4 py-3 text-left">Short Name</th>
                            <th class="px-4 py-3 text-left">Description</th>
                            <th class="px-4 py-3 text-right">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($units as $unit)
                        <tr class="border-t">
                            <td class="px-4 py-3">{{ $unit->name }}</td>
                            <td class="px-4 py-3">{{ $unit->short_name }}</td>
                            <td class="px-4 py-3">{{ $unit->description }}</td>
                            <td class="px-4 py-3 text-right space-x-2">
                                <a class="text-blue-600" href="{{ route('unit.edit', $unit->id) }}">Edit</a>
                                <button class="text-red-600" onclick="deleteUnit('{{ $unit->name }}', '{{ route('unit.destroy', $unit->id) }}')">Delete</button>

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
            function deleteUnit(name,route) {
                if (confirm('Are you sure you want to delete unit "' + name + '"?')) {
                    document.getElementById('delete-form').action = route;
                    document.getElementById('delete-form').submit();
                }
            }
        </script>
    @endsection
