<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">


    <li class="nav-heading">{{auth()->user()->role}}</li>

    @if (auth()->user()->role == "admin")
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#ahpmanajemen" data-bs-toggle="collapse" href="#">
        <i class="bi bi-clipboard-plus"></i><span>Manajemen AHSP </span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="ahpmanajemen" class="nav-content collapse " data-bs-parent="#sidebar-nav">
 
        <li>
          <a href="{{route('projek')}}" class="@if ( $title == 'Projek')
          active
          @endif">
            <i class="bi bi-circle"></i><span>Projek AHSP</span>
          </a>
        </li>
         
        <li>
          <a href="{{route('bahan')}}" class="@if ( $title == 'Bahan')
          active
          @endif">
            <i class="bi bi-circle"></i><span>Bahan</span>
          </a>
        </li>

            
        <li>
          <a href="{{route('pekerja')}}" class="@if ( $title == 'Pekerja')
          active
          @endif">
            <i class="bi bi-circle"></i><span>Pekerja</span>
          </a>
        </li>

        <li>
          <a href="{{route('satuan')}}" class="@if ( $title == 'Satuan')
          active
          @endif">
            <i class="bi bi-circle"></i><span>Satuan</span>
          </a>
        </li>

        <li>
          <a href="{{route('jenisbahan')}}" class="@if ( $title == 'Jenis Bahan')
          active
          @endif">
            <i class="bi bi-circle"></i><span>Jenis Bahan</span>
          </a>
        </li>


        <li>
          <a href="{{route('permen')}}" class="@if ( $title == 'Permen')
          active
          @endif">
            <i class="bi bi-circle"></i><span>Permen</span>
          </a>
        </li>


      </ul>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
      <a class="nav-link @if ( $title != 'User')
                collapsed
                @endif" href="{{route('user')}}">
                <i class="bi bi-people"></i>
        <span>User</span>
      </a>
    </li><!-- End Profile Page Nav -->

@endif


{{-- Surveyor --}}

@if (auth()->user()->role == "surveyor")
  

<li class="nav-item">
  <a class="nav-link @if ( $title != 'Tugas')
            collapsed
            @endif" href="{{route('tugas')}}">
    <i class="bi bi-broadcast"></i>
    <span>Tugas</span>
  </a>
</li><!-- End Profile Page Nav -->




<li class="nav-item">
  <a class="nav-link @if ( $title != 'View Projek')
            collapsed
            @endif" href="{{route('surveyorprojek')}}">
            <i class="bi bi-clipboard-plus"></i>
    <span>AHSP</span>
  </a>
</li><!-- End Profile Page Nav -->
@endif



{{-- Kontraktor --}}

@if (auth()->user()->role == "kontraktor")

    <li class="nav-item">
      <a class="nav-link @if ( $title != 'Daftar Kontraktor')
                collapsed
                @endif" href="{{route('kontraktor')}}">
        <i class="bi bi-broadcast"></i>
        <span>Kontraktor</span>
      </a>
    </li><!-- End Profile Page Nav -->

    @if (auth()->user()->is_active == 41)
      
    
<li class="nav-item">
  <a class="nav-link @if ( $title != 'View Projek')
            collapsed
            @endif" href="{{route('kontraktorprojek')}}">
    <i class="bi bi-broadcast"></i>
    <span>AHSP</span>
  </a>
</li><!-- End Profile Page Nav -->

@endif
  @endif


  @if (auth()->user()->role == "kabid")
    
    <li class="nav-item">
      <a class="nav-link @if ( $title != 'Persetujuan Kontraktor')
                collapsed
                @endif" href="{{route('kontraktor.acckontraktor')}}">
        <i class="bi bi-broadcast"></i>
        <span>Persetujuan Kontraktor</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link @if ( $title != 'Persetujuan AHSP')
                collapsed
                @endif" href="{{route('kabid.listahsp')}}">
        <i class="bi bi-broadcast"></i>
        <span>Persetujuan AHSP</span>
      </a>
    </li><!-- End Profile Page Nav -->

    @endif

  

  

  </ul>

</aside>