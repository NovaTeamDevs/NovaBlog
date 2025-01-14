<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Requests\Admin\TokenCreateRequest;
use Laravel\Sanctum\NewAccessToken;

class TokenController extends Controller
{
    public function index()
    {
        $tokens = PersonalAccessToken::paginate();

        return view('admin.token.index', compact('tokens'));
    }

    public function create()
    {
        $users = User::all();

        return view('admin.token.create', compact('users'));
    }

    public function store(TokenCreateRequest $request)
    {
        $user = User::find($request->validated('user_id'));

        $abilities = match ($request->validated('permission')) {
            'write' => ['read', 'write'],
            'read' => ['read']
        };

        $token = $user->createToken(
            'Admin Created',
            $abilities
        );

        return to_route('admin.token.show', [
            'token' => $token->accessToken,
            'plainTextToken' => $token->plainTextToken
        ]);
    }

    public function show(Request $request, PersonalAccessToken $token)
    {
        $plainTextToken = $request->input('plainTextToken');
        return view('admin.token.show', compact('token', 'plainTextToken'));
    }

    public function destroy(PersonalAccessToken $token)
    {
        $token->delete();

        return response()->json([
            'success' => true,
            'message' => 'توکن با موفقیت حذف شد'
        ]);
    }
}
