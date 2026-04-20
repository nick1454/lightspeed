<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title') | LightSpeed</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<link rel="icon" type="image/x-icon" href="{{ asset('fav.ico') }}">
</head>

<body class="bg-gray-100">

<div class="flex h-screen overflow-hidden">

    <!-- OVERLAY -->
    <div id="overlay" class="fixed inset-0 bg-black/40 hidden z-40 md:hidden"></div>

    @include('layouts.includes.sidebar')

    <!-- MAIN -->
    <div class="flex-1 flex flex-col">

        <!-- HEADER -->
        <header class="flex items-center justify-between bg-white border-b px-4 py-3">

            <!-- LEFT -->
            <div class="flex items-center space-x-3">
                <button class="md:hidden" onclick="toggleSidebar()">
                    <i class="fa fa-bars"></i>
                </button>
                <h1 class="font-semibold">@yield('title')</h1>
            </div>

            <!-- RIGHT -->
            <div class="relative">

                <!-- Avatar -->
                <button onclick="toggleAvatar()" class="flex items-center space-x-2">
                    <img src="https://i.pravatar.cc/40" class="w-8 h-8 rounded-full"/>
                    <i id="avatarCaret" class="fa fa-chevron-down text-xs transition"></i>
                </button>

                <!-- Dropdown -->
                <div id="avatarMenu"
                    class="absolute right-0 mt-2 w-44 bg-white border rounded shadow hidden">

                    <a class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                    <a class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                    <div class="border-t"></div>
                    <a class="block px-4 py-2 text-red-500 hover:bg-red-50">Logout</a>
                </div>

            </div>

        </header>

        @yield('content')

    </div>

</div>

<script>

// SIDEBAR TOGGLE
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
}

// DROPDOWN
function toggleDropdown(button) {
    const dropdown = button.nextElementSibling;
    const icon = button.querySelector('i:last-child');

    document.querySelectorAll('.dropdown').forEach(d => {
        if (d !== dropdown) d.classList.add('hidden');
    });

    dropdown.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
}

// AVATAR
function toggleAvatar() {
    const menu = document.getElementById('avatarMenu');
    const caret = document.getElementById('avatarCaret');

    menu.classList.toggle('hidden');
    caret.classList.toggle('rotate-180');
}

// CLOSE ON OUTSIDE CLICK
document.addEventListener('click', function(e) {
    const avatar = document.getElementById('avatarMenu');
    const btn = document.querySelector('[onclick="toggleAvatar()"]');

    if (!btn.contains(e.target) && !avatar.contains(e.target)) {
        avatar.classList.add('hidden');
        document.getElementById('avatarCaret').classList.remove('rotate-180');
    }
});


function deleteItem(name,route) {
    console.log('reaching');
    if (confirm('Are you sure you want to delete unit "' + name + '"?')) {
        document.getElementById('delete-form').action = route;
        document.getElementById('delete-form').submit();
    }
}

</script>

@yield('scripts')

</body>
</html>
