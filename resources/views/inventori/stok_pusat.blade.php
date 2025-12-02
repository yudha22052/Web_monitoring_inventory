<!DOCTYPE html>
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
</html>