@extends('layouts.app')
@section('title', 'Create Category')
@section('content')
        <!-- CONTENT -->
        <main class="flex-1 p-6 overflow-y-auto">
            <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow space-y-6">
                <!-- TITLE -->
                <div>
                    <h2 class="text-xl font-semibold">Category Details</h2>
                    <p class="text-sm text-gray-500">Fill the details below</p>
                </div>
                <div>
                    @if ($errors->any())
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200" role="alert">
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <!-- FORM -->
                <form class="space-y-5" action="{{ $category && $category->id ? route('category.update', $category->id) : route('category.store') }}" method="post">
                    @csrf

                    <!-- HIDDEN ID -->
                    <input type="hidden" name="id">

                    <!-- CATEGORY NAME -->
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Category Name
                        </label>
                        <input type="text"
                            name="name"
                            value="{{ $category->name ?? '' }}"

                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500"
                            placeholder="e.g. Raw Material">
                    </div>

                    <!-- DESCRIPTION -->
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Description
                        </label>
                        <textarea
                            rows="3"
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter category description">
                        </textarea>
                    </div>

                    <!-- ACTIONS -->
                    <div class="flex justify-end gap-3 pt-4 border-t">

                        <a href="/categories"
                            class="px-4 py-2 bg-gray-200 rounded-lg">
                            Cancel
                        </a>

                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Create
                        </button>

                    </div>

                </form>

            </div>

        </main>
@endsection
