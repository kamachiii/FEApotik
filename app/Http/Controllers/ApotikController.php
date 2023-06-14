<?php

namespace App\Http\Controllers;

use App\Http\Libraries\BaseApi;
use Illuminate\Http\Request;

class ApotikController extends Controller
{
    protected $baseApi;
    public function __construct()
    {
        $this->baseApi = new BaseApi();
    }

    public function dashboard()
    {
        $data = $this->baseApi->dashboard('/api/apotek/dashboard');
        $data = $data->json();
        $data = $data['data'];
        $i = 0;
        $k = 0;
        foreach($data as $key){
            if($key['deleted_at'] != null){
                ++$i;
            }else{
                ++$k;
            }
        }

        $resp['jml'] = count($data);
        $resp['delete'] = $i;
        $resp['ada'] = $k;

        return view('dashboard')->with([
            'data' => $resp,
            'title' => 'Dashboard'
        ]);
    }

    public function index()
    {
        $data = $this->baseApi->index('/api/apotek');
        $data = $data->json();

        return view('index')->with([
            'title' => 'Apotek Table',
            'datas' => $data['data']
        ]);
    }

    public function create()
    {
        return view('create')->with('title', 'Create');
    }

    public function store (Request $request)
    {
        if($request->rujukan == 1) {
            $rujukan = 1;
        }else {
            $rujukan = 0;
        }
        $data = [
            'nama' => $request->nama,
            'rujukan' => $rujukan,
            'rumah_sakit' => $request->rumah_sakit,
            'obat' => $request->obat,
            'harga_satuan' => $request->harga_satuan,
            'apoteker' => $request->apoteker
        ];
        $response = $this->baseApi->create('/api/apotek/create', $data);
            if($response->failed()){
                $errors = $response->json('data');
                return redirect()->route('create')->with(['errors' => $errors]);
            }

        return redirect(route('index'));
    }

    public function show($id)
    {
        $data = ['id' => $id];
        $response = $this->baseApi->show('/api/apotek/show/'.$id, $data);

        return view('edit')->with([
            'data' => $response['data'],
            'title' => 'Edit'
        ]);

    }

    public function update(Request $request, $id)
    {
        if($request->rujukan == 1) {
            $rujukan = 1;
        }else {
            $rujukan = 0;
        }
        $data = [
            'nama' => $request->nama,
            'rujukan' => $rujukan,
            'rumah_sakit' => $request->rumah_sakit,
            'obat' => $request->obat,
            'harga_satuan' => $request->harga_satuan,
            'apoteker' => $request->apoteker
        ];
        $response = $this->baseApi->update('/api/apotek/update/'.$id, $data);

        if ($response->failed()) {
            $errors = $response->json('data');
            return redirect()->back()->with('errors', $errors);
        }else {
            return redirect('/apotek')->with('success', 'Berhasil mengubah data/apotek dari API');
        }
    }

    public function destroy($id)
    {
        $data = ['id' => $id];
        $response = $this->baseApi->destroy('/api/apotek/delete/'.$id, $data);

        if ($response->failed()) {
            $errors = $response->json('data');
            return redirect()->back()->with('errors', $errors);
        }else {
            return redirect('/apotek')->with('success', 'Berhasil menghapus data');
        }
    }

    public function softDeletes()
    {
        $data = $this->baseApi->index('/api/apotek/trash/all');
        $data = $data->json();

        return view('softDeletes')->with([
            'title' => 'SoftDeletes Table',
            'datas' => $data['data']
        ]);
    }

    public function restore($id)
    {
        $data = ['id' => $id];
        $this->baseApi->restore('/api/apotek/trash/restore/'.$id, []);

        return redirect('/softDelete');
    }

    public function hardDelete($id)
    {
        $data = ['id' => $id];
        $this->baseApi->destroy('/api/apotek/trash/permanent/'.$id, $data);

        return redirect('/softDelete');
    }

}
