@extends('layouts.app')
@section('index_show', 'show')
@section('content')

{{-- @php
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

}

}
@endphp --}}
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="form-group mb-3">

                                <a href="{{ route('cetak', $projek->id) }}" class="btn btn-primary btn-sm"><i
                                        class="bi bi-print"></i>Cetak</a>
                            </div>

                            

                            @if (session('sukses'))
                                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                                    role="alert">
                                    {!! session('sukses') !!}
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif


                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $projek->projek }} {{ $projek->tahun }}</h5>

                                    <!-- Bordered Tabs Justified -->
                                    <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified"
                                        role="tablist">
                                       
                                        <li class="nav-item flex-fill" role="presentation">
                                            <button class="nav-link w-100" id="ee1-tab" data-bs-toggle="tab"
                                                data-bs-target="#bordered-justified-ee1" type="button" role="tab"
                                                aria-controls="ee1" aria-selected="false">EE1</button>
                                        </li>



                                        <li class="nav-item flex-fill" role="presentation">
                                            <button class="nav-link w-100" id="bahan-tab" data-bs-toggle="tab"
                                                data-bs-target="#bordered-justified-bahan" type="button" role="tab"
                                                aria-controls="bahan" aria-selected="false">BAHAN</button>
                                        </li>


                                        @foreach ($jenispekerjaan as $item)
                                            <li class="nav-item flex-fill" role="presentation">
                                                <button class="nav-link w-100" id="{{ $item->id }}-tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#bordered-justified-{{ $item->id }}" type="button"
                                                    role="tab" aria-controls="{{ $item->id }}"
                                                    aria-selected="false">{{ $item->jenis_pekerjaan }}</button>
                                            </li>
                                        @endforeach

                                        <li class="nav-item flex-fill" role="presentation">
                                            <button class="nav-link w-100 active" id="rekapitulasi-tab" data-bs-toggle="tab"
                                                data-bs-target="#bordered-justified-rekapitulasi" type="button"
                                                role="tab" aria-controls="rekapitulasi"
                                                aria-selected="true">REKAPITULASI</button>
                                        </li>



                                    </ul>





                                    <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                                      
                                        <div class="tab-pane fade" id="bordered-justified-ee1" role="tabpanel"
                                            aria-labelledby="ee1-tab">
                                                
                                            <p><b>DAFTAR UPAH</b></p>
                                            <!-- Default Table -->
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Jenis Upah</th>
                                                        <th>Satuan</th>
                                                        <th>Upah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                   

                                                        @foreach ($pekerja as $itempekerja)
                                                           
                                                                <tr>

                                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                                    <td>{{ $itempekerja->pekerja }}</td>
                                                                    <td> {{ $itempekerja->satuan->satuan }}</td>

                                                                    <td>
                                                                        @foreach ($upahall as $item)
                                                                            @if ($item->pekerja_id == $itempekerja->id)
                                                                                Rp {{ number_format($item->sum,2, ',', '.' )  }}
                                                                            @endif
                                                                            
                                                                        @endforeach
                                                                    </td>

                                                                </tr>
                                                            
                                                        @endforeach
                                                   

                                                </tbody>
                                            </table>


                                            <p><b>DAFTAR BAHAN</b></p>
                                            <!-- Default Table -->
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Jenis Bahan</th>
                                                        <th>Satuan</th>
                                                        @foreach ($surveyor as $s)
                                                            <th>{{$s->nama}}</th>
                                                        @endforeach
                                                        <th>Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($jenisbahan as $itemjenis)
                                                        <tr>
                                                            <th>I</th>
                                                            <th colspan="4">{{ $itemjenis->jenis_bahan }}</th>
                                                        </tr>

                                                        @foreach ($bahan as $itembahan)
                                                            @if ($itemjenis->id == $itembahan->jenis_bahan_id)
                                                                <tr>

                                                                    <td scope="row"></td>
                                                                    <td>{{ $itembahan->bahan }}</td>
                                                                    <td> {{ $itembahan->satuan->satuan }}</td>
                                                                   
                                                                         @foreach ($surveyor as $s)
                                                                         <td>
                                                                        @foreach ($tugas as $t)
                                                                        @if ($t->bahan_id == $itembahan->id && $s->id == $t->surveyor_id )
                                                                           {{ number_format($t->harga,2, ',', '.' )  }}
                                                                         
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                                    @endforeach
                                                                   

                                                                    </td>
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
                                            <!-- End Default Table Example -->
                                       
                                        </div>
                                        <div class="tab-pane fade" id="bordered-justified-bahan" role="tabpanel"
                                            aria-labelledby="bahan-tab">


                                            
                                            <p><b>DAFTAR UPAH</b></p>
                                            <!-- Default Table -->
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Jenis Upah</th>
                                                        <th>Satuan</th>
                                                        <th>Upah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                   

                                                        @foreach ($pekerja as $itempekerja)
                                                           
                                                                <tr>

                                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                                    <td>{{ $itempekerja->pekerja }}</td>
                                                                    <td> {{ $itempekerja->satuan->satuan }}</td>

                                                                    <td>
                                                                        @foreach ($upahall as $item)
                                                                            @if ($item->pekerja_id == $itempekerja->id)
                                                                                Rp {{ number_format($item->sum,2, ',', '.' )  }}
                                                                            @endif
                                                                            
                                                                        @endforeach
                                                                    </td>

                                                                </tr>
                                                            
                                                        @endforeach
                                                   

                                                </tbody>
                                            </table>


                                            <p><b>DAFTAR BAHAN</b></p>
                                            <!-- Default Table -->
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Jenis Bahan</th>
                                                        <th>Satuan</th>
                                                        <th>Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($jenisbahan as $itemjenis)
                                                        <tr>
                                                            <th>I</th>
                                                            <th colspan="4">{{ $itemjenis->jenis_bahan }}</th>
                                                        </tr>

                                                        @foreach ($bahan as $itembahan)
                                                            @if ($itemjenis->id == $itembahan->jenis_bahan_id)
                                                                <tr>

                                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                                    <td>{{ $itembahan->bahan }}</td>
                                                                    <td> {{ $itembahan->satuan->satuan }}</td>

                                                                    <td>
                                                                        @foreach ($hargaall as $item)
                                                                            @if ($item->bahan_id == $itembahan->id)
                                                                                Rp {{ number_format($item->sum,2, ',', '.' )  }}
                                                                            @endif
                                                                        @endforeach
                                                                    </td>

                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                </tbody>
                                            </table>
                                            <!-- End Default Table Example -->
                                        </div>

                                        @php
                                            $rekapitulasi = [];
                                        @endphp
                                        @foreach ($jenispekerjaan as $jp)
                                            <div class="tab-pane fade" id="bordered-justified-{{ $jp->id }}"
                                                role="tabpanel" aria-labelledby="{{ $jp->id }}-tab">


                                                @foreach ($pekerjaan as $itempekerjaan)

                                                @if ( $jp->id == $itempekerjaan->jenispekerjaan_id )
                                                 
                                                    <p><b>{{ $itempekerjaan->pekerjaan }}</b></p>




                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>NO</th>
                                                                <th>Uraian</th>
                                                                <th>Kode</th>
                                                                <th>Satuan</th>
                                                                <th>Koefisien</th>
                                                                <th>Harga Satuan (Rp)</th>
                                                                <th>Jumlah Harga (Rp)</th>
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
                                                                        <td>

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
                                                                                <td>Rp {{ number_format($u->sum * $item->koefisien,2, ',', '.' ) }}
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
                                                                <td><b>Rp {{ number_format($totalpekerja,2, ',', '.' )}}</b></td>



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
                                                                        <td>

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
                                                                                <td>Rp {{ number_format($h->sum * $item->koefisien,2, ',', '.' ) }}
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
                                                                <td><b>Rp {{ number_format($jumblah,2, ',', '.' ) }} </b></td>
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
                                                                <td><b>Rp {{ number_format($overhead,2, ',', '.' ) }} </b></td>
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
                                                                <td><b>Rp {{ number_format($jumblah + $overhead,2, ',', '.' ) }} </b></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                    @php
                                                        $rekapitulasi[] = $hasp;
                                                    @endphp
                                                   
                                                    @endif


                                                @endforeach




                                            </div>
                                        @endforeach

                                            {{-- {{dd($rekapitulasi)}} --}}

                                            <div class="tab-pane fade show active" id="bordered-justified-rekapitulasi"
                                            role="tabpanel" aria-labelledby="rekapitulasi-tab">


                                            <table class="table table-bordered">

                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>KELOMPOK PEKERJAAN</th>
                                                        <th>JENIS PEKERJAAN	</th>
                                                        <th>HARGA T.A {{$projek->tahun}}</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    @foreach ($jenispekerjaan as $itemjenis )
                                                    <tr>
                                                        <td>{{ $loop->iteration}}</td>
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
                                        </div>


                                    </div><!-- End Bordered Tabs Justified -->

                                </div>
                            </div>
                        </div>
                    </div><!-- End Left side columns -->





                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Pengumuman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus pengumuman ini</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <a href="" class="btn btn-primary">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
        </section>

    </main>

    <script>
        const exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const recipient = button.getAttribute('data-bs-id')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            const modalTitle = exampleModal.querySelector('.modal-title')
            const modalBodyInput = exampleModal.querySelector('.modal-footer a')

            modalTitle.textContent = "Hapus Pengumuman"
            modalBodyInput.href = "http://127.0.0.1:8000/pengumuman/delete/" + recipient
            console.log(modalBodyInput.href);
        })
    </script>

@endsection
