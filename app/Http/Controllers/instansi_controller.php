<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\instansi_model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; 


class instansi_controller extends Controller
{
    public function index()
    {
        $posts = instansi_model::get();
        return response()->json([
            'success' => true,
            'message' => 'Data List',
            'data'    => $posts,
            'count'   => count($posts)
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'aksi' => 'required',
            'instansi' => 'required',
            'deskripsi' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $post = instansi_model::create([
            'aksi' => $request->get('aksi'),
            'instansi' => $request->get('instansi'),
            'deskripsi' => $request->get('deskripsi'),
        ]); 
        if ($post) {
            return response()->json([
                'status'  => true,
                'message' => 'Data successfully added',
            ], 200);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Data failed to add'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'aksi' => 'required',
            'instansi' => 'required',
            'deskripsi' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $post = instansi_model::where('id', $id)->update([
            'aksi'      => $request->aksi,
            'instansi'  => $request->instansi,
            'deskripsi'  => $request->deskripsi,
        ]);
        if ($post) {
            return response()->json([
                'status'  => true,
                'message' => 'Data successfully updated',
                'data'    => $post
            ], 200);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Data failed to update'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $post = DB::table('tb_instansi')
            ->where('id', $id)->delete();
        if($post){
            return response()->json([
                'success' => true,
                'message' => 'Data successfully deleted'
            ], 200);
        }
        //data post tidak ditemukan
        return response()->json([
            'success' => false,
            'message' => 'Data not found'
        ]);
    }
}
