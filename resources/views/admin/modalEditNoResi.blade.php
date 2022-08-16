<div class="modal fade" id="editResiPos" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Nomor Resi POS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('inputNomorResi') }}" method="POST" id="form-upload" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <table width="100%" class="table ">
                        
                        <tr style="background-color: rgb(145, 207, 104); ">
                            <td class="text-white">Edit Nomor Resi POS</td>  
                        </tr>
                        
                        <tr>
                            <input type="hidden" name="id_permohonan" value="{{ $permohonan->id_permohonan }}">
                             <td>
                                <input type="text" name="no_resi" class="form-control" value="{{ $permohonan->resi_pos }}" autofocus required>
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