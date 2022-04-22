<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Berat</th>
        <th>Tanggal</th>
    </tr>
    </thead>
    <tbody>
    


    @foreach($data as $value => $row)
        <tr>
            <td>{{ $value+1 }}</td>
            <td>{{ $row->pekerja->nama }}</td>
            <td>{{ $row->berat }}</td>
            <td>{{ $row->tgl_menimbang }}</td>
        </tr>
    @endforeach
    </tbody>
</table>