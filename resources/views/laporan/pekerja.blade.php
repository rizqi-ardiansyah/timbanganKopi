<table>
    <thead>
    <tr>
        <th>Nik</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Telepon</th>
        <th>Jenis Kelamin</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $row)
        <tr>
            <td>{{ $row->nik }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->no_hp }}</td>
            <td>{{ $row->jenis_kelamin }}</td>
        </tr>
    @endforeach
    </tbody>
</table>