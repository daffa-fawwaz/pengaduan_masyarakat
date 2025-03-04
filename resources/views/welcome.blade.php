<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white">
    <!-- Navbar -->
    <nav class="bg-gray-800 shadow-md">
        <div class="container mx-auto flex items-center justify-between p-4">
            <a href="#" class="flex items-center">
                <img src="image/logo.png" alt="Layanan Pengaduan" class="w-40">
            </a>
            <div class="hidden md:flex space-x-6">
                @if (Auth::check())
                    @if (Auth::user()->role === 'user')
                        <a href="/dashboard/user/complaints/create" class="text-gray-300 hover:text-white">Form
                            Pengaduan</a>
                    @endif
                @endif
                <a href="#" class="text-white font-semibold">Semua Pengaduan</a>
                <a href="/dashboard" class="text-gray-300 hover:text-white">Data Statistik</a>
            </div>
            @if (Auth::check())
                <div class="flex items-center space-x-4">
                    <span class="text-gray-300">👤 {{ Auth::user()->name }}</span>
                    <a href="/dashboard/{{ Auth::user()->role }}"
                        class="bg-green-600 px-4 py-2 rounded-md hover:bg-green-700">My
                        Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="bg-red-600 px-4 py-2 rounded-md hover:bg-red-700">Logout</button>
                    </form>
                </div>
            @else
                <a href="/login" class="bg-blue-600 px-4 py-2 rounded-md hover:bg-blue-700">Login</a>
            @endif
        </div>
    </nav>

    <!-- Konten -->
    <div class="container mx-auto mt-10">
        <h2 class="text-center text-2xl font-bold mb-6">Semua Pengaduan</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-700">
                <thead>
                    <tr class="bg-gray-800 text-gray-300">
                        <th class="py-3 px-4 text-left">Gambar</th>
                        <th class="py-3 px-4 text-left">Nama Pengadu</th>
                        <th class="py-3 px-4 text-left">Judul Pengaduan</th>
                        <th class="py-3 px-4 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-700 divide-y divide-gray-600">
                    @foreach ($complaints as $complaint)
                        <tr class="text-gray-300">
                            <td class="py-3 px-4">
                                <img src="{{ asset('storage/' . $complaint->image) }}" alt=""
                                    class="w-16 h-16 object-cover rounded-md">
                            </td>
                            <td class="py-3 px-4">
                                <p class="font-semibold">{{ $complaint->guest_name }}</p>
                                <p class="text-sm text-gray-400">{{ $complaint->guest_telp }}</p>
                            </td>
                            <td class="py-3 px-4 font-semibold">{{ $complaint->title }}</td>
                            <td class="py-3 px-4">
                                @if ($complaint->status == 'pending')
                                    <span class="px-3 py-1 text-red-700 bg-red-200 rounded-full">Pending</span>
                                @elseif ($complaint->status == 'proses')
                                    <span class="px-3 py-1 text-gray-700 bg-gray-200 rounded-full">Proses</span>
                                @elseif ($complaint->status == 'selesai')
                                    <span class="px-3 py-1 text-green-700 bg-green-200 rounded-full">Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $complaints->links() }}
        </div>
    </div>
</body>

</html>
