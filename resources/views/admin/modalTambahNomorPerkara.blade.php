<div class="modal fade" id="tambahNomorPerkara" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Nomor Perkara Pemohon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('inputNomorPerkara') }}" method="POST" id="form-upload" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <table width="100%" class="table ">
                        
                        <tr style="background-color: rgb(145, 207, 104); ">
                            <td class="text-white">Input Nomor Perkara Pemohon</td>  
                        </tr>
                        
                        <tr>
                            <input type="hidden" name="id_permohonan" value="{{ $permohonan->id_permohonan }}">
                            <td>
                                <div class="input-group">
                                        <input id="nomor" name="nomor" type="text" class="form-control " placeholder="0000" maxlength="4">
                                        <input  type="text" class="form-control" value="Pdt.G" readonly="" >
                                        
                                       

                                        <select id="tahun" name="tahun" class="form-control " >
                                            @php
                                                $currently_selected = date('Y'); 
                                                $earliest_year = 2022;
                                                $latest_year = date('Y'); 
                                            @endphp
                                           
                                            @foreach (range($latest_year,$earliest_year) as $year)
                                                <option  value="{{ $year }}" {{ $year === $currently_selected ? 'selected' : '' }} >{{ $year }}</option>
                                            @endforeach
                                        </select>
                
                                        <input type="text" id="kode_satker" class="form-control text-center" value="PA.Tbh" readonly="">

                                        <button id="cari-nomor-perkara" type="button" class="btn btn-success"><i class="fa fa-search"></i></button>
                                    </div>

                                    <div class="text-center">
                                        <div  id="spinner" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                            </td>
                        </tr>
                    </table>


                    <div id="detail_perkara"></div>
                    <div id="info" class="mt-4"></div>
                  
                    <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal" id="kembali-btn">Kembali</button>
                        <button type="submit" class="btn btn-md btn-primary d-none" id="simpan-btn">Simpan</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>