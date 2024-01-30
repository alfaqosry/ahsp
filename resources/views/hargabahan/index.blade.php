@extends('layouts.app')
@section('index_show', 'show')
@section('content')

    @php
        
        function getRomawi($no)
        {
            switch ($no) {
                case 1:
                    return 'I';
        
                    break;
        
                case 2:
                    return 'II';
        
                    break;
        
                case 3:
                    return 'III';
        
                    break;
        
                case 4:
                    return 'IV';
        
                    break;
        
                case 5:
                    return 'V';
        
                    break;
        
                case 6:
                    return 'VI';
        
                    break;
        
                case 7:
                    return 'VII';
        
                    break;
        
                case 8:
                    return 'VIII';
        
                    break;
        
                case 9:
                    return 'IX';
        
                    break;
        
                case 10:
                    return 'X';
        
                    break;
        
                case 11:
                    return 'XI';
        
                    break;
        
                case 12:
                    return 'XII';
        
                    break;
                case 13:
                    return 'XIII';
        
                    break;
                case 14:
                    return 'XIV';
        
                    break;
                case 15:
                    return 'XV';
        
                    break;
                case 16:
                    return 'XVI';
        
                    break;
                case 17:
                    return 'XVII';
        
                    break;
                case 18:
                    return 'XVIII';
        
                    break;
            }
        }
    @endphp
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Harga Bahan dan Upah</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Harga bahan dan upah</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-12">
                            {{-- 
                            <div class="form-group mb-3">

                                <a href="{{ route('bahan.create') }}" class="btn btn-primary btn-sm"><i
                                        class="bi bi-plus-lg"></i>Tambah Data</a>
                            </div> --}}

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


                                    <!-- Bordered Tabs Justified -->
                                    <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified"
                                        role="tablist">
                                        <li class="nav-item flex-fill" role="presentation">
                                            <button class="nav-link w-100 active" id="bahan-tab" data-bs-toggle="tab"
                                                data-bs-target="#bordered-justified-bahan" type="button" role="tab"
                                                aria-controls="bahan" aria-selected="true">Bahan</button>
                                        </li>
                                        <li class="nav-item flex-fill" role="presentation">
                                            <button class="nav-link w-100" id="pekerja-tab" data-bs-toggle="tab"
                                                data-bs-target="#bordered-justified-pekerja" type="button" role="tab"
                                                aria-controls="pekerja" aria-selected="false">Pekerja</button>
                                        </li>

                                    </ul>
                                    <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                                        <div class="tab-pane fade show active" id="bordered-justified-bahan" role="tabpanel"
                                            aria-labelledby="bahan-tab">
                                            <!-- BAHAN TABEL  -->
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>NO</th>
                                                            <th>Bahan</th>
                                                            <th>Harga</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($jenisbahan as $itemjenis)
                                                            <tr>
                                                                <th>{{ getRomawi($loop->iteration) }}</th>
                                                                <th colspan="4">{{ $itemjenis->jenis_bahan }}</th>
                                                            </tr>

                                                            @php
                                                                $i = 0;
                                                            @endphp





                                                            @foreach ($bahan as $itembahan)
                                                                @if ($itemjenis->id == $itembahan->jenis_bahan_id)
                                                                    @php
                                                                        $i++;
                                                                    @endphp
                                                                    <tr>

                                                                        <td scope="row">{{ $i }}</td>
                                                                        <td>{{ $itembahan->bahan }}</td>
                                                                        <td>
                                                                            @if (!$hargabahan->isEmpty())
                                                                                @foreach ($hargabahan as $harga)
                                                                                    @if ($itembahan->id == $harga->bahan_id)
                                                                                        Rp
                                                                                        {{ number_format(round($harga->harga), 2, ',', '.') }}
                                                                                    @endif
                                                                                @endforeach
                                                                            @elseif ($hargabahan->isEmpty())
                                                                        <td></td>
                                                                @endif
                                                                </td>


                                                                @if (!$hargabahan->isEmpty())
                                                                    <td>


                                                                        <div class="btn-group" role="group"
                                                                            aria-label="Basic example">
                                                                            <a href="{{ route('hargabahan.create', ['bahan_id' => $itembahan->id, 'tugas_id' => $tugas->id]) }}"
                                                                                class="btn btn-primary btn-sm"><i
                                                                                    class="bx bxs-plus-circle"></i>
                                                                            </a>
                                                                            <a href="{{ route('hargabahan.edit', ['bahan_id' => $itembahan->id, 'tugas_id' => $tugas->id]) }}"
                                                                                class="btn btn-warning btn-sm"><i
                                                                                    class="bx bxs-pencil"></i></a>

                                                                            <a href="{{ route('hargabahan.delete', $itembahan->id) }}"
                                                                                class="btn btn-danger btn-sm"
                                                                                onclick="return confirm('Hapus Data ?')"><i
                                                                                    class="bx bxs-trash-alt"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                @else
                                                                    <td>

                                                                        <a href="{{ route('hargabahan.create', ['bahan_id' => $itembahan->id, 'tugas_id' => $tugas->id]) }}"
                                                                            class="btn btn-primary btn-sm"><i
                                                                                class="bx bxs-plus-circle"></i> </a>

                                                                    </td>
                                                                @endif

                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="bordered-justified-pekerja" role="tabpanel"
                                            aria-labelledby="pekerja-tab">
                                            <!-- PEKERJA TABEL  -->
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>NO</th>
                                                            <th>Jenis Upah</th>
                                                            <th>Harga</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>



                                                        @foreach ($pekerja as $itempekerja)
                                                            <tr>

                                                                <td scope="row">{{ $loop->iteration }}</td>
                                                                <td>{{ $itempekerja->pekerja }}</td>

                                                                @if (!$upahpekerja->isEmpty())
                                                                    @foreach ($upahpekerja as $upah)
                                                                        @if ($itempekerja->id == $upah->pekerja_id)
                                                                            <td>Rp
                                                                                {{ number_format(round($upah->upah), 2, ',', '.') }}
                                                                            </td>
                                                                        @endif
                                                                    @endforeach
                                                                @elseif ($upahpekerja->isEmpty())
                                                                    <td></td>
                                                                @endif





                                                                @if (!$upahpekerja->isEmpty())
                                                                    <td>
                                                                        <div class="btn-group" role="group"
                                                                            aria-label="Basic example">
                                                                            <a href="{{ route('upahpekerja.create', ['pekerja_id' => $itempekerja->id, 'tugas_id' => $tugas->id]) }}"
                                                                                class="btn btn-primary btn-sm"><i
                                                                                    class="bx bxs-plus-circle"></i></a>
                                                                            <a href="{{ route('upahpekerja.edit', $upah->id) }}"
                                                                                class="btn btn-warning btn-sm"><i
                                                                                    class="bx bxs-pencil"></i></a>

                                                                            <a href="{{ route('upahpekerja.delete', $upah->id) }}"
                                                                                class="btn btn-danger btn-sm"
                                                                                onclick="return confirm('Hapus Data ?')"><i
                                                                                    class="bx bxs-trash-alt"></i> </a>
                                                                        </div>
                                                                    </td>
                                                                @else
                                                                    <td>

                                                                        <a href="{{ route('upahpekerja.create', ['pekerja_id' => $itempekerja->id, 'tugas_id' => $tugas->id]) }}"
                                                                            class="btn btn-primary btn-sm"><i
                                                                                class="bx bxs-plus-circle"></i> </a>

                                                                    </td>
                                                                @endif

                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
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
