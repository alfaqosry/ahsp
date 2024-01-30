{{-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
</footer> --}}
<div class="modal fade" id="logout" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin Logout ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a href="{{route('logout')}}"  class="btn btn-primary">Logout</a>
      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->

<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>{{config('master.aplikasi.nama')}}</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      
    </div>
  </footer>