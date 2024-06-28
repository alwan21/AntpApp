<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class UserController extends Controller
{
    //
    public function index()
    {
        if(request()->ajax()){
            $DataUser = User::all();
            $DataUser = $DataUser->map(function($DataUser){
                return [
                    'id' => $DataUser->id,
                    'name' => $DataUser->name,
                    'username' => $DataUser->username,
                    'contact' => $DataUser->contact,
                    'email' => $DataUser->email,
                    'created_at' => date('Y-m-d', strtotime($DataUser->created_at)),
                    'updated_at' => date('Y-m-d', strtotime($DataUser->updated_at)),
                    'role' => $DataUser->role,
                    'status' => $DataUser->status

                ];
            });
            return datatables()->of($DataUser)->toJson();
        }
        return view('datauser',[
            'title' => 'Data User'
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if(!$request->has('status')){
            $data['status'] = 1;
        }else{
            $data['status']  = $data['status'] == 'on' ? 1 : 0;
        }
        $add = User::create($data);
        if($add){
            return response()->json([
                'message' => 'Data Berhasil Ditambahkan',
            ]);
        }else{
            return response()->json([
                'message' => $data,
            ]);
        }
    }

    public function delete($id)
    {
        $DataUser = User::find($id);
        $DataUser->delete();
        return response()->json([
            'success' => true
        ]);
    }

    public function edit($id)
    {
        $data = User::find($id);
        if($data){
            return response()->json($data);
        }else{
            return response()->json(['message' => 'Data Tidak Ditemukan']);
        }
    }

    public function update(Request $request, $id)
    {
        $DataUser = User::find($id);
        $DataUser['name'] = $request->name;
        $DataUser['username'] = $request->username;
        $DataUser['email'] = $request->email;
        $DataUser['contact'] = $request->contact;
        $DataUser['role'] = $request->role;
        $DataUser['updated_at'] = date('Y-m-d H:i:s');
        $DataUser['status'] = $request->status == 'on' ? 1 : 0;
        
        if($request->password != null or $request->password != ''){
            $DataUser['password'] = bcrypt($request->password);
        }
        $DataUser->save();
        
        return response()->json([
            'message' => 'Data Berhasil Diupdate',
        ]);
    }
}
