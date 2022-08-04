<div class="modal fade" id="uploadSuratKuasa{{$permohonan->id_permohonan}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Surat Kuasa Pemohon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('upload.SuratKuasa') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <table width="100%" class="table ">
                        
                        <tr style="background-color: rgb(145, 207, 104); ">
                            <td class="text-center text-white">Unggah E-doc Surat Kuasa</td>  
                        </tr>
                        
                        <tr>
                            <input type="hidden" name="id_permohonan" value="{{ $permohonan->id_permohonan }}">
                            <td><input type="file" name="surat_kuasa" id="surat_kuasa" ></td>
                        </tr>
                    </table>
                  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>