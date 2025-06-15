<!-- resources/views/partials/sidebar.blade.php -->
<div class="w-64 h-screen bg-blue-200 text-white p-6">
    <h1 class="text-2xl font-bold mb-6">CeBan</h1>
    <ul>
        <li class="mb-4"><a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a></li>
        <li class="mb-4"><a href="{{ route('admin.das') }}" class="hover:underline">Status DAS</a></li>
        <li class="mb-4"><a href="{{ route('admin.users') }}" class="hover:underline">Kelola Pengguna</a></li>
    </ul>
</div>
