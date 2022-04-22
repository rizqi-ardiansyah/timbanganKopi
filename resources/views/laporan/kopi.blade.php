<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Berat</th>
        <th>Tanggal</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->berat }}</td>
            <td>{{ $row->tgl_menimbang }}</td>
        </tr>
    @endforeach
    </tbody>
</table>