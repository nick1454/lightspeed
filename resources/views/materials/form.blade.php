@extends('layouts.app')
@section('title', 'Create Material')

@section('content')
        <!-- CONTENT -->
        <main class="flex-1 p-6 overflow-y-auto">

            <div class="max-w-3xl bg-white p-6 rounded-xl shadow space-y-6">

                <!-- TITLE -->
                <div>
                    <h2 class="text-xl font-semibold">Material Details</h2>
                    <p class="text-sm text-gray-500">Fill the details below</p>
                </div>

                <!-- FORM -->
                <form class="space-y-5">

                    <!-- HIDDEN ID -->
                    <input type="hidden" name="id">

                    <!-- NAME -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Material Name</label>
                        <input type="text"
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500"
                            placeholder="Cement OPC">
                    </div>

                    <!-- GRID -->
                    <div class="grid md:grid-cols-2 gap-4">

                        <div>
                            <label class="block text-sm font-medium mb-1">Category</label>
                            <select class="w-full border rounded-lg px-3 py-2">
                                <option>Select Category</option>
                                <option>Raw Material</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Subcategory</label>
                            <select class="w-full border rounded-lg px-3 py-2">
                                <option>Select Subcategory</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Brand</label>
                            <input type="text" class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Unit</label>
                            <select class="w-full border rounded-lg px-3 py-2">
                                <option>Select Unit</option>
                                <option>Kg</option>
                                <option>Bag</option>
                                <option>Ton</option>
                                <option>Nos</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Size</label>
                            <input type="text" class="w-full border rounded-lg px-3 py-2">
                        </div>

                    </div>

                    <!-- ACTIONS -->
                    <div class="flex justify-end gap-3 pt-4 border-t">

                        <a href="/materials"
                            class="px-4 py-2 bg-gray-200 rounded-lg">
                            Cancel
                        </a>

                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Save Material
                        </button>

                    </div>

                </form>

            </div>

        </main>
@endsection
