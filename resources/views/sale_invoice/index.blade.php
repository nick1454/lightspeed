@extends('layouts.app')
@section('title', 'Sales Invoices')
@section('content')


<main class="p-6 space-y-6">

    <!-- TOP -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold">Sales Invoices</h2>

        <a href="{{ route('sale.invoice.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded">
           + Add Sales Invoice
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
                    <th class="px-4 py-3 text-left">Invoice Number</th>
                    <th class="px-4 py-3 text-left">Client</th>
                    <th class="px-4 py-3 text-left">Invoice Date</th>
                    <th class="px-4 py-3 text-left">Due Date</th>
                    <th class="px-4 py-3 text-left">Total</th>
                    <th class="px-4 py-3 text-right">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($saleInvoices as $item)
                <tr class="border-t">
                    <td class="px-4 py-3">{{ $item->invoice_number }}</td>
                    <td class="px-4 py-3">{{ $item->client?->name }}</td>
                    <td class="px-4 py-3">{{ $item->invoice_date }}</td>
                    <td class="px-4 py-3">{{ $item->due_date }}</td>
                    <td class="px-4 py-3">{{ $item->total }}</td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <a href="{{ route('sale.invoice.edit', $item->id) }}" title="Edit" class="text-blue-600">Edit</a>
                        <button onclick="deleteItem('{{ $item->invoice_number }}','{{ route("sale.invoice.destroy", $item->id) }}')" class="text-red-600">Delete</button>
                    </td>
                </tr>
                @foreach($saleInvoices as $saleInvoice)

                <tr>
                    <td>{{ $saleInvoice->client }}</td>

                    <td>
                        <form action="{{ route('sale.invoice.update', $saleInvoice->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>

                @endforeach
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
