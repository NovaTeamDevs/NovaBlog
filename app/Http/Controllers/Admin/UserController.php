<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UploadService\UploadService;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserUpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserCreateRequest $request, UploadService $uploadService)
    {
        $inputs = $request->validated();

        if ($request->hasFile('avatar')) {
            $result = $uploadService->folder('users')->upload($request->file('avatar'));

            if (!$result) {
                return to_route('admin.user.create')->with('warning', 'مکشلی در آپلود تصویر پیش آمده است');
            }

            $inputs['avatar'] = $result;
        }

        $user = User::create($inputs);

        $user->markEmailAsVerified();

        return to_route('admin.user.index')->with('success', 'کاربر با موفقیت ایجاد شد.');
    }

    public function show($id)
    {
        return view('admin.user.show');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user, UploadService $uploadService)
    {
        $inputs = $request->validated();

        if ($request->hasFile('avatar')) {
            if (!empty($user->avatar)) {
                $uploadService->delete($user->avatar);
            }

            $result = $uploadService->folder('users')->upload($request->file('avatar'));

            if (!$result) {
                return to_route('admin.user.edit')->with('warning', 'مکشلی در آپلود تصویر پیش آمده است');
            }

            $inputs['avatar'] = $result;
        }

        if (!$request->filled('password')) {
            $inputs['password'] = $user->password;
        }

        $user->update($inputs);

        return to_route('admin.user.index')->with('success', 'کاربر با موفقیت ویرایش شد.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'حذف کاربر مورد نظر انجام شد.'
        ]);
    }
}
