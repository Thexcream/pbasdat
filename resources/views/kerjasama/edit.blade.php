@extends('layout.index')

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-solid" role="alert"><b>Data Kerjasama</b> {{ Session::get('success') }}</div>  
@endif 

@include('kerjasama.daftar')

<!-- Content Row -->
<div class="card">
    <div class="card-header">
        <b>BAB 4. RENCANA PELAKSANAAN KERJASAMA</b>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">No Berkas</div>
            <div class="col-sm-8">: 2305140001.1</div>
            <div class="col-sm-4">Judul Kerma</div>
            <div class="col-sm-8">: Gelar Ganda ( Double Degree ) Universitas Halu Oleo S2 Perternakan Dengan PT. ABC Perternakan Unpad</div>
        </div>   
        <br/>
        <div class="alert text-center text-light" style="background-color: #012F8B;" role="alert">
           <b>KESIAPAN PELAKSANAAN KERJA SAMA</b>
        </div>

        <form action="{{ url('kerjasama',$id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">RENCANA PELAKSANAAN PEMBELAJARAN<span class="text-danger">*</span></label>
                <div class="col-sm-8">
                      <div class="mb-3">
                          <textarea name="rpb" id="inputrpb" class="form-control" rows="4">{{ $rpb }}</textarea>
                      </div>
                      @error('rpb')
                         <span class="text-danger">{{ $message }}</span>
                      @endif
                      <small class="text-danger">Maks. 1800 karakter</small>
                </div>
              </div>
              <hr/>                     
  
              <div class="row mb-3">
                <label class="col-sm-4 col-form-label">DESAIN KURIKULUM<span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <div class="d-flex flex-row-reverse">
                        <hr style="height: 1px; background-color: black; margin-left: 0; margin-right: 0;">
                        <div class="p-2"></div>
                        <div class="mb-3">
                            <label class="form-label">Gabungan:</label>
                            <hr>
                            <label class="form-label">Kurikulum Prodi</label>
                            <input name="kp1" class="form-control" type="file" id="formFile">
                            <small class="text-danger">Maks. 500 KB</small>
                            <a href="{{ asset('/') }}kp1/{{ $kp1 }}" target="_blank">Kurikulum_Prodi_{{ $kp1 }}</a>
                        </div>
                        
                        @error('desain')
                        <span class="text-danger">{{ $message }}</span>
                        @endif
                        <div class="p-2"></div>
                        <div class="mb-3">
                            <label class="form-label">PT Mitra:</label>
                            <hr>
                            <label class="form-label">Kurikulum Prodi</label>
                            <input name="kp2" class="form-control" type="file" id="formFile">
                            <small class="text-danger">Maks. 500 KB</small>
                            <a href="{{ asset('/') }}kp2/{{ $kp2 }}" target="_blank">Kurikulum_Prodi{{ $kp2 }}</a>
                        </div>
                        @error('desain')
                        <span class="text-danger">{{ $message }}</span>
                        @endif
                        <div class="p-2"></div>
                        <div class="mb-3">
                            <label class="form-label">PT:</label>
                            <hr>
                            <label class="form-label">Kurikulum Prodi</label>
                            <input name="kp3" class="form-control" type="file" id="formFile">
                            <small class="text-danger">Maks. 500 KB</small>
                            <a href="{{ asset('/') }}kp3/{{ $kp3 }}" target="_blank">Kurikulum_Prodi{{ $kp3 }}</a>
                        </div>
                        
                        @error('desain')
                        <span class="text-danger">{{ $message }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <hr/>
  
            <div class="row mb-3" style="background-color: #98FB98;">
                <label class="col-sm-4 col-form-label">JENIS KERJA SAMA<span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <div class="p-3" >
                        <select class="form-control" id="inputkerjasama" name="jeniskerjasama">
                            <option value="Gelar Ganda (Double Degree)" {{ isset($kerjasama) && $kerjasama->jeniskerjasama == 'GelarGanda' ? 'selected' : '' }}>Gelar Ganda (Double Degree)</option>
                            <option value="S1" {{ isset($kerjasama) && $kerjasama->jeniskerjasama == 'S1' ? 'selected' : '' }}>S1</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr/>
  
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">JUMLAH IJAZAH YANG AKAN DITERBITKAN<span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <label class="form-label">Ditulis dalam angka (1, 2, ...)</label>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea name="jumlahijazah" class="form-control" id="inputjumlahijazah" style="height: 100px">{{ $jumlahijazah }}</textarea>
                        </div>
                        @error('jumlahijazah')
                        <span class="text-danger">{{ $message }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <hr/>
  
            <div class="row">
                <label class="col-sm-4 col-form-label">PENANDATANGANAN IJAZAH<span class="text-danger">*</span></label>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row mb-3">
                        <div class="col-sm-6 offset-sm-10">
                            <div class="form-floating">
                                <label class="form-label">PT:</label>
                                <hr/>
                                <label class="form-label">Nama</label>
                                <textarea name="nama1" class="form-control" id="inputnama" style="height: 100px">{{ $nama1 }}</textarea>
                            </div><!-- First box content goes here -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row mb-3">
                        <div class="col-sm-6 offset-sm-6">
                            <div class="form-floating">
                                <label class="form-label">PT Mitra:</label>
                                <hr/>
                                <label class="form-label">Nama</label>
                                <textarea name="nama2" class="form-control" id="inputnama" style="height: 100px">{{ $nama2 }}</textarea>
                            </div><!-- Fourth box content goes here -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row mb-6">
                        <div class="col-sm-6 offset-sm-10">
                            <div class="form-floating">
                                <label class="form-label">Jabatan</label>
                                <textarea name="jabatan1" class="form-control" id="inputjabatan" style="height: 100px">{{ $jabatan1 }}</textarea>
                            </div><!-- Third box content goes here -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row mb-3">
                        <div class="col-sm-6 offset-sm-6">
                            <div class="form-floating">
                                <label class="form-label">Jabatan</label>
                                <textarea name="jabatan2" class="form-control" id="tandatanganijazah" style="height: 100px">{{ $jabatan2 }}</textarea>
                            </div><!-- Fourth box content goes here -->
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
  
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">KRITERIA CALON MAHASISWA<span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea name="kcm" id="inputkcm" class="form-control" rows="4">{{ $kcm }}</textarea>
                        </div>
                        @error('kcm')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <small class="text-danger">Maks. 1800 karakter</small>
                </div>
            </div>
            <hr/>
  
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">PROSES SELEKSI<span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea name="ps" id="inputps" class="form-control" rows="4">{{ $ps }}</textarea>
                            @error('ps')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <small class="text-danger">Maks. 1800 karakter</small>
                    </div>
                </div>
            </div>
            <hr/>
  
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">SKEMA PEMBIAYAAN<span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea name="sp" id="inputsp" class="form-control" rows="4">{{ $sp }}</textarea>
                            <small class="text-danger">Maks. 1800 karakter</small>
                        </div>
                    </div>
                    @error('sp')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <hr/>
  
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">PENJADWALAN PROGRAM KERJA SAMA<span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <div class="mb-3">
                        <input name="penjadwalan" class="form-control" type="file" id="inputpenjadwalan">
                        <small class="text-danger">Maks. 2MB</small>
                        <a href="{{ asset('/') }}penjadwalan/{{ $penjadwalan }}" target="_blank">Kurikulum_Prodi_{{ $penjadwalan }}</a>
                    </div>
                </div>
            </div>
            
            @error('penjadwalan')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <hr/>
  
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">SURAT KETERANGAN PENDAMPING IJAZAH (SKPI)<span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <div class="mb-3">
                        <input name="skijazah" class="form-control" type="file" id="inputskijazah">
                        <small class="text-danger">Maks. 2MB</small>
                        <a href="{{ asset('/') }}skijazah/{{ $skijazah }}" target="_blank">Kurikulum_Prodi{{ $skijazah }}</a>
                    </div>
                </div>
            </div>
            
            @error('skijazah')
            <span class="text-danger">{{ $message }}</span>
            @endif
            <hr/>
  
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">KEBERLANJUTAN UNTUK STUDI LANJUT (DESKRIPSI)<span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea name="ksl" id="inputksl" class="form-control" rows="4">{{ $ksl }}</textarea>
                            @error('ksl')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <small class="text-danger">Maks. 1800 karakter</small>
                    </div>
                </div>
            </div>
            <hr/>

            <div class="row mb-3">
                  <label class="col-sm-4 col-form-label">Studi Lanjut MOA </label>
                  <div class="col-sm-8">
                        <div class="mb-3">
                          <label class="col-sm-8 col-form-label">Apakah hal tersebut tercantum dalam MOA? </label>
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="studimoa" id="studimoa" value="ya" {{ ($studimoa == "ya") ? 'checked' : ' '; }}>
                              <label class="form-check-label" for="studimoa">
                                Ya
                              </label>
                            </div>
                            <!-- checked -->
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="studimoa" id="studimoa1" value="tidak" {{ ($studimoa == "tidak") ? 'checked' : ' '; }}>
                              <label class="form-check-label" for="studimoa1">
                                Tidak
                              </label>
                            </div>
                            @error('studimoa')
                                <span class="text-danger">{{ $message }}</span>
                            @endif
                        </div>
                  </div>
              </div>
              <hr/>

            <div class="d-flex flex-row-reverse bd-highlight">
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </div>

        </form>

    </div>
</div>            
    
@endsection