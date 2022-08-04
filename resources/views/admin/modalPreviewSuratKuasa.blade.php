<div class="modal fade" id="previewSuratKuasa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Preview Surat Kuasa Pemohon</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <embed src="{{ asset('/storage/surat_kuasa/'.$permohonan->surat_kuasa) }}" width="100%" height="500" alt="pdf" />
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="kembali-btn">Kembali</button>
        </div>
      </div>
    </div>
  </div>
  