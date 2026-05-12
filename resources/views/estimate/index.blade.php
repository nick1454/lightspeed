@extends('layouts.app')
@section('title', 'Estimate List')
@section('content')

<main class="p-6 space-y-6">
    <!-- TOP -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold">@yield('title')</h2>

        <a href="/estimate/form"
           class="bg-blue-600 text-white px-4 py-2 rounded">
           + Add Estimate
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
                        <input id="start-date" type="date" placeholder="From Date" class="px-2 py-2 border border-gray-300 rounded-md">
                        <input id="end-date" type="date" placeholder="To Date" class="px-2 py-2 border border-gray-300 rounded-md">
                        <input type="text" placeholder="Inward No" class="px-2 py-2 border border-gray-300 rounded-md">
                        <input type="text" placeholder="Vendor No" class="px-2 py-2 border border-gray-300 rounded-md">
                        <input type="text" placeholder="Vendor" class="px-2 py-2 border border-gray-300 rounded-md">
                        <input type="text" placeholder="Warehouse" class="px-2 py-2 border border-gray-300 rounded-md">
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
                    <th class="px-4 py-3 text-left">Estimate No</th>
                    <th class="px-4 py-3 text-left">Date</th>
                    <th class="px-4 py-3 text-left">client</th>
                    <th class="px-4 py-3 text-left">Amount</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-right">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                <tr class="border-t">
                    <td class="px-4 py-3">{{ $item->estimate_no }}</td>
                    <td class="px-4 py-3">{{ $item->estimate_date }}</td>
                    <td class="px-4 py-3">{{ $item->client->name ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $item->total_amount ?? '-' }}</td>
                    <td class="px-4 py-3">
                        <form action="{{ route('estimate.changeStatus', $item->id) }}" method="post">
                            @csrf
                            @method('post')
                            @if (strtolower($item->status) == 'draft')
                            <button
                                class="px-2 py-1 bg-green-500 text-white rounded"
                                type="submit"
                                name="status"
                                value="approved">
                                Approve
                            </button>
                            <button
                                class="px-2 py-1 bg-red-500 text-white rounded"
                                type="submit"
                                name="status"
                                value="rejected">
                                Reject
                            </button>
                            @elseif (strtolower($item->status) == 'approved')
                            <span class="px-2 py-1 rounded-md bg-green-500">Approved</span>
                            @elseif (strtolower($item->status) == 'rejected')
                            <span class="px-2 py-1 rounded-md bg-red-500">Rejected</span>
                            @endif
                        </form>
                    </td>
                    <td class="px-4 py-3 text-right space-x-2">
                        @if (strtolower($item->status) == 'approved')
                        <form action="{{ route('estimate.makeJobWorkPo', $item->id) }}" method="post">
                            @csrf
                            @method('post')
                            <button type="submit" class="text-blue-600" target="_blank">Make Po</button>
                        </form>
                        @endif
                        <a href="{{ route('estimate.print', $item->id) }}" title="Print" class="text-blue-600" target="_blank">Print</a>
                        <a href="{{ route('estimate.edit', $item->id) }}" title="Edit" class="text-blue-600">Edit</a>
                        <button onclick="deleteItem('{{ $item->id }}','{{ route('estimate.destroy', $item->id) }}')" class="text-red-600">Delete</button>
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

