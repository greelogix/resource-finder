<?php

use Illuminate\Support\Facades\Storage;

function apiSuccessResponse($message = null, array $data = [], int $code = 200)
{
    return apiResponse(true, $code, $message, $data);
}

function apiErrorResponse($message = null, array $data = [], int $code = 404)
{
    return apiResponse(false, $code, $message, $data);
}


function apiResponse($status, $code, $message = null, array $data = [])
{
    return response()->json([
        "status" => $status,
        "message" => $message,
        "data" => $data,
    ], $code);
}
function uploadSingleFile($file, $path = 'media/')
{
    $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
    $file->storeAs($path, $fileName, 'public');
    $path = $path . $fileName;
    $url = url('/') . Storage::url($path);
    return $url;
}
function upload_media($project, $media, $storage_path)
{
    if (count($media) > 0) {
        $baseUrl = url('/') . '/storage/';
        $medias = [];
        foreach ($media as $media_item) {
            if (isset($media_item['media_file'])) {
                $banner_image = $media_item['media_file'];
                $imageName = time() . '_' . preg_replace('/\s+/', '_', $banner_image->getClientOriginalName());
                $media_item['path'] = $banner_image->storeAs($storage_path, $imageName, 'public');
                $medias[] = [
                    'filename' => $banner_image->getClientOriginalName(),
                    'file_type' => $media_item['file_type'],
                    'path' => $baseUrl . $media_item['path']
                ];
            }
        }
        $project->attachments()->createMany($medias);
    }
}