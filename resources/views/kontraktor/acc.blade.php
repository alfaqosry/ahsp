@extends('layouts.app')
@section('index_show', 'show')
@section('content')


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
                                    <h5 class="card-title">{{ $title }}</h5>

                                    <!-- Default Table -->

                                    <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Nama CV</th>
                                                <th>Nama Direktur</th>
                                                <th>NIK</th>
                                                <th>NPWP</th>
                                                <th>No Akta Pendirian Perusahaan</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach ($kontraktor as $item)
                                                <tr>

                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                    {{-- {{ route('projek.show', $item) }} --}}
                                                    <td><a href=""
                                                            class="text-primary fw-bold">{{ $item->nama_cv }}</a></td>
                                                    <td>{{ $item->nama_direktur }}</td>
                                                    <td>{{ $item->nik }}</td>
                                                    <td>{{ $item->npwp }}</td>
                                                    <td>{{ $item->no_akta_perusahaan }}</td>
                                                    <td>
                                                        @if ($item->status == 'permintaan')
                                                            <span class="badge rounded-pill bg-primary">Permintaan</span>
                                                        @elseif ($item->status == 'disetujui')
                                                            <span class="badge rounded-pill bg-succsess">Disetujui</span>
                                                        @else
                                                            <span class="badge rounded-pill bg-danger">Ditolak</span>
                                                        @endif


                                                    </td>
                                                    <td>
                                                        @if ($item->status == 'permintaan')
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="{{ route('kontrakor.acc', $item->id) }}"
                                                                class="btn btn-success btn-sm"><i
                                                                    class="bx bx-check"></i></a>
                                                            <a href="{{ route('kontrakor.tolak', $item->id) }}"
                                                                class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Apakah Anda yakin ingin menolak kontraktor ini?')"><i
                                                                    class="bx bx-x"></i></a>
                                                            </div>

                                                            
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                    <!-- End Default Table Example -->
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
