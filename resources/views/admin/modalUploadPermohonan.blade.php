<div class="modal fade" id="uploadSuratPermohonan{{$permohonan->id_permohonan}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Surat Pernyataan Pemohon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('upload.SuratPermohonan') }}" id="form-upload" method="POST" enctype="multipart/form-data" id="form-upload">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <table width="100%" class="table ">
                        
                        <tr style="background-color: rgb(145, 207, 104); ">
                            <td class="text-center text-white">Unggah E-doc Surat Pernyataan</td>  
                        </tr>
                        
                        <tr>
                            <input type="hidden"  name="id_permohonan" value="{{ $permohonan->id_permohonan }}">
                           
                            <td>
                                <input type="file" name="surat_pernyataan" id="surat_pernyataan" >
                                <div class="text-center">
                                    <div  id="spinner" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                             </td>

                            
                        </tr>
                    </table>
                  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="kembali-btn">Kembali</button>
                        <button type="submit" class="btn btn-md btn-primary" id="simpan-btn">Simpan</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>