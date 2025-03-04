@include('includes.header')

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
                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4">Detail Pengaduan</h2>
                        <p class="text-gray-700 dark:text-gray-300"><strong>Judul:</strong> {{ $response->title }}</p>
                        <p class="text-gray-700 dark:text-gray-300"><strong>Deskripsi:</strong>
                            {{ $response->description }}</p>
                        <p class="text-gray-700 dark:text-gray-300"><strong>Status:</strong> <span class="text-red-500">
                                {{ $response->status }}</span></p>

                        <h3 class="mt-6 text-lg font-semibold text-gray-700 dark:text-gray-200">Response dari Admin</h3>
                        <div class="mt-4 space-y-4">
                            @foreach ($response->response as $r)
                                <div
                                    class="p-4 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                                    <p class="text-gray-800 dark:text-gray-300"><strong>Admin:</strong>
                                        {{ $r->user->name }}</p>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $r->response }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $r->created_at->diffForHumans() }}</p>
                                </div>
                            @endforeach
                            <!-- Tambahkan lebih banyak response jika ada -->
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
