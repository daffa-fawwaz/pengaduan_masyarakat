<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Response Pengaduan</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="/assets/js/init-alpine.js"></script>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        {{-- SIDEBAR --}}
        @include('includes.sidebar')
        {{-- SIDEBAR --}}
        <div class="flex flex-col flex-1 w-full">
            {{-- HEADER --}}
            @include('includes.navbar')
            {{-- HEADER --}}
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <div class="w-full bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4">Response Pengaduan</h2>

                        <!-- Menampilkan data pengaduan -->
                        <div class="mb-4 text-gray-700 dark:text-gray-300">
                            <p><strong>Nama:</strong> {{ $complaint->guest_name }}</p>
                            <p><strong>Telepon:</strong> {{ $complaint->guest_telp }}</p>
                            <p><strong>Judul:</strong> {{ $complaint->title }}</p>
                            <p><strong>Deskripsi:</strong> {{ $complaint->description }}</p>
                        </div>

                        <!-- Form untuk mengirim response -->
                        <form action="{{ route('dashboard.admin.store', $complaint->id) }}" method="POST">
                            @csrf
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Response
                                Admin:</label>
                            <textarea name="response" rows="4"
                                class="w-full px-4 py-2 mt-1 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-gray-300 focus:ring focus:ring-purple-500"
                                required></textarea>

                            <label class="block mt-4 text-sm font-medium text-gray-700 dark:text-gray-300">Ubah Status
                                Pengaduan:</label>
                            <select name="status"
                                class="w-full px-4 py-2 mt-1 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-gray-300 focus:ring focus:ring-purple-500">
                                <option value="proses" {{ $complaint->status === 'proses' ? 'selected' : '' }}>Proses
                                </option>
                                <option value="selesai" {{ $complaint->status === 'selesai' ? 'selected' : '' }}>Selesai
                                </option>
                            </select>

                            <button type="submit"
                                class="mt-4 w-full px-4 py-2 font-medium text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:ring focus:ring-purple-500">
                                Kirim Response
                            </button>
                        </form>

                        <!-- Notifikasi sukses -->
                        @if (session('success'))
                            <p class="mt-4 text-green-500 dark:text-green-400">{{ session('success') }}</p>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
