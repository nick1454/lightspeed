<!-- SIDEBAR -->
<aside id="sidebar"
    class="fixed md:static z-50 w-64 bg-white border-r h-full transform -translate-x-full md:translate-x-0 transition duration-300">

    <!-- LOGO -->
    <div class="p-4 border-b font-bold text-lg">
        <img src="{{ asset('logo.png') }}" alt="" width="120px">
    </div>

    <!-- MENU -->
    <nav class="p-3 space-y-2">
        <a class="flex items-center p-3 rounded hover:bg-gray-100" href="{{ route('dashboard') }}">
            <i class="fa fa-home w-5"></i>
            <span class="ml-3">Dashboard</span>
        </a>
        <!-- PROJECTS -->
        <div>
            <button onclick="toggleDropdown(this)"
                class="flex justify-between items-center w-full p-3 rounded hover:bg-gray-100">

                <div class="flex items-center">
                    <i class="fa fa-building w-5"></i>
                    <span class="ml-3">PO</span>
                </div>

                <i class="fa fa-chevron-down transition"></i>
            </button>

            <div class="dropdown hidden ml-8 space-y-2">
                <a class="block py-1 text-sm text-gray-600 hover:text-black" href="{{ route('po.supplier.list') }}"> PO Suppliers</a>
                <a class="block py-1 text-sm text-gray-600 hover:text-black" href="{{ route('po.job.work.list') }}"> PO Job Works</a>
            </div>
        </div>

        <!-- STOCKS -->
        <div>
            <button onclick="toggleDropdown(this)"
                class="flex justify-between items-center w-full p-3 rounded hover:bg-gray-100">

                <div class="flex items-center">
                    <i class="fa fa-building w-5"></i>
                    <span class="ml-3">Stocks</span>
                </div>

                <i class="fa fa-chevron-down transition"></i>
            </button>

            <div class="dropdown hidden ml-8 space-y-2">
                <a class="block py-1 text-sm text-gray-600 hover:text-black" href="{{ route('materialinward.list') }}">Material Inwards</a>
                <a class="block py-1 text-sm text-gray-600 hover:text-black" href="{{ route('materialoutward.list') }}">Material Outwards</a>
            </div>
        </div>

        <!-- MASTERS-->
        <div>
            <button onclick="toggleDropdown(this)"
                class="flex justify-between items-center w-full p-3 rounded hover:bg-gray-100">

                <div class="flex items-center">
                    <i class="fa fa-building w-5"></i>
                    <span class="ml-3">Masters</span>
                </div>

                <i class="fa fa-chevron-down transition"></i>
            </button>

            <div class="dropdown hidden ml-8 space-y-2">
                <a class="block py-1 text-sm text-gray-600 hover:text-black" href="{{ route('category.list') }}">Categories</a>
                <a class="block py-1 text-sm text-gray-600 hover:text-black" href="{{ route('subcategory.list') }}">Subcategories</a>
                <a class="block py-1 text-sm text-gray-600 hover:text-black" href="{{ route('unit.list') }}">Units</a>
                <a class="block py-1 text-sm text-gray-600 hover:text-black" href="{{ route('brand.list') }}">Brands</a>
                <a class="block py-1 text-sm text-gray-600 hover:text-black" href="{{ route('size.list') }}">Sizes</a>
                <a class="block py-1 text-sm text-gray-600 hover:text-black" href="{{ route('vendor.list') }}">Vendors</a>
                <a class="block py-1 text-sm text-gray-600 hover:text-black" href="{{ route('warehouse.list') }}">Warehouses</a>
                <a class="block py-1 text-sm text-gray-600 hover:text-black" href="{{ route('material.list') }}">Materials</a>
            </div>
        </nav>
    </aside>
