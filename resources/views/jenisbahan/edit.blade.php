@extends('layouts.app')
@section('index_show', 'show')
@section('content')
<main id="main" class="main">


    <div class="pagetitle">
        <h1>Edit {{$jenisbahan->jenis_bahan}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">{{$title}}</li>
                <li class="breadcrumb-item active">Edit {{$jenisbahan->jenis_bahan}}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="form-group mb-3">
                <a href="{{route('satuan')}}" class="btn btn-warning btn-sm"><i class="bi bi-arrow-left-circle"></i>
                    Kembali</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit {{$jenisbahan->jenis_bahan}}</h5>

                    <!-- Custom Styled Validation with Tooltips -->
                    <form action="{{ route('jenisbahan.update', $jenisbahan->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-12 position-relative">
            
                            <div class="row">
                                <label for="jenis_bahan" class="form-label">Jenis Bahan</label>
                                <div class="input-group has-validation">
                                <input type="text" class="form-control @error('jenis_bahan') is-invalid @enderror "
                                    name="jenis_bahan" id="jenis_bahan" aria-describedby="jenis_bahanPrepend" value="{{ $jenisbahan->jenis_bahan}}">
                                {{-- <div class="valid-tooltip">
                                    Looks good!
                                </div> --}}
                                @error('jenis_bahan')
                                <div id="jenis_bahanFeedback" class="invalid-tooltip">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>
                            </div>
            
                        <div class="form-check">
            
                        </div>
            
            
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        </div>
    </section>

</main><!-- End #main -->



@endsection