@extends('layouts.app')
@section('title', 'Unit Form')

@section('content')
<main class="p-6">

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow space-y-6">
    <!-- TITLE -->
    <div>
        <h2 class="text-xl font-semibold">Unit Details</h2>
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
    <form class="space-y-5" action="{{ $unit && $unit->id ? route('unit.update', $unit->id) : route('unit.store') }}" method="post">
        @csrf

        <!-- HIDDEN ID -->
        <input type="hidden" name="id" value="{{ $unit->id ?? ''  }}">

        <!-- UNIT NAME -->
        <div>
            <label class="block text-sm font-medium mb-1">Unit Name</label>
            <input type="text"
                name="name"
                value="{{ $unit->name ?? ''  }}"
                class="w-full border rounded-lg px-3 py-2"
                placeholder="Enter unit name">
        </div>

        <!-- SHORT NAME -->
        <div>
            <label class="block text-sm font-medium mb-1">Short Name</label>
            <input type="text"
                name="short_name"
                value="{{ $unit->short_name ?? ''  }}"
                class="w-full border rounded-lg px-3 py-2"
                placeholder="Enter short name">
        </div>

        <!-- DESCRIPTION -->
        <div>
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea rows="3"
                name="description"
                value="{{ $unit->description ?? ''  }}"
                class="w-full border rounded-lg px-3 py-2"
                placeholder="Enter description"></textarea>
        </div>

        <!-- ACTIONS -->
        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="/unit/list"
               class="px-4 py-2 bg-gray-200 rounded-lg">
               Cancel
            </a>

            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg">
                {{ $unit && $unit->id ? 'Update' : 'Create' }}
            </button>

           <a href="/unit/list"
               class="px-4 py-2 bg-gray-200 rounded-lg">
               Back
            </a>

        </div>

    </form>

</div>

</main>

@endsection
