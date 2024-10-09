<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailStoreRequest;
use App\Http\Requests\PhoneStoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function storeEmail(EmailStoreRequest $request)
    {
        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            $randomInt = rand(999, 99999);
            $user = User::create([
                'name' => "user$randomInt",
                'email' => $validated['email'],
                'phone_number' => isset($validated['phone_number']) ? $validated['phone_number'] : null,
                'password' => Hash::make(Str::random()),
            ]);
        }
        $res['user'] = new UserResource($user);
        return apiSuccessResponse('User Email stored Successfully', $res);

    }
    public function storePhone(PhoneStoreRequest $request)
    {

        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            $randomInt = rand(999, 99999);
            $user = User::create([
                'name' => "user$randomInt",
                'email' => $validated['email'],
                'phone_number' => isset($validated['phone_number']) ? $validated['phone_number'] : null,
                'password' => Hash::make(Str::random()),
            ]);
        } else {
            $user->update([
                'phone_number' => isset($validated['phone_number']) ? $validated['phone_number'] : null
            ]);
        }

        $res['user'] = new UserResource($user);
        return apiSuccessResponse('User Phone number stored Successfully', $res);

    }
}
