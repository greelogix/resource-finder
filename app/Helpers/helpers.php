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
function upload_media($project, $files, $storage_path)
{
    if (count($files) > 0) {
        $baseUrl = url('/') . '/storage/';
        $attachments = [];
        foreach ($files as $item) {
            if (isset($item['file'])) {
                $banner_image = $item['file'];
                $imageName = time() . '_' . preg_replace('/\s+/', '_', $banner_image->getClientOriginalName());
                $item['path'] = $banner_image->storeAs($storage_path, $imageName, 'public');
                $attachments[] = [
                    'filename' => $banner_image->getClientOriginalName(),
                    'file_type' => $item['file_type'],
                    'path' => $baseUrl . $item['path']
                ];
            }
        }
        $project->attachments()->createMany($attachments);
    }
}