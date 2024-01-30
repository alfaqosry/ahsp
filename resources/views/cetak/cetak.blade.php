<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$projek->prokek}} {{$projek->tahun}}</title>
    <style>
        body{
            font-family: Calibri;
        }
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding-left: 2px;
            font-size: 20px
          
            
            
        }

       
        

        .kpl{
            padding: 8px ;
        }
        .page-break {
    page-break-after: always;
        }
        .my-table {
    width: 100%;
   

  }
    </style>
</head>

<body>


    @php
         function getRomawi($no){

switch ($no){

          case 1:

              return "I";

              break;

          case 2:

              return "II";

              break;

          case 3:

              return "III";

              break;

          case 4:

              return "IV";

              break;

          case 5:

              return "V";

              break;

          case 6:

              return "VI";

              break;

          case 7:

              return "VII";

              break;

          case 8:

              return "VIII";

              break;

          case 9:

              return "IX";

              break;

          case 10:

              return "X";

              break;

          case 11:

              return "XI";

              break;

          case 12:

              return "XII";

              break;
          case 13:

              return "XIII";

              break;
          case 14:

              return "XIV";

              break;
          case 15:

              return "XV";

              break;
          case 16:

              return "XVI";

              break;
          case 17:

              return "XVII";

              break;
          case 18:

              return "XVIII";

              break;

    }

}
    @endphp



<center><p>DAFTAR HARGA SATUAN UPAH DAN BAHAN BANGUNAN
    DI LINGKUNGAN DINAS PEKERJAAN UMUM DAN PENATAAN RUANG KABUPATEN KAMPAR
    BIDANG CIPTA KARYA
    TAHUN ANGGARAN {{$projek->tahun}}
    DAERAH BAIK
</p>
  </center>


  <h4>DAFTAR UPAH</h4>
  <table class="my-table">
    <thead>
        <tr>
            <th class="kpl">NO</th>
            <th class="kpl">Jenis Upah</th>
            <th class="kpl">Satuan</th>
            <th class="kpl">Upah</th>
        </tr>
    </thead>
    <tbody>

       

            @foreach ($pekerja as $itempekerja)
               
                    <tr>

                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $itempekerja->pekerja }}</td>
                        <td style="text-align: center"> {{ $itempekerja->satuan->satuan }}</td>

                        <td>
                            @foreach ($upahall as $item)
                                @if ($item->pekerja_id == $itempekerja->id)
                                    Rp {{ number_format($item->sum,2, ',', '.' ) }}
                                @endif
                                
                            @endforeach
                        </td>

                    </tr>
                
            @endforeach
       

    </tbody>
</table>


  <h4>DAFTAR BAHAN BANGUNAN</h4>
  <table class="my-table">
    <thead>
        <tr>
            <th class="kpl">NO</th>
            <th class="kpl">Jenis Bahan</th>
            <th class="kpl">Satuan</th>
            <th class="kpl">Harga</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($jenisbahan as $itemjenis)
            <tr>
                <td><b>{{ getRomawi($loop->iteration )}}</b></td>
                <td><b>{{ $itemjenis->jenis_bahan }}</b></td>
                <td></td>
                <td></td>
            </tr>

            @foreach ($bahan as $itembahan)
                @if ($itemjenis->id == $itembahan->jenis_bahan_id)

                    <tr>

                       <td></td>
                        <td>{{ $itembahan->bahan }}</td>
                        <td style="text-align: center"> {{ $itembahan->satuan->satuan }}</td>

                        <td>
                            @foreach ($hargaall as $item)
                                @if ($item->bahan_id == $itembahan->id)
                                    Rp {{ number_format($item->sum,2, ',', '.' ) }}
                                @endif
                            @endforeach
                        </td>

                    </tr>

                 

                @endif
            @endforeach
        @endforeach

    </tbody>
</table>



{{-- bahan end --}}
<div class="page-break"></div>

@php
$rekapitulasi = [];
@endphp

@foreach ($jenispekerjaan as $jp)

