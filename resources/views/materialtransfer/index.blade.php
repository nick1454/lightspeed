@extends('layouts.app')
@section('title', 'Material Transfer')
@section('content')

<main class="p-6 space-y-6">
    <!-- TOP -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold">@yield('title') List</h2>

        <a href="/materialtransfer/form"
           class="bg-blue-600 text-white px-4 py-2 rounded">
           + Add
        </a>
    </div>

    <!-- Filter -->
    <div class="bg-white rounded shadow">
        <table class="w-full text-sm">
            <tbody class="bg-gray-50">
                <tr>
                    <td class="px-4 py-3 text-left">Filters</td>
                </tr>
                <tr>
                    <td class="px-2 py-3 text-left">
                        <input type="date" placeholder="From Date" class="px-2 py-2 border border-gray-300 rounded-md">
                        <input type="date" placeholder="To Date" class="px-2 py-2 border border-gray-300 rounded-md">
                        <input type="text" placeholder="Transfer No" class="px-2 py-2 border border-gray-300 rounded-md">
                        <input type="text" placeholder="Manual No" class="px-2 py-2 border border-gray-300 rounded-md">
                        <input type="text" placeholder="Warehouse From" class="px-2 py-2 border border-gray-300 rounded-md">
                        <input type="text" placeholder="Warehouse To" class="px-2 py-2 border border-gray-300 rounded-md">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded border border-gray-300 rounded-md btn-sm">Search</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- FLASH MESSAGE -->
    @include('layouts.includes.flash-messages', ['type' => 'error'])
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
                    <th class="px-4 py-3 text-left">Transfer No</th>
                    <th class="px-4 py-3 text-left">Date</th>
                    <th class="px-4 py-3 text-left">Warehouse From</th>
                    <th class="px-4 py-3 text-left">Warehouse To</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                <tr class="border-t">
                    <td class="px-4 py-3">{{ $item->transfer_no }}</td>
                    <td class="px-4 py-3">{{ date('d-M-Y', strtotime($item->transfer_date)) }}</td>
                    <td class="px-4 py-3">{{ $item->warehouseFrom->name ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $item->warehouseTo->name ?? '-' }}</td>
                    <td class="px-4 py-3">
                        @if ($item->is_draft == 1)
                        <span class="bg-red-500 text-white px-2 rounded">Draft</span>
                        @else
                        <span class="bg-green-500 text-white px-2 rounded">Confirmed</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-left space-x-2">
                        <a href="{{ route('materialtransfer.print', $item->id) }}" title="Print" class="text-blue-600" target="_blank">Print</a>
                        <a href="{{ route('materialtransfer.edit', $item->id) }}" title="Edit" class="text-blue-600">Edit</a>
                        <button onclick="deleteItem('{{ $item->id }}','{{ route('materialtransfer.destroy', $item->id) }}')" class="text-red-600">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <form id="delete-form" method="post">
            @csrf
            @method('delete')
        </form>
    </div>
</main>
@endsection
