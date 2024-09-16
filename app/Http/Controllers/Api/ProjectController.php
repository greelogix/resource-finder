<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Models\User;
use App\Models\UserProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    public function store(ProjectStoreRequest $request)
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

        $project = UserProject::create([
            'user_id' => $user->id,
            'project_type_id' => $validated['project_type_id'],
            'experience_id' => $validated['experience_id'],
            'project_name' => $validated['project_name'],
            'description' => isset($validated['description']) && $validated['description'] ? $validated['description'] : NULL,
        ]);
        if (isset($validated['attachments'])) {
            upload_media($project, $validated['attachments'], 'attachments');
        }




        return apiSuccessResponse("Project Details Store.", );


    }

}
