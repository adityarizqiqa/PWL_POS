<!DOCTYPE html>
<html>
    <head>
        <title>Data Kategori</title>
    </head>
    <body>
        <h1>Data Kategori Barang</h1>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Kode_Kategori</th>
                <th>Nama_Kategori</th>
            </tr>
            @if($data->count() > 0)
                @foreach($data as $kategori)
                <tr>
                    <td>{{ $kategori->kategori_id }}</td>
                    <td>{{ $kategori->kategori_kode }}</td>
                    <td>{{ $kategori->kategori_nama }}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">Data kosong</td>
                </tr>
            @endif
        </table>
    </body>
</html>
