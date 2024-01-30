@extends('layouts.app')
@section('index_show', 'show')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Daftar pekerjaan {{  $pekerjaan->pekerjaan }}</h1>
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
                                  <h5 class="card-title">Koefisien</h5>
                    
                                  <!-- Bordered Tabs Justified -->
                                  <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">

                                    <li class="nav-item flex-fill" role="presentation">
                                      <button class="nav-link w-100 active" id="bahan-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-bahan" type="button" role="tab" aria-controls="bahan" aria-selected="true">Bahan</button>
                                    </li>

                                    <li class="nav-item flex-fill" role="presentation">
                                      <button class="nav-link w-100" id="pekerja-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-pekerja" type="button" role="tab" aria-controls="pekerja" aria-selected="false">Pekerja</button>
                                    </li>

                                    

                                  </ul>
                                  <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                                    <div class="tab-pane fade show active" id="bordered-justified-bahan" role="tabpanel" aria-labelledby="bahan-tab">

                                        <div class="form-group mb-3">

                                            <a href="{{ route('koefisien.create', $pekerjaan->id) }}" class="btn btn-primary btn-sm"><i
                                                    class="bi bi-plus-lg"></i></a>
                                        </div>
                                    <!-- Default Table -->
                                    <table class="table table-hover mt-4">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Bahan</th>
                                                <th>Koefisien</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                           
                                                @foreach ($koefisien as $itemkoefisien)
                                                   
                                                        <tr>

                                                            <td scope="row">{{ $loop->iteration }}</td>
                                                            <td>
                                                                {{ $itemkoefisien->bahan->bahan}}
                                                            </td>
                                                            <td>
                                                                {{ $itemkoefisien->koefisien}}
                                                            </td>
                                                            <td>

                                                                <a href="{{ route('koefisien.edit', $itemkoefisien->id) }}"
                                                                    class="btn btn-warning btn-sm"><i
                                                                        class="fas fa-edit"></i> Edit</a>
                                                                <a href="{{ route('koefisien.delete', $itemkoefisien->id) }}"
                                                                    class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Hapus Data ?')"><i
                                                                        class="fas fa-trash"></i> Hapus</a>
                                                            </td>
                                                        </tr>
                                                    
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <!-- End Default Table Example -->
                                    </div>
                                    <div class="tab-pane fade" id="bordered-justified-pekerja" role="tabpanel" aria-labelledby="pekerja-tab">
                                        <div class="form-group mb-3">

                                            <a href="{{ route('koefisienpekerja.create', $pekerjaan->id) }}" class="btn btn-primary btn-sm"><i
                                                    class="bi bi-plus-lg"></i></a>
                                        </div>
                                   <!-- Default Table -->
                                   <table class="table table-hover mt-4">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Pekerja</th>
                                            <th>Koefisien</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                       
                                            @foreach ($koefisienpekerja as $itemkoefisien)
                                               
                                                    <tr>

                                                        <td scope="row">{{ $loop->iteration }}</td>
                                                        <td>
                                                            {{ $itemkoefisien->pekerja->pekerja}}
                                                        </td>
                                                        <td>
                                                            {{ $itemkoefisien->koefisien}}
                                                        </td>
                                                        <td>

                                                            <a href="{{ route('koefisienpekerja.edit', $itemkoefisien->id) }}"
                                                                class="btn btn-warning btn-sm"><i
                                                                    class="fas fa-edit"></i> Edit</a>
                                                            <a href="{{ route('koefisienpekerja.delete', $itemkoefisien->id) }}"
                                                                class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Hapus Data ?')"><i
                                                                    class="fas fa-trash"></i> Hapus</a>
                                                        </td>
                                                    </tr>
                                                
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
