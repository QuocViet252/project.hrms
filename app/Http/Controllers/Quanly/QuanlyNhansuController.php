<?php

namespace App\Http\Controllers\Quanly;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class QuanlyNhansuController extends Controller
{
    public function index(Request $request){
				$request->user()->authorizeRoles(['admin']);
        $getData = DB::table('users')->select('*')->get();

	    	return view('admin.Dashboard.nhansu')->with('listnhansu',$getData);
    }
    public function create(){
        return view('admin.Dashboard.create');
    }

    public function store(Request $request){
			//Lấy giá trị nhân sự đã nhập
			$allRequest  = $request->all();
			$name  = $allRequest['name'];
			$email = $allRequest['email'];
			$role = $allRequest['role'];
			$salary = $allRequest['salary'];
			$phone = $allRequest['phone'];
			
			//Gán giá trị vào array
			$dataInsertToDatabase = array(
				'name'  => $name,
				'email' => $email,
				'role' => $role,
				'salary' => $salary,
				'phone' => $phone,
			);
			
			$insertData = DB::table('users')->insert($dataInsertToDatabase);
			
			//Kiểm tra Insert để trả về một thông báo
			if ($insertData) {
				Session::flash('success', 'Thành công!');
			}else {                        
				Session::flash('error', 'Thất bại!');
			}
			
			//Thực hiện chuyển trang
			return redirect('nhansu');
		}
		public function destroy($id){
			$deleteData = DB::table('users')->where('id', '=', $id)->delete();
	
			//Kiểm tra lệnh delete để trả về một thông báo
			if ($deleteData) {
				Session::flash('success', 'Thành công!');
			}else {                        
				Session::flash('error', 'Thất bại!');
			}
			
			//Thực hiện chuyển trang
			return redirect('nhansu');
		}

		public function edit($id)
		{
			$getData = DB::table('users')->select('id', 'name','email','phone', 'role', 'salary')->where('id','=',$id)->get();
	
			return view('admin.Dashboard.edit', compact('getData', $getData));
			
		}

		public function update(Request $request, $id)
		{
		
			$updateData = DB::table('users')->where('id', $request->id)->update([
				'id' => $request->id,
				'name' => $request->name,
				'email' => $request->email,
				'phone' => $request->phone,
				'role' => $request->role,
				'salary' => $request->salary,
			]);
			
			//Kiểm tra lệnh update để trả về một thông báo
			if ($updateData) {
				Session::flash('success', 'Thành công!');
			}else {                        
				Session::flash('error', 'Thất bại!');
			}
			
			//Thực hiện chuyển trang
		 	//return redirect('nhansu')->with('update', $updateData);
			return redirect('nhansu');
			//dd($updateData);
		}
}
