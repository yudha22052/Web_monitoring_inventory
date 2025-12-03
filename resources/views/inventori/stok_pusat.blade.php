<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pemantauan Stok Pusat</title>
    
    {{-- Memuat CSS dari folder public/css/ --}}
    <link rel="stylesheet" href="{{ asset('css/inventori_style.css') }}">
    
</head>
<body>

    <h1>Pemantauan Stok Reagen Seluruh Gudang (Pusat)</h1>
    
    {{-- LOOP UTAMA: Melakukan loop untuk setiap kelompok gudang (Pusat, Surabaya, Lamongan) --}}
    @foreach ($stokByGudang as $namaGudang => $stokItems)
    
        <div class="table-container">
            <h2>🏢 Gudang {{ $namaGudang }}</h2>

            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Reagen</th>
                        <th>Kategori</th>
                        <th>Stok Saat Ini</th>
                        <th>Stok Minimum</th>
                        <th>Satuan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- LOOP KEDUA: Melakukan loop untuk setiap item di gudang tersebut --}}
                    @foreach ($stokItems as $item)
                    <tr>
                        <td>{{ $item['Kode'] }}</td>
                        <td>{{ $item['Nama Reagen'] }}</td>
                        <td>{{ $item['Kategori'] }}</td>
                        <td>{{ $item['Stok'] }}</td>
                        <td>{{ $item['Stok_Minimum'] }}</td>
                        <td>{{ $item['Satuan'] }}</td>
                        <td>
                            <span class="{{ $item['Stok'] <= $item['Stok_Minimum'] ? 'restock' : 'aman' }}">
                                {{ $item['Status'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
    @endforeach

</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pemantauan Stok Pusat</title>
    
    {{-- Memuat CSS dari folder public/css/ --}}
    <link rel="stylesheet" href="{{ asset('css/inventori_style.css') }}">
    
    {{-- Tambahkan Style untuk Dropdown (Jika belum ada di inventori_style.css) --}}
    <style>
        /* Style untuk Kontrol Filter */
        .filter-controls {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f7f7f7;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        #gudang-select {
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        /* Secara default, sembunyikan semua tabel gudang */
        .gudang-table {
            display: none;
            margin-top: 25px; /* Memberi jarak antara tabel */
        }

        /* Kelas untuk menampilkan tabel yang dipilih */
        .gudang-table.active {
            display: block;
        }
        
        /* Tambahkan beberapa style dasar agar tabel terlihat bagus */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .restock {
            color: white;
            background-color: #dc3545; /* Merah untuk restock */
            padding: 2px 6px;
            border-radius: 3px;
        }
        .aman {
            color: white;
            background-color: #28a745; /* Hijau untuk aman */
            padding: 2px 6px;
            border-radius: 3px;
        }
    </style>
</head>
<body>

    <h1>Pemantauan Stok Reagen Seluruh Gudang (Pusat)</h1>
    
    {{-- KONTROL DROPDOWN --}}
    <div class="filter-controls">
        <label for="gudang-select">**Pilih Gudang:**</label>
        <select id="gudang-select" onchange="tampilkanGudang()">
            {{-- Opsi "Tampilkan Semua Gudang" telah DIHILANGKAN di sini --}}

            {{-- Mengisi opsi dropdown dari nama-nama gudang --}}
            @foreach ($stokByGudang as $namaGudang => $stokItems)
                {{-- PENTING: Jika nama gudang adalah 'Pusat', tambahkan 'selected' untuk default --}}
                <option 
                    value="{{ Str::slug($namaGudang) }}"
                    {{ $namaGudang == 'Pusat' ? 'selected' : '' }}
                >
                    {{ $namaGudang }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- LOOP UTAMA: Melakukan loop untuk setiap kelompok gudang --}}
    @foreach ($stokByGudang as $namaGudang => $stokItems)
    
        <div class="table-container gudang-table" id="gudang-{{ Str::slug($namaGudang) }}">
            <h2>🏢 Gudang {{ $namaGudang }}</h2>

            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Reagen</th>
                        <th>Kategori</th>
                        <th>Stok Saat Ini</th>
                        <th>Stok Minimum</th>
                        <th>Satuan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- LOOP KEDUA: Melakukan loop untuk setiap item di gudang tersebut --}}
                    @foreach ($stokItems as $item)
                    <tr>
                        <td>{{ $item['Kode'] }}</td>
                        <td>{{ $item['Nama Reagen'] }}</td>
                        <td>{{ $item['Kategori'] }}</td>
                        <td>{{ $item['Stok'] }}</td>
                        <td>{{ $item['Stok_Minimum'] }}</td>
                        <td>{{ $item['Satuan'] }}</td>
                        <td>
                            <span class="{{ $item['Stok'] <= $item['Stok_Minimum'] ? 'restock' : 'aman' }}">
                                {{ $item['Status'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
    @endforeach

    {{-- LOGIKA JAVASCRIPT --}}
    <script>
        function tampilkanGudang() {
            const selectedValue = document.getElementById('gudang-select').value;
            const allTables = document.querySelectorAll('.gudang-table');

            // 1. Sembunyikan semua tabel
            allTables.forEach(table => {
                table.classList.remove('active');
            });

            // 2. Tampilkan tabel yang dipilih
            // Karena tidak ada lagi opsi "Tampilkan Semua Gudang", 
            // kita hanya perlu mencari dan menampilkan gudang spesifik.
            const targetId = 'gudang-' + selectedValue;
            const selectedTable = document.getElementById(targetId);
            
            if (selectedTable) {
                selectedTable.classList.add('active');
            }
        }

        // Panggil fungsi ini saat halaman pertama kali dimuat. 
        // Ini akan menampilkan Gudang Pusat karena ia terpilih sebagai default.
        document.addEventListener('DOMContentLoaded', (event) => {
            tampilkanGudang(); 
        });
    </script>

</body>
</html>