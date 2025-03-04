<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./../../assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./../../assets/js/init-alpine.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="./../../assets/js/charts-lines.js" defer></script>
    <script src="./../../assets/js/charts-pie.js" defer></script>
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
                    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                        List Pengaduan
                    </h4>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            @if ($complaints->isEmpty())
                                <div class="flex flex-col items-center justify-center py-10">
                                    <h1 class="text-xl font-semibold text-gray-700 dark:text-gray-300">Tidak ada
                                        complaint</h1>
                                    <p class="text-gray-500 dark:text-gray-400">Belum ada pengaduan yang masuk.</p>
                                </div>
                            @else
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3">Gambar</th>
                                            <th class="px-4 py-3">Nama Pengadu</th>
                                            <th class="px-4 py-3">Judul Pengaduan</th>
                                            <th class="px-4 py-3">Status</th>
                                            <th class="px-4 py-3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                                        @foreach ($complaints as $complaint)
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3 text-sm">
                                                    <img src="{{ asset('storage/' . $complaint->image) }}"
                                                        alt="" width="70">
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
                                                    <div class="flex items-center justify-between">
                                                        <a
                                                            href="/dashboard/admin/response/{{ $complaint->id }}">Response</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
