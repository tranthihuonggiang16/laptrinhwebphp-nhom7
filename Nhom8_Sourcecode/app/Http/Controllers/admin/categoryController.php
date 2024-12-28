<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class categoryController
{

    public function lock($id){
        DB::table('categories')
        ->where('id', $id)
        ->update([
        'delCategory' => 1,
        ]);
        return back();
    }

    public function unLock($id){
        DB::table('categories')
        ->where('id', $id)
        ->update([
        'delCategory' => 0,
        ]);
        return back();
    }

    public function update(Request $request,$id){
       // Kiểm tra tính trùng lặp
    $existingCategory = DB::table('categories')
    ->where('nameCategory', $request->input('nameCategory'))
    ->where('id', '!=', $id) // Loại trừ chính danh mục đang chỉnh sửa
    ->first();

if ($existingCategory) {
    return back()->withErrors(['nameCategory' => 'Tên danh mục đã tồn tại.']);
}

// Cập nhật nếu không trùng lặp
DB::table('categories')
    ->where('id', $id)
    ->update([
        'nameCategory' => $request->input('nameCategory')
    ]);

return back()->with('success', 'Sửa danh mục thành công!');
    }
    public function store(Request $request){
          // Validate dữ liệu đầu vào
    $request->validate([
        'nameCategory' => 'required|string|unique:categories,nameCategory',
    ]);

    // Thêm danh mục nếu không trùng lặp
    DB::table('categories')->insert([
        'nameCategory' => $request->input('nameCategory'),
    ]);

    return back()->with('success', 'Danh mục đã được thêm thành công!');
    }
}
