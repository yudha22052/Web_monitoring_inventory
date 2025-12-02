<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stok Gudang Surabaya</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h1>Inventaris Reagen - Gudang Surabaya</h1>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Reagen</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop melalui data stok yang dikirim dari Controller --}}
            @foreach ($stokData as $item)
            <tr>
                <td>{{ $item['Kode'] }}</td>
                <td>{{ $item['Nama Reagen'] }}</td>
                <td>{{ $item['Kategori'] }}</td>
                <td>{{ $item['Stok'] }}</td>
                <td>{{ $item['Satuan'] }}</td>
                <td>{{ $item['Status'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>