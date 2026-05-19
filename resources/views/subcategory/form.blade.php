@extends('layouts.app')
@section('title', 'Subcategory Form')
@section('content')

<main class="p-6">

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow space-y-6">

    <!-- TITLE -->
    <div>
        <h2 class="text-xl font-semibold">Subcategory Details</h2>
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
    <form class="space-y-5" action="{{ $subcategory && $subcategory->id ? route('subcategory.update', $subcategory->id) : route('subcategory.store') }}" method="POST">

        @csrf
        <!-- HIDDEN ID -->
        <input type="hidden" name="id" value="{{ $subcategory->id ?? '' }}">

        <!-- CATEGORY -->
        <div>
            <label class="block text-sm font-medium mb-1">Category</label>
            <select class="w-full border rounded-lg px-3 py-2" name="category_id">
                <option value="">Select a Category</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}" {{ $subcategory && $subcategory->category_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- SUBCATEGORY NAME -->
        <div>
            <label class="block text-sm font-medium mb-1">Subcategory Name</label>
            <input type="text"
                class="w-full border rounded-lg px-3 py-2"
                name="name"
                value="{{ $subcategory->name ?? '' }}"
                placeholder="e.g. Cement">
        </div>

        <!-- DESCRIPTION -->
        <div>
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea rows="3"
                class="w-full border rounded-lg px-3 py-2"
                name="description"
                value="{{ $subcategory->description ?? '' }}"
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
                Save Subcategory
            </button>
            
                <a href="{{ route('subcategory.list') }}" class="bg-blue-500 text-white px-5 py-2.5 rounded-xl">
                Back
            </a>


        </div>

    </form>

</div>

</main>
@endsection
