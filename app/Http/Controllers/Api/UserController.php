<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserProfileResource;
use App\Services\UploadService\UploadService;
use App\Http\Requests\Api\UpdateUserAvatarRequest;
use App\Http\Requests\Api\UpdateUserProfileRequest;
use App\Http\Requests\Api\UpdateUserPasswordRequest;
use App\Http\Requests\Api\UpdateUserRequest;

class UserController extends Controller
{
    public function getUserData()
    {
        $user = auth()->user();

        return $this->successResponse(
            UserProfileResource::make($user),
        );
    }

    public function updateProfile(UpdateUserProfileRequest $request)
    {
        $user = auth()->user();

        $user->update($request->validated());

        return $this->successResponse(
            UserProfileResource::make($user),
            'پروفایل شما بروز شد'
        );
    }

    public function updateAvatar(UpdateUserAvatarRequest $request, UploadService $uploadService)
    {
        $user = auth()->user();

        if (!$request->hasFile('avatar')) {
            return $this->errorResponse(
                message: 'برای بروزرسانی آواتار، ارسال تصویر الزامی است.'
            );
        }

        $result = $uploadService->folder('users')->upload($request->file('avatar'));

        if (!$result) {
            return $this->errorResponse(
                message: 'آپلود تصویر با مشکل مواجه شد'
            );
        }

        $user->update([
            'avatar' => $result
        ]);

        return $this->successResponse(
            UserProfileResource::make($user),
            'آواتار شما عوض شد'
        );
    }

    public function updatePassword(UpdateUserPasswordRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'password' => $request->validated('password')
        ]);

        return $this->successResponse(
            UserProfileResource::make($user),
            'کلمه عبور شما تعویض شد.'
        );
    }

    public function getUsers(Request $request)
    {
        $users = User::when($request->filled('search'), function ($query) use ($request) {
            $query->where('first_name', 'like', '%' . $request->input('search') . '%')
                ->orWhere('last_name', 'like', '%' . $request->input('search') . '%');
        })->when($request->filled('email_status'), function ($query) use ($request) {
            if ($request->input('email_status') == 'verified') {
                $query->whereNotNull('email_verified_at');
            } else if ($request->input('email_status') == 'unverified') {
                $query->whereNull('email_verified_at');
            }
        })->paginate($request->filled('per_page') ? $request->input('per_page') : 15);

        return UserResource::collection($users);
    }

    public function store(UserCreateRequest $request, UploadService $uploadService)
    {
        $inputs = $request->validated();

        if ($request->hasFile('avatar')) {
            $result = $uploadService->folder('users')->upload($request->file('avatar'));

            if (!$result) {
                return $this->errorResponse(
                    message: 'مشکلی در آپلود تصویر به وجود آمد'
                );
            }

            $inputs['avatar'] = $result;
        }

        $user = User::create($inputs);

        return $this->successResponse(
            UserResource::make($user),
            'کاربر جدید افزوده شد'
        );
    }

    public function update(UpdateUserRequest $request, string $user_id, UploadService $uploadService)
    {
        $user = User::where('id', $user_id)->first();

        if (!$user) {
            return $this->errorResponse(
                message: 'کاربری با این آیدی یافت نشد',
                code: 404
            );
        }

        $inputs = $request->validated();

        if ($request->hasFile('avatar')) {
            if (!empty($user->avatar)) {
                $uploadService->delete($user->avatar);
            }

            $result = $uploadService->folder('users')->upload($request->file('avatar'));

            if (!$result) {
                return $this->errorResponse(
                    message: 'مشکلی در آپلود تصویر به وجود آمد'
                );
            }

            $inputs['avatar'] = $result;
        }

        $user->update($inputs);

        return $this->successResponse(
            UserResource::make($user),
            'کاربر ویرایش شد'
        );
    }

    public function destroy(string $user_id, UploadService $uploadService)
    {
        $user = User::where('id', $user_id)->first();

        if (!$user) {
            return $this->errorResponse(
                message: 'کاربری با این آیدی یافت نشد',
                code: 404
            );
        }

        if (!empty($user->avatar)) {
            $uploadService->delete($user->avatar);
        }

        $user->delete();

        return $this->successResponse(
            message: 'کاربر با موفقیت حذف شد'
        );
    }

    private function successResponse($data = [], $message = '', $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    private function errorResponse($data = [], $message = '', $code = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
