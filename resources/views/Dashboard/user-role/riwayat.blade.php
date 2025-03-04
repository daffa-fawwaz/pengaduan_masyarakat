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
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Riwayat Pengaduan Anda
                    </h2>

                    @if (session()->has('success'))
                        <div class="mb-4 flex items-center justify-between rounded-lg bg-green-100 px-4 py-3 text-sm text-green-700 dark:bg-green-800 dark:text-green-200"
                            role="alert">
                            <span>{{ session('success') }}</span>
                            <button type="button"
                                class="ml-2 text-green-700 hover:text-green-900 dark:text-green-200 dark:hover:text-green-400"
                                onclick="this.parentElement.remove();">
                                ✖
                            </button>
                        </div>
                    @endif

                </div>
                </a>
                <!-- Cards -->
                <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                    <!-- Card -->
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div
                            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Total clients
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                6389
                            </p>
                        </div>
                    </div>
                </div>

                <!-- New Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Gambar</th>
                                    <th class="px-4 py-3">Nama Pengadu</th>
                                    <th class="px-4 py-3">Judul Pengaduan</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Response</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                                @foreach ($complaints as $complaint)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm">
                                            <img src="{{ asset('storage/' . $complaint->image) }}" alt=""
                                                width="70">
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <!-- Avatar with inset shadow -->
                                                <div class="ml-4">
                                                    <p class="font-semibold">{{ $complaint->guest_name }}</p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                                        {{ $complaint->guest_telp }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            <p class="font-semibold">{{ $complaint->title }}</p>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            @if ($complaint->status == 'pending')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                    Pending
                                                </span>
                                            @elseif ($complaint->status == 'proses')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                                    Prosses
                                                </span>
                                            @elseif ($complaint->status == 'selesai')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    Selesai
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            @if ($complaint->status == 'selesai')
                                                <form action="{{ route('user.history.delete', $complaint->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button>Delete</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Charts -->
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Charts
                </h2>
                <div class="grid gap-6 mb-8 md:grid-cols-2">
                    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                            Revenue
                        </h4>
                        <canvas id="pie"></canvas>
                        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                            <!-- Chart legend -->
                            <div class="flex items-center">
                                <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
                                <span>Shirts</span>
                            </div>
                            <div class="flex items-center">
                                <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                                <span>Shoes</span>
                            </div>
                            <div class="flex items-center">
                                <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                                <span>Bags</span>
                            </div>
                        </div>
                    </div>
                    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                            Traffic
                        </h4>
                        <canvas id="line"></canvas>
                        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                            <!-- Chart legend -->
                            <div class="flex items-center">
                                <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                                <span>Organic</span>
                            </div>
                            <div class="flex items-center">
                                <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                                <span>Paid</span>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
</body>

</html>
