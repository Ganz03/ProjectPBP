<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKAT - Buat Jadwal Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">

    <style>
        table,
        th,
        td {
            border: 1px solid #000000;
        }

        /* Scrollable content */
        .scrollable-content {
            max-height: calc(100vh - 200px); /* Set max-height to make the content scrollable */
            overflow-y: auto;
        }

        /* Scrollable table */
        .scrollable-table {
            max-height: 560px;
            overflow-y: auto;
        }
    </style>
</head>

<body class="bg-gray-100 overflow-hidden">

    <div class="flex flex-col md:flex-row">

        <!-- Sidebar -->
        <div class="w-full md:w-1/4 h-full md:h-screen p-5 flex flex-col" style = "background-color: #80AF81">
            <div class="flex ">
                    <img src="/images/logo.png"  class="w-20 h-20 object-cover" >
                    <div class="flex flex-col items-center justify-center">
                        <div class="text-4 text-white text-2xl spac font-bold">SIKAT UNDIP</div>
                        <div class=" h-[9px] border w-full bg-black"></div>
                        <div class="text-white text-xs mb-8 text-center">Sistem Informasi Kuliah Akademik Terpadu<br>Universitas Diponegoro</div>
                    </div>
            </div>
            <nav class="space-y-4 text-white text-lg">
                <a href="/Dashboard" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/dashboard.png" class="w-6 h-6">
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/profil.png" class="w-6 h-6">
                    <span>Profil</span>
                </a>
                <a href="/kaprodi/inputMK" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/table.png" class="w-6 h-6">
                    <span>Input Mata Kuliah</span>
                </a>
                <a href="/kaprodi/inputJD" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/table.png" class="w-6 h-6">
                    <span>Input Jadwal Kuliah</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 md:p-8">

            <div class="text-3xl font-semibold mb-8" style="color: #508D4E">Tabel Input Mata Kuliah</div>

            <div class="p-6 rounded-lg mb-8" style="background-color: #D6EFD8; height: auto">

                <!-- Semester Select and Add Button -->
                <div class="flex justify-between items-center mb-6">
                    <a href="/kaprodi/inputMK/create"
                        class="bg-green-800 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full" style="margin-top: 10px">TAMBAH</a>
                </div>

                <!-- Scrollable Table -->
                <div class="scrollable-table">
                    <table class="w-full table-auto border-collapse text-center mt-4">
                        <thead class="bg-teal-700 text-green-800">
                            <tr>
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">Nama Mata Kuliah</th>
                                <th class="border px-4 py-2">Kode Mata Kuliah</th>
                                <th class="border px-4 py-2">SKS</th>
                                <th class="border px-4 py-2">Dosen Pengampu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mataKuliah as $key => $value)
                            <tr>
                                <td class="border px-4 py-2">{{ $key + 1 }}</td>
                                <td class="border px-4 py-2">{{ $value->namaMK }}</td>
                                <td class="border px-4 py-2">{{ $value->kodeMK }}</td>
                                <td class="border px-4 py-2">{{ $value->sks }}</td>
                                <td class="border px-4 py-2">
                                    {{ $value->dosen1->name ?? '' }} <br>
                                    {{ $value->dosen2->name ?? '' }} <br>
                                    {{ $value->dosen3->name ?? '' }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="border px-4 py-2">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