<b>{{getRomawi($loop->iteration)}} {{strtoupper($jp->jenis_pekerjaan)}}</b>

    @foreach ($pekerjaan as $itempekerjaan)

    @if ( $jp->id == $itempekerjaan->jenispekerjaan_id )
     
     
        <p style="font-weight: 600;font-size: 20px">{{$loop->iteration}}  {{ $itempekerjaan->pekerjaan }}</p>




        <table class="my-table">
            <thead>
                <tr>
                    <th class="kpl">NO</th>
                    <th class="kpl">Uraian</th>
                    <th class="kpl">Kode</th>
                    <th class="kpl">Satuan</th>
                    <th class="kpl">Koefisien</th>
                    <th class="kpl">Harga Satuan (Rp)</th>
                    <th class="kpl">Jumlah Harga (Rp)</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><b>A</b></td>
                    <td><b>TENAGA</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>



                @php
                    $totalpekerja = 0;
                @endphp
                @foreach ($koefisienpekerja as $item)
                    @if ($item->pekerjaan_id == $itempekerjaan->id)
                        <tr>
                            <td scope="row"></td>
                            <td>{{ $item->pekerja }}</td>
                            <td></td>
                            <td style="text-align: center">

                                @foreach ($satuan as $s)
                                    @if ($s->id == $item->satuan_id)
                                        {{ $s->satuan }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $item->koefisien }}</td>

                            @foreach ($upah as $u)
                                @if ($u->pekerja_id == $item->pekerja_id)
                                    <td>Rp {{ number_format($u->sum,2, ',', '.' ) }}</td>
                                    <td>Rp {{number_format($u->sum * $item->koefisien,2, ',', '.' )  }}
                                    </td>
                                    @php
                                        $totalpekerja += $u->sum * $item->koefisien;
                                        $result = ['total' => $totalpekerja, 'pekerjaan_id' => $itempekerjaan->id];
                                    @endphp
                                @endif
                            @endforeach

                        </tr>
                    @endif
                @endforeach




                <tr>
                    <td></td>
                    <td>JUMLAH TENAGA KERJA</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>Rp {{number_format($totalpekerja,2, ',', '.' )  }}</b></td>



                </tr>




                <tr>
                    <td><b>B</b></td>
                    <td><b>BAHAN</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                @php
                    $totalbahan = 0;
                @endphp
                @foreach ($koefisienharga as $item)
                    @if ($item->pekerjaan_id == $itempekerjaan->id)
                        <tr>




                            <td scope="row"></td>
                            <td>{{ $item->bahan }}</td>
                            <td></td>
                            <td style="text-align: center">

                                @foreach ($satuan as $s)
                                    @if ($s->id == $item->satuan_id)
                                        {{ $s->satuan }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $item->koefisien }}</td>

                            @foreach ($harga as $h)
                                @if ($h->bahan_id == $item->bahan_id)
                                    <td>Rp {{ number_format($h->sum,2, ',', '.' )  }}</td>
                                    <td>Rp {{number_format($h->sum * $item->koefisien,2, ',', '.' )  }}
                                    </td>
                                    @php
                                        $totalbahan += $h->sum * $item->koefisien;
                                        $result = ['total' => $totalbahan, 'pekerjaan_id' => $itempekerjaan->id];
                                    @endphp
                                @endif
                            @endforeach

                        </tr>
                    @endif
                @endforeach



                <tr>
                    <td></td>
                    <td>JUMLAH HARGA BAHAN</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>Rp

                            {{ number_format($totalbahan,2, ',', '.' ) }}


                        </b></td>

                </tr>

                <tr>
                    <td><b>C</b></td>
                    <td><b>PERALATAN</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td>JUMLAH HARGA ALAT</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b></b></td>

                </tr>

                <tr>
                    <td><b>D</b></td>
                    <td><b>Jumlah (A+B+C)</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @php
                        $jumblah = $totalpekerja + $totalbahan;
                    @endphp
                    <td><b>Rp {{ number_format($jumblah,2, ',', '.' )  }}</b></td>
                </tr>

                <tr>
                    <td><b>E</b></td>
                    <td><b>Overhead & Profit ( 10 % )</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @php
                        $overhead = 0.1 * $jumblah;
                    @endphp
                    <td><b>Rp {{ number_format($overhead,2, ',', '.' )  }}</b></td>
                </tr>

                <tr>
                    <td><b>F</b></td>
                    <td><b>Harga Satuan Pekerjaan (D+E)</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @php
                    $hasp = ['hsp' => $jumblah + $overhead, 'pekerjaan_id' => $itempekerjaan->id];
              @endphp
                    <td><b>Rp {{ number_format($jumblah + $overhead,2, ',', '.' ) }}</b></td>
                </tr>

            </tbody>
        </table>

        @php
        $rekapitulasi[] = $hasp;
    @endphp
       
        @endif
    @endforeach



    <div class="page-break"></div>

@endforeach


<div class="page-break"></div>

<p style="text-align: center">REKAPITULASI ANALISA PEKERJAAN DAERAH BAIK T.A {{$projek->tahun}}</p>
<table class="my-table">

    <thead>
        <tr>
            <th class="kpl">No</th>
            <th class="kpl">KELOMPOK PEKERJAAN</th>
            <th class="kpl">JENIS PEKERJAAN	</th>
            <th class="kpl">HARGA T.A {{$projek->tahun}}</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($jenispekerjaan as $itemjenis )
        <tr>
            <td>{{ getRomawi($loop->iteration)}}</td>
            <td>{{$itemjenis->jenis_pekerjaan}}</td>
            <td></td>
            <td></td>
          
        </tr>
            @foreach ($pekerjaan as $itempekerjaan )
            @if ($itempekerjaan->jenispekerjaan_id == $itemjenis->id)
                
          
          
        
        <tr>
            <td></td>
            <td></td>
            <td>{{$itempekerjaan->pekerjaan}}</td>
            <td>
                @foreach ($rekapitulasi as $rekap)
                @if ($rekap['pekerjaan_id'] == $itempekerjaan->id)
                  Rp  {{ number_format($rekap['hsp'],2, ',', '.' ) }}
                @endif
                    
                @endforeach

            </td>
           
        </tr>
        @endif
            @endforeach
        @endforeach
     
    </tbody>

</table>






</body>

</html>