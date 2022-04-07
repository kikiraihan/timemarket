<table>
    {{-- <thead>
    <tr>
        <th colspan="2">No</th>
        <th>Tugas</th>
        <th>Program</th>
        <th>Tanggal</th>
    </tr>
    </thead> --}}
    <tbody>
    @foreach($pegawai as $key=>$p)
        <tr style="background-color: aqua">
            <td>{{($key+1)}}</td>
            <td colspan="4">{{ $p->nama }}</td>
        </tr>
        @php
            $tugasDiaSeminggu=$p->getTugasDalamMingguKalenderUtama($posisi);
            foreach ($daysArray as $tgl) 
            {
                foreach ($tugasDiaSeminggu as $tugas) 
                {
                    if($tgl->between($tugas->startdate,$tugas->duedate))
                    {
                        $list[$p->id]['tugas'][$tgl->format('Y-m-d')][]=$tugas;
                    }
                }
            }
        @endphp
        @foreach ($tugasDiaSeminggu as $key2=>$item)
            <tr>
                <td></td>
                <td>{{($key2+1)}}</td>
                <td>{{$item->judul}}</td>
                <td>{{$item->tim->nama}}</td>
                <td>{{$item->startdate->format('M d')}} - {{$item->duedate->format('M d')}} </td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>