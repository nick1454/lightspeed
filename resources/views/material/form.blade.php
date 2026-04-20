@extends('layouts.app')
@section('title', 'Material Form')
@section('content')

<main class="p-6 overflow-y-scroll">

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow space-y-6">

    <!-- TITLE -->
    <div>
        <h2 class="text-xl font-semibold">Material Details</h2>
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
    <form class="space-y-5" action="{{ $item && $item->id ? route('material.update', $item->id) : route('material.store') }}" method="POST">

        @csrf
        <!-- HIDDEN ID -->
        <input type="hidden" name="id" value="{{ $item->id ?? '' }}">

        <!-- MATERIAL NAME -->
        <div>
            <label class="block text-sm font-medium mb-1">Material Name</label>
            <input type="text"
                class="w-full border rounded-lg px-3 py-2"
                name="name"
                value="{{ $item->name ?? '' }}"
                placeholder="Enter material name">
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
                <!-- category -->
        <div>
            <label class="block text-sm font-medium mb-1">Category</label>
            <select class="w-full border rounded-lg px-3 py-2" name="category_id">
                <option>Select Category</option>
                @foreach ($categories ?? [] as $category)
                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- subcategory -->
        <div>
            <label class="block text-sm font-medium mb-1">SubCategory</label>
            <select class="w-full border rounded-lg px-3 py-2" name="subcategory_id">
                <option>Select Sub Category</option>
                @foreach ($subcategories ?? [] as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ $item->subcategory_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- Brand -->
        <div>
            <label class="block text-sm font-medium mb-1">Brand</label>
            <select class="w-full border rounded-lg px-3 py-2" name="brand_id">
                <option>Select Brand</option>
                @foreach ($brands ?? [] as $brand)
                    <option value="{{ $brand->id }}" {{ $item->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Size -->
        <div>
            <label class="block text-sm font-medium mb-1">Size</label>
            <select class="w-full border rounded-lg px-3 py-2" name="size_id">
                <option>Select Size</option>
                @foreach ($sizes ?? [] as $size)
                    <option value="{{ $size->id }}" {{ $item->size_id == $size->id ? 'selected' : '' }}>{{ $size->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- Unit -->
        <div>
            <label class="block text-sm font-medium mb-1">Unit</label>
            <select class="w-full border rounded-lg px-3 py-2" name="unit_id">
                <option>Select Unit</option>
                @foreach ($units ?? [] as $unit)
                    <option value="{{ $unit->id }}" {{ $item->unit_id == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- ACTIONS -->
        <div class="flex justify-end gap-3 pt-4 border-t">

            <a href="/material/list"
               class="px-4 py-2 bg-gray-200 rounded-lg">
               Cancel
            </a>

            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg">
                {{ $item && $item->id ? 'Update' : 'Save' }} Material
            </button>

        </div>

    </form>

</div>

</main>
@endsection
