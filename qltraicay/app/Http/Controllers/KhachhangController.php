<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class KhachhangController extends Controller
{

    public function getList()
    {
        $data = DB::table('khachhang')->get();
    	return view('backend.khachhang.danhsach',compact('data'));
    }

    public function getAdd()
    {
    	# code...
    }

    public function postAdd()
    {
    	# code...
    }

    public function getDelete($id)
    {
		//kiem tra don hang
		//kiem tra xem co san pham hay ko
		$donhang = DB::table('donhang')->select('id')->where('khachhang_id',$id)->get();
        foreach ($donhang as $key => $val) {
            $khmai[] = $val->id;
        }
		if (!empty($khmai)) {
			return redirect()->route('admin.khachhang.list')->with(['flash_level'=>'success','flash_message'=>'Có đơn hàng của khách hàng này không thể xóa!!!']);
        }
		
    	$id_user = DB::table('khachhang')
            ->select('user_id')
            ->where('id',$id)
            ->first();
        DB::table('khachhang')->where('id',$id)->delete();
        DB::table('users')->where('id',$id_user->user_id)->delete();
        return redirect()->route('admin.khachhang.list')->with(['flash_level'=>'success','flash_message'=>'Xóa khách hàng thành công!!!']);
    }

    public function getEdit()
    {
    	# code...
    }

    public function postEdit()
    {
    	# code...
    }

    public function getHistory($id)
    {
        $khachhang = DB::table('khachhang')->where('id',$id)->first();
        $donhang = DB::table('donhang')->where('khachhang_id',$id)->get();
        return view('backend.khachhang.lichsu',compact('khachhang','donhang'));
    }
}
