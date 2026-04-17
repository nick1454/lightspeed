@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
        <!-- CONTENT -->
        <main class="flex-1 p-6 overflow-y-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                <div class="bg-white p-4 rounded shadow">
                    <p class="text-gray-500">Projects</p>
                    <p class="text-2xl font-bold">12</p>
                </div>

                <div class="bg-white p-4 rounded shadow">
                    <p class="text-gray-500">Stock Value</p>
                    <p class="text-2xl font-bold">₹5.4L</p>
                </div>

                <div class="bg-white p-4 rounded shadow">
                    <p class="text-gray-500">Issues</p>
                    <p class="text-2xl font-bold">8</p>
                </div>

            </div>

        </main>
@endsection
