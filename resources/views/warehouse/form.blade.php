@extends('layouts.app')
@section('title', 'Warehouse Form')
@section('content')

<main class="p-6">

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow space-y-6">

    <!-- TITLE -->
    <div>
        <h2 class="text-xl font-semibold">Warehouse Details</h2>
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
    <form class="space-y-5" action="{{ $item && $item->id ? route('warehouse.update', $item->id) : route('warehouse.store') }}" method="POST">

        @csrf
        <!-- HIDDEN ID -->
        <input type="hidden" name="id" value="{{ $item->id ?? '' }}">

        <!-- WAREHOUSE NAME -->
        <div>
            <label class="block text-sm font-medium mb-1">Name</label>
            <input type="text"
                class="w-full border rounded-lg px-3 py-2"
                name="name"
                value="{{ $item->name ?? '' }}"
                placeholder="Enter name">
        </div>
        <!-- WAREHOUSE LOCATION -->
        <div>
            <label class="block text-sm font-medium mb-1">Location</label>
            <input type="text"
                class="w-full border rounded-lg px-3 py-2"
                name="location"
                value="{{ $item->location ?? '' }}"
                placeholder="Enter location">
        </div>
        <!-- WAREHOUSE CONTACT -->
        <div>
            <label class="block text-sm font-medium mb-1">Contact</label>
            <input type="text"
                class="w-full border rounded-lg px-3 py-2"
                name="contact"
                value="{{ $item->contact ?? '' }}"
                placeholder="Enter contact">
        </div>
        <!-- DESCRIPTION -->
        <div>
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea rows="3"
                name="description"
                class="w-full border rounded-lg px-3 py-2"
                placeholder="Enter description">{{ $item->description ?? ''  }}</textarea>
        </div>


        <!-- ADDRESS -->
                <div>
                    <label class="block text-sm font-medium mb-1">Address</label>
                    <textarea rows="3"
                        name="address"
                        class="w-full border rounded-lg px-3 py-2"
                        placeholder="Enter address">{{ $item->address ?? ''  }}</textarea>
                </div>



        <!-- ACTIONS -->
        <div class="flex justify-end gap-3 pt-4 border-t">

            <a href="/warehouses/list"
               class="px-4 py-2 bg-gray-200 rounded-lg">
               Cancel
            </a>

            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg">
                {{ $item && $item->id ? 'Update' : 'Save' }} Warehouse
            </button>

        </div>

    </form>

</div>

</main>
@endsection
