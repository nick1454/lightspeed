@extends('layouts.app')
@section('title', 'Client Form')
@section('content')

<main class="p-6">

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow space-y-6">

    <!-- TITLE -->
    <div>
        <h2 class="text-xl font-semibold">Client Details</h2>
        <p class="text-sm text-gray-500">Fill the details below</p>
    </div>

    @if (session()->has('error') || session()->has('success'))
        <div class="p-4 mx-4 mt-4 text-sm border @if (session()->has('error')) bg-red-50 border-red-200 @else bg-green-50 border-green-200 @endif rounded-lg"
            role="alert"
        >
            <ul class="list-none list-inside">
                <li>{{ session('error') }} {{ session('success') }}</li>
            </ul>
        </div>
    @endif

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
    <form class="space-y-5" action="{{ $item && $item->id ? route('client.update', $item->id) : route('client.store') }}" method="POST">
        @csrf
        <!-- HIDDEN ID -->
        <input type="hidden" name="id" value="{{ $item->id ?? '' }}">

        <!-- CLIENT NAME -->
        <div>
            <label class="block text-sm font-medium mb-1">Name</label>
            <input type="text"
                class="w-full border rounded-lg px-3 py-2"
                name="name"
                value="{{ $item->name ?? '' }}"
                placeholder="Enter name">
        </div>
        <!-- CLIENT EMAIL -->
        <div>
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email"
                class="w-full border rounded-lg px-3 py-2"
                name="email"
                value="{{ $item->email ?? '' }}"
                placeholder="Enter email">
        </div>
        <!-- CLIENT PHONE -->
        <div>
            <label class="block text-sm font-medium mb-1">Phone</label>
            <input type="text"
                class="w-full border rounded-lg px-3 py-2"
                name="phone"
                value="{{ $item->phone ?? '' }}"
                placeholder="Enter phone">
        </div>
        <!-- CLIENT ADDRESS -->
        <div>
            <label class="block text-sm font-medium mb-1">Address</label>
            <textarea rows="3"
                name="address"
                value="{{ $item->address ?? ''  }}"
                class="w-full border rounded-lg px-3 py-2"
                placeholder="Enter address"></textarea>
        </div>

        <!-- ACTIONS -->
        <div class="flex justify-end gap-3 pt-4 border-t">

            <a href="/vendors/list"
               class="px-4 py-2 bg-gray-200 rounded-lg">
               Cancel
            </a>

            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg">
                {{ $item && $item->id ? 'Update' : 'Save' }} Vendor
            </button>

        </div>

    </form>

</div>

</main>
@endsection
