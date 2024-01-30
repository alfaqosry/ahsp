@extends('layouts.app')
@section('index_show', 'show')
@section('content')
<main id="main" class="main">


    <div class="pagetitle">
        <h1>Edit bahan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">{{$title}}</li>
                <li class="breadcrumb-item active">Edit bahan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="form-group mb-3">
                <a href="{{route('permen')}}" class="btn btn-warning btn-sm"><i class="bi bi-arrow-left-circle"></i>
                    Kembali</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit {{$title}}</h5>

                    <!-- Custom Styled Validation with Tooltips -->
                    <form action="{{ route('permen.update', $permen->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-12 position-relative">
            
                            <div class="row">
                                <label for="permen" class="form-label">Permen</label>
                                <div class="input-group has-validation">
                                <input type="text" class="form-control @error('permen') is-invalid @enderror "
                                    name="permen" id="permen" aria-describedby="permenPrepend" value="{{ $permen->permen}}">
                                {{-- <div class="valid-tooltip">
                                    Looks good!
                                </div> --}}
                                @error('permen')
                                <div id="permenFeedback" class="invalid-tooltip">
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