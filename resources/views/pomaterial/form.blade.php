@extends('layouts.app')
@section('title', 'PO Material Form')
@section('content')

<main class="p-6">

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow space-y-6">

    <!-- TITLE -->
    <div>
        <h2 class="text-xl font-semibold">PO Material Details</h2>
        <p class="text-sm text-gray-500">Fill the details below</p>
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
    <!-- FORM -->
    <form class="space-y-5" action="{{ $item && $item->id ? route('pomaterial.update', $item->id) : route('pomaterial.store') }}" method="POST">

        @csrf
        <!-- HIDDEN ID -->
        <input type="hidden" name="id" value="{{ $item->id ?? '' }}">

        <!-- PO NUMBER -->
        <div>
            <label class="block text-sm font-medium mb-1">PO Number</label>
            <input type="text"
                class="w-full border rounded-lg px-3 py-2"
                name="name"
                value="{{ $item->po_number ?? '' }}"
                placeholder="Enter PO NUMBER">
        </div>

        <!-- VENDORS -->
        <div>
            <label class="block text-sm font-medium mb-1">Vendor</label>
            <select class="w-full border rounded-lg px-3 py-2" name="vendor_id">
                <option value="">Select a Vendor</option>
                @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->id }}" {{ $item && $item->vendor_id == $vendor->id ? 'selected' : '' }}>
                        {{ $vendor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- ORDER DATE -->
        <div>
            <label class="block text-sm font-medium mb-1">Order Date</label>
            <input type="date"
                class="w-full border rounded-lg px-3 py-2"
                name="order_date"
                value="{{ $item->order_date ?? '' }}"
                placeholder="Enter order date (YYYY-MM-DD)">
        </div>

        <!-- EXPECTED DATE -->
        <div>
            <label class="block text-sm font-medium mb-1">Expected Date</label>
            <input type="date"
                class="w-full border rounded-lg px-3 py-2"
                name="expected_date"
                value="{{ $item->expected_date ?? '' }}"
                placeholder="Enter expected date (YYYY-MM-DD)">
        </div>

        <!-- SUBTOTAL -->
        <div>
            <label class="block text-sm font-medium mb-1">Subtotal</label>
            <input type="number"
                class="w-full border rounded-lg px-3 py-2"
                name="subtotal"
                value="{{ $item->subtotal ?? '' }}"
                placeholder="Enter subtotal">
        </div>

        <!-- TAX -->
        <div>
            <label class="block text-sm font-medium mb-1">Tax</label>
            <input type="number"
                class="w-full border rounded-lg px-3 py-2"
                name="tax"
                value="{{ $item->tax ?? '' }}"
                placeholder="Enter tax">
        </div>

        <!-- TOTAL -->
                <div>
                    <label class="block text-sm font-medium mb-1">Total</label>
                    <input type="number"
                        class="w-full border rounded-lg px-3 py-2"
                        name="total"
                        value="{{ $item->total ?? '' }}"
                        placeholder="Enter total">
                </div>



        <!-- STATUS -->
                <div>
                    <label class="block text-sm font-medium mb-1">Status</label>
                    <input type="text"
                        class="w-full border rounded-lg px-3 py-2"
                        name="status"
                        value="{{ $item->status ?? '' }}"
                        placeholder="Enter status">
                </div>

                <!---NOTE -->
                <div>
                    <label class="block text-sm font-medium mb-1">Note</label>
                    <textarea
                        class="w-full border rounded-lg px-3 py-2"
                        name="note"
                        placeholder="Enter note">{{ $item->note ?? '' }}</textarea>
                </div>

        <!-- ACTIONS -->
        <div class="flex justify-end gap-3 pt-4 border-t">

            <a href="/po_materials/list"
               class="px-4 py-2 bg-gray-200 rounded-lg">
               Cancel
            </a>

            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg">
                {{ $item && $item->id ? 'Update' : 'Save' }} PO Material
            </button>

        </div>

    </form>

</div>

</main>
@endsection
