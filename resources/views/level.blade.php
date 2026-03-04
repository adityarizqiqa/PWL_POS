<!DOCTYPE html>
<html>
    <head>
        <title>Data Level Pengguna</title>
    </head>
    <body>
        <h1>Data Level Pengguna</h1>
        <table border="1">
            <tr>
                <th>Level Kode</th>
                <th>Level Nama</th>
            </tr>
            @foreach($data as $level)
            <tr>
                <td>{{ $level->level_kode }}</td>
                <td>{{ $level->level_nama }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>