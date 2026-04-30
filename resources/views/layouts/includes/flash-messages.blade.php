<!-- FLASH MESSAGE -->
@if (session()->has($type))
<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200" role="alert">
    <ul class="mt-2 list-disc list-inside">
        <li>{{ session($type) }}</li>
    </ul>
</div>
@endif
