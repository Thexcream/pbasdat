<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use Illuminate\Http\Request;

class KerjasamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kerjasama::get()->sum('id');
       
        if($data){
            $getdata = Kerjasama::firstOrFail();           

            return view('kerjasama.edit')->with([
                'id' => $getdata->id,
                'rpb' => $getdata->rpb,
                'kp1' =>  $getdata->kp1,
                'kp2' => $getdata->kp2,
                'kp3' => $getdata->kp3,
                'jeniskerjasama' => $getdata->jeniskerjasama,
                'jumlahijazah' => $getdata->jumlahijazah,
                'nama1' => $getdata->nama1,
                'nama2' => $getdata->nama2,
                'jabatan1' => $getdata->jabatan1,
                'jabatan2' => $getdata->jabatan2,
                'kcm' => $getdata->kcm,
                'ps' => $getdata->ps,
                'sp' => $getdata->sp,
                'penjadwalan' => $getdata->penjadwalan,
                'skijazah' => $getdata->skijazah,
                'ksl' => $getdata->ksl,
                'studimoa' => $getdata->studimoa,
            ]);

        }else{
            return view('kerjasama.create');
        }

        //return view('kerjasama.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rpb'=> 'required|max:10000',   
            'kp1'=> 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            'kp2'=> 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            'kp3'=> 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            'jeniskerjasama'=> 'required',
            'jumlahijazah'=> 'required',
            'nama1'=>'required|max:10000',
            'nama2'=> 'required|max:10000', 
            'jabatan1'=> 'required|max:10000', 
            'jabatan2'=> 'required|max:10000', 
            'kcm'=> 'required|max:10000', 
            'ps'=> 'required|max:10000', 
            'sp'=> 'required|max:10000', 
            'penjadwalan'=> 'required|mimes:csv,txt,xlx,xls,pdf|max:2048', 
            'skijazah'=> 'required|mimes:csv,txt,xlx,xls,pdf|max:2048', 
            'ksl'=> 'required|max:10000', 
            'studimoa'=> 'required',        
        ]);

        if($validatedData){           
            //Move Uploaded File
            $kp1 = time().'.'.$request->kp1->extension();  
            $kp2 = time().'.'.$request->kp2->extension();
            $kp3 = time().'.'.$request->kp3->extension();
            $penjadwalan = time().'.'.$request->penjadwalan->extension();
            $skijazah = time().'.'.$request->skijazah->extension();
      
            $request->kp1->move(base_path('\public\kp1'), $kp1);
            $request->kp2->move(base_path('\public\kp2'), $kp2);
            $request->kp3->move(base_path('\public\kp3'), $kp3);
            $request->penjadwalan->move(base_path('\public\penjadwalan'), $penjadwalan);
            $request->skijazah->move(base_path('\public\skijazah'), $skijazah);

            $data = [
                'id' => $request->id,
                'rpb' => $request->rpb,
                'kp1' => $kp1,
                'kp2' => $kp2,
                'kp3' => $kp3,
                'jeniskerjasama' => $request->jeniskerjasama,
                'jumlahijazah' => $request->jumlahijazah,
                'nama1' => $request->nama1,
                'nama2' => $request->nama2,
                'jabatan1' => $request->jabatan1,
                'jabatan2' => $request->jabatan2,
                'kcm' => $request->kcm,
                'ps' => $request->ps,
                'sp' => $request->sp,
                'penjadwalan' => $penjadwalan,
                'skijazah' => $skijazah,
                'ksl' => $request->ksl,
                'studimoa' => $request->studimoa,
            ];

            Kerjasama::create($data);

            return redirect('kerjasama')->with('success', "Berhasil di simpan !..");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kerjasama $kerjasama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kerjasama $kerjasama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'rpb'=> 'required|max:10000',   
            'jeniskerjasama'=> 'required|max:10000',
            'jumlahijazah'=> 'required|max:10000',
            'nama1'=>'required|max:10000',
            'nama2'=> 'required|max:10000', 
            'jabatan1'=> 'required|max:10000', 
            'jabatan2'=> 'required|max:10000', 
            'kcm'=> 'required|max:10000', 
            'ps'=> 'required|max:10000', 
            'sp'=> 'required|max:10000', 
            'ksl'=> 'required|max:10000', 
            'studimoa'=> 'required',           
        ]);

        if($request->kp1 != null){
            $validatedData += [
                'kp1'=>'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            ];           
        }  

        if($request->kp2 != null){
            $validatedData += [
                'kp2'=>'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            ];           
        } 
        
        if($request->kp3 != null){
            $validatedData += [
                'kp3'=>'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            ];           
        }  
        
        if($request->penjadwalan != null){
            $validatedData += [
                'penjadwalan'=>'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            ];           
        }    

        if($request->skijazah != null){
            $validatedData += [
                'skijazah'=>'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            ];           
        }    


        if($validatedData){       
                   
            $data = [
                'rpb' => $request->rpb,
                'jeniskerjasama' => $request->jeniskerjasama,
                'jumlahijazah' => $request->jumlahijazah,
                'nama1' => $request->nama1,
                'nama2' => $request->nama2,
                'jabatan1' => $request->jabatan1,
                'jabatan2' => $request->jabatan2,
                'kcm' => $request->kcm,
                'ps' => $request->ps,
                'sp' => $request->sp,
                'ksl' => $request->ksl,
                'studimoa' => $request->studimoa,
            ];

            if ($request->kp1 != null) {
                $filekp1 = time() . '.' . $request->kp1->extension();
                $request->kp1->move(base_path('\public\Filekp1'), $filekp1);
            
                $data += [
                    'kp1' => $filekp1,
                ];
            }
            
            if ($request->kp2 != null) {
                $filekp2 = time() . '.' . $request->kp2->extension();
                $request->kp2->move(base_path('\public\Filekp2'), $filekp2);
            
                $data += [
                    'kp2' => $filekp2,
                ];
            }
            
            if ($request->kp3 != null) {
                $filekp3 = time() . '.' . $request->kp3->extension();
                $request->kp3->move(base_path('\public\Filekp3'), $filekp3);
            
                $data += [
                    'kp3' => $filekp3,
                ];
            }
            
            if ($request->penjadwalan != null) {
                $filepenjadwalan = time() . '.' . $request->penjadwalan->extension();
                $request->penjadwalan->move(base_path('\public\Filepenjadwalan'), $filepenjadwalan);
            
                $data += [
                    'penjadwalan' => $filepenjadwalan,
                ];
            }
            
            if ($request->skijazah != null) {
                $fileskijazah = time() . '.' . $request->skijazah->extension();
                $request->skijazah->move(base_path('\public\Fileskijazah'), $fileskijazah);
            
                $data += [
                    'skijazah' => $fileskijazah,
                ];
            }
            

            $kerjasama = Kerjasama::FindOrFail($id);
            $kerjasama->update($data);
            
            return redirect('kerjasama')->with('success', "Berhasil di Update !..");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kerjasama $kerjasama)
    {
        //
    }
}
