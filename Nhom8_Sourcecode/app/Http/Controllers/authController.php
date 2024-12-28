<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class authController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password) || $user->delUser == 1) {
            return redirect('/auth');
        }

        Auth::login($user);
        switch (Auth::user()->role_id) {
            case 1:
                return redirect('/admin');
            case 2:
                return redirect('/staff');
            case 3:
                return redirect('/');
            default:
                return redirect('/');
        }
    }

    public function auth()
    {
        return view("member.auth");
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:10|unique:users,phone',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);
    
        // Tạo người dùng mới
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role_id' => 3,
        ]);
        // Chuyển hướng với thông báo
        return redirect('/auth')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    public function registerForStaff(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role_id' => 2,
        ]);
        return redirect('admin/staff')->with('success', 'Thêm nhân viên thành công!');
    }

    public function updateForStaff(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$request->staffId,
            'phone' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        $dataUpdate = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        );
        if (!empty($request->password)) {
            $dataUpdate['password'] = Hash::make($request->password);
        }

        User::where('id', $request->staffId)
            ->where('role_id', '=', 2)
            ->update($dataUpdate);
        return redirect('admin/staff')->with('success', 'Sửa thông tin nhân viên thành công!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function addStaff()
    {
        return view('admin.add-staff');
    }

    public function editStaff($id)
    {
        $staff = User::where('id', $id)
            ->where('role_id', '=', 2)->first();

        if (empty($staff)) {
            return redirect('admin/errors')->withErrors(['msg' => 'Staff not exist!']);
        }

        return view('admin.edit-staff', compact('staff'));
    }

    public function lockUser($id)
    {
        User::where('id', $id)
            ->where('role_id', '!=', 1)
            ->update(['delUser' => 1]);

        return back()->with('success', 'Nhân viên đã bị khóa thành công!');
    }

    public function unLockUser($id)
    {
        User::where('id', $id)
            ->where('role_id', '!=', 1)
            ->update(['delUser' => 0]);

        return back()->with('success', 'Nhân viên đã được mở khóa thành công!');
    }

    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }
    public function changePassword(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'Mật khẩu hiện tại không đúng.',
            ]);
        }

        // Đổi mật khẩu
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('changePasswordForm')->with('status', 'Đổi mật khẩu thành công!');
    }
}
// comment
