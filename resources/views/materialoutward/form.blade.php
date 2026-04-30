@extends('layouts.app')
@section('title', 'Material Outward Entry')
@section('content')

<main class="max-w-7xl mx-auto p-6 space-y-6">

<!-- HEADER CARD -->
<div class="bg-white rounded-2xl shadow border overflow-hidden">
    @if (session()->has('error'))
        <div class="p-4 mx-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200" role="alert">
            <ul class="mt-2 list-disc list-inside">
                <li>{{ session('error') }}</li>
            </ul>
        </div>
    @endif
    @if ($errors->any())
    <div class="p-4 mx-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200" role="alert">
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="px-6 py-4 border-b flex justify-between items-center">
        <h1 class="text-xl font-semibold">
            Material Outward Entry
        </h1>

        <div class="text-sm text-slate-500">
            Doc # <strong>{{ $item->outward_no }}</strong>
        </div>
    </div>

    <form action="{{ route('materialoutward.update', $item->id) }}" method="post">
        <div class="p-6 grid md:grid-cols-4 gap-4">
            @csrf
            <div>
                <label class="block mb-1 text-sm font-medium">
                    Date
                </label>
                <input type="date" id="out_date" name="out_date" value="{{ $item->out_date }}" class="w-full border rounded-xl p-2.5">
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium">Vendor</label>
                <select class="w-full border rounded-xl p-2.5" id="vendor_id" name="vendor_id">
                    <option value="">Select Vendor</option>
                    @foreach($vendors as $vendor)
                    <option value="{{ $vendor->id }}" {{ $vendor->id == $item->vendor_id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium">Warehouse</label>
                <select class="w-full border rounded-xl p-2.5" id="warehouse_id" name="warehouse_id">
                    <option value="">Select Warehouse</option>
                    @foreach($warehouses as $warehouse)
                    <option value="{{ $warehouse->id }}" {{ $warehouse->id == $item->warehouse_id ? 'selected' : '' }}>{{ $warehouse->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium">Manual Outward No</label>
                <input id="manual_outward_no" name="manual_outward_no" value="{{ $item->manual_outward_no }}" class="w-full border rounded-xl p-2.5">
            </div>
        </div>
        <div class="px-6">
            <div>
                <label class="block mb-1 text-sm font-medium">
                    Remarks
                </label>
                <textarea id="remarks" name="remarks" class="w-full border rounded-xl p-2.5">{{ $item->remarks }}</textarea>
            </div>
        </div>
        <div class="px-6 py-6">
            <button id="saveInward" type="submit" class="bg-blue-600 text-white px-5 py-2.5 rounded-xl">
                Save Item
            </button>
            <button type="button" onclick="resetForm()" class="bg-slate-200 px-5 py-2.5 rounded-xl">
                Clear
            </button>
        </div>
    </form>
</div>

<!-- ITEM ENTRY CARD -->
<div class="bg-white rounded-2xl shadow border overflow-visible">
    <div class="px-6 py-4 border-b font-semibold">
        Add /  Edit Item
    </div>

    <div class="p-6">
        <!-- item editor -->
        <form action="{{ route('materialoutward.items.store') }}" method="post">
            @csrf
            <input type="hidden" id="item_id" name="item_id" value="">
            <input type="hidden" id="material_id" name="material_id" value="{{ $item->id }}">
            <input type="hidden" id="material_outward_id" name="material_outward_id" value="{{ $item->id }}">

            <div class="grid md:grid-cols-12 gap-4 items-end">

            <div class="md:col-span-5 relative">
                <label class="block text-sm mb-1">Material</label>

                <input id="material_search" name="material_name" autocomplete="on" placeholder="Search material" class="w-full border rounded-xl p-2.5">

                <div id="searchResults" style="z-index: 100;"
                    class="hidden absolute top-full left-0 right-0 bg-white border rounded-xl shadow mt-1 max-h-60 overflow-y-scroll z-50">
                </div>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm mb-1">Qty</label>
                <input id="qty" name="quantity" value="1.00" type="number" class="w-full border rounded-xl p-2.5">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm mb-1">Rate</label>
                <input id="rate" name="rate" value="0.00" type="number" class="w-full border rounded-xl p-2.5">
            </div>

            <div class="md:col-span-3 flex gap-3">
                <button type="submit" id="saveItem" class="bg-blue-600 text-white px-5 py-2.5 rounded-xl w-full">
                    Add Item
                </button>

                <button
                    type="button"
                    onclick="resetItemForm()"
                    class="bg-slate-200 px-5 py-2.5 rounded-xl">
                    Clear
                </button>
            </div>
        </form>
    </div>
</div>
</div>


<!-- GRID -->
<div class="bg-white rounded-2xl shadow border overflow-visible z-0">

<div class="px-6 py-4 border-b flex justify-between items-center">
    <h2 class="font-semibold">
        Items
    </h2>

    <div class="font-semibold">
        Total: ₹ <span id="grandTotal">0.00</span>
    </div>
</div>

<div class="overflow-auto">
    <table class="w-full text-sm">
        <thead class="bg-slate-50">
            <tr>
                <th class="text-left p-4">Material</th>
                <th class="text-left p-4">Qty</th>
                <th class="text-left p-4">Rate</th>
                <th class="text-left p-4">Amount</th>
                <th class="text-left p-4">Action</th>
            </tr>
        </thead>

        <tbody id="itemTableBody">
            @foreach ($items as $inwardItems)
            <tr class="border-t" id="itemRow_{{ $inwardItems->id }}">
                <td class="p-4" id="material_name_{{ $inwardItems->id }}">
                    <span id="item_id_{{ $inwardItems->id }}" class="hidden">{{ $inwardItems->id }}</span>
                    <span id="material_id_{{ $inwardItems->id }}" class="hidden">{{ $inwardItems->material_id }}</span>
                    {{ $inwardItems->material_name }}
                </td>
                <td class="p-4" id="quantity_{{ $inwardItems->id }}">
                    {{ $inwardItems->quantity }}
                </td>
                <td class="p-4" id="rate_{{ $inwardItems->id }}">
                    {{ $inwardItems->rate }}
                </td>
                <td class="p-4" id="amount_{{ $inwardItems->id }}">
                    {{ $inwardItems->amount }}
                </td>
                <td class="p-4">
                    <button type="button" onclick="editItem({{ $inwardItems->id }})" class="bg-blue-600 text-white px-2 py-1 rounded-full">
                        Edit
                    </button>
                    <button type="button" onclick="deleteItem({{ $inwardItems->id }})" class="bg-red-600 text-white px-2 py-1 rounded-full">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <form id="delete_item_form" method="post">
        @csrf
    </form>
</div>

</div>

</main>
@endsection
@section('scripts')
    <script>

    const materialOutwardId = 1; // current header id

    const csrf = document.querySelector(
        'meta[name="csrf-token"]'
    ).content;


    /* ----------------------
    Temporary local dataset
    replace with ajax search
    -----------------------*/

    // const materials=[
    //     {id:1,name:'r OPC'},
    //     {id:2,name:'Steel TMT 12mm'},
    //     {id:3,name:'River Sand'},
    //     {id:4,name:'Concrete Block'}
    // ];

    let Obj = @json($materials);

    let materials = Object.entries(Obj).map(([id,name])=>({
        id,
        name:name
    }));
    console.log(materials);
    let items=[];

    /* =====================
    AUTOCOMPLETE
    ===================== */

    const searchInput=document.getElementById('material_search');
    const searchResults=document.getElementById('searchResults');
    const material_id=document.getElementById('material_id');
    const qty=document.getElementById('qty');
    const rate=document.getElementById('rate');

    const item_id=document.getElementById('item_id');
    const delete_id=document.getElementById('delete_id');
    const delete_item_form=document.getElementById('delete_item_form');

    searchInput.addEventListener(
        'input',
        function() {

            let q = this.value.toLowerCase();

            if(!q){
                searchResults.classList.add('hidden');
                return;
            }

            let found=materials.filter(m=>
                m.name.toLowerCase().includes(q)
            );

            searchResults.innerHTML='';

            found.forEach(m => {
                let row=document.createElement('div');
                row.className='p-3 hover:bg-slate-100 cursor-pointer';
                row.innerText=m.name;
                row.onclick=()=>selectMaterial(m);
                searchResults.appendChild(row);
            });

            searchResults.classList.remove('hidden');
        }
    );

    function selectMaterial(m) {
        material_id.value=m.id;
        searchInput.value=m.name;
        searchResults.classList.add('hidden');
    }

    /* =====================
    SAVE / UPDATE ITEM
    ===================== */

    function editItem (id) {
        let item_id1 = document.getElementById(`item_id_${id}`).innerText;
        let material_id = document.getElementById(`material_id_${id}`).innerText;
        let material_name = document.getElementById(`material_name_${id}`).innerText;
        let qty1 = document.getElementById(`quantity_${id}`).innerText;
        let rate1 = document.getElementById(`rate_${id}`).innerText;
        let amount = document.getElementById(`amount_${id}`).innerText;

        item_id.value=item_id1;
        material_id.value=material_id;
        searchInput.value=material_name;
        qty.value=qty1;
        rate.value=rate1;

        document.getElementById('saveItem').innerText='Update Item';
        window.scrollTo({top:0,behavior:'smooth'});
    }

    /* =====================
    DELETE
    ===================== */

    async function deleteItem (id) {
        if (!confirm('Delete item?')) return;
        console.log(id);
        try {
            delete_item_form.action = '/materialoutward/items/'+id+'/destroy';
            await delete_item_form.submit();
        } catch(e){
            console.error(e);
        }
    }

    /* =====================
    RESET
    ===================== */

    function resetItemForm () {
        item_id.value='';
        material_id.value='';
        searchInput.value='';
        qty.value='';
        rate.value='';
        searchInput.value='';

        document.getElementById('saveItem').innerText='Add Item';
    }

</script>
@endsection
