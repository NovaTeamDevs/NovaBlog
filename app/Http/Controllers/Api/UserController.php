<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpdateUserAvatarRequest;
use App\Http\Requests\Api\UpdateUserPasswordRequest;
use App\Http\Requests\Api\UpdateUserProfileRequest;
use App\Http\Resources\UserProfileResource;
use App\Services\UploadService\UploadService;
use Illuminate\Http\Request;

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
