@extends('layouts.app')
@section('index_show', 'show')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambah User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Tambah User</li>
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

                                <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm"><i
                                        class="bi bi-plus-lg"></i>Tambah User</a>
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
                                    <h5 class="card-title">{{ $title }}</h5>

                                    <!-- Default Table -->
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Username</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>No Telepon</th>
                                                    <th>Role</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                @foreach ($user as $itemuser)
                                                    <tr>

                                                        <td scope="row">{{ $loop->iteration }}</td>
                                                        <td>{{ $itemuser->username }}</td>
                                                        <td>{{ $itemuser->nama }}</td>
                                                        <td>{{ $itemuser->email }}</td>
                                                        <td>{{ $itemuser->no_tlpn }}</td>
                                                        <td>{{ $itemuser->role }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <a href="{{ route('user.edit', $itemuser->id) }}"
                                                                    class="btn btn-warning btn-sm"><i
                                                                        class="bx bxs-pencil"></i></a>

                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    data-bs-toggle="modal" data-bs-target="#deletemodal"
                                                                    data-bs-data="{{ $itemuser->nama }}"
                                                                    data-bs-id="{{ $itemuser->id }}"
                                                                    data-bs-link="{{ route('user.delete', $itemuser->id) }}"><i
                                                                        class="bx bxs-trash-alt"></i></button>
                                                            </div>
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





                    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deletemodalLabel">Hapus User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus User ini</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
        </section>

    </main>

    <script>
        const deleteModal = document.getElementById('deletemodal')
        deleteModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const recipient = button.getAttribute('data-bs-id')
            const link = button.getAttribute('data-bs-link')
            const data = button.getAttribute('data-bs-data')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            const modalTitle = deleteModal.querySelector('.modal-title')
            const modalBodyInput = deleteModal.querySelector('.modal-footer a')
            modalTitle.textContent = 'Hapus ' + data
            modalBodyInput.href = link
            console.log(modalTitle.h1);
        });
    </script>

@endsection
