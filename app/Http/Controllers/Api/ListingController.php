<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListingResource;
use App\Models\Experience;
use App\Models\ProjectType;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function projectTypes()
    {
        $projectTypes = ProjectType::all();
        $res['data'] = ListingResource::collection($projectTypes);
        return apiSuccessResponse("Project Types", $res);
    }
    public function experience()
    {
        $items = Experience::all();
        $res['data'] = ListingResource::collection($items);
        return apiSuccessResponse("Experiences", $res);
    }
}
