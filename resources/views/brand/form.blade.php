@extends('layouts.app')
@section('title', 'Brand Form')
@section('content')

<main class="p-6">

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow space-y-6">

    <!-- TITLE -->
    <div>
        <h2 class="text-xl font-semibold">Brand Details</h2>
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
    <form class="space-y-5" action="{{ $item && $item->id ? route('brand.update', $item->id) : route('brand.store') }}" method="POST">

        @csrf
        <!-- HIDDEN ID -->
        <input type="hidden" name="id" value="{{ $item->id ?? '' }}">

        <!-- BRAND NAME -->
        <div>
            <label class="block text-sm font-medium mb-1">Brand Name</label>
            <input type="text"
                class="w-full border rounded-lg px-3 py-2"
                name="name"
                value="{{ $item->name ?? '' }}"
                placeholder="Enter brand name">
        </div>

        <!-- DESCRIPTION -->
        <div>
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea rows="3"
                class="w-full border rounded-lg px-3 py-2"
                name="description"
                value="{{ $item->description ?? '' }}"
                placeholder="Enter description"></textarea>
        </div>

        <!-- ACTIONS -->
        <div class="flex justify-end gap-3 pt-4 border-t">

            <a href="/subcategories"
               class="px-4 py-2 bg-gray-200 rounded-lg">
               Cancel
            </a>

            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg">
                {{ $item && $item->id ? 'Update' : 'Save' }} Brand
            </button>

        </div>

    </form>

</div>

</main>
@endsection
