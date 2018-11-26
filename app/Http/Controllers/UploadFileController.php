<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
    const ALLOWED_UPLOAD_TYPE = [
        'blogContent',
        'discount',
        'home',
        'pageContent',
        'product',
        'productContent',
        'returnApplication',
    ];

    const ALLOWED_FILE_TYPE = [
        'mage/bmp' => '.bmp',
        'image/x-bmp' => '.bmp',
        'image/gif' => '.gif',
        'image/jpeg' => '.jpg',
        'image/png' => '.png',
        'image/tiff' => '.tiff',
        'image/vnd.wap.wbmp' => '.wbmp',
    ];

    public function imageUpload(Request $request, $storeType) {
        $fileType = $request->headers->get('Content-Type');
        $bodyContent = $request->getContent();

        if (!isset(self::ALLOWED_FILE_TYPE[$fileType])) {
            return response()->json([
                'message' => 'File type not allowed!',
                'type' => $fileType,
            ], 400);
        }

        if (!in_array($storeType, self::ALLOWED_UPLOAD_TYPE)) {
            return response()->json([
                'message' => 'Upload type not allowed!',
                'type' => $storeType,
            ], 400);
        }

        $imageSubTitle = self::ALLOWED_FILE_TYPE[$fileType];
        $storeFilePath = 'upload/' .$storeType . '/' . uniqid() . $imageSubTitle;
        Storage::put($storeFilePath, $bodyContent);

        return response()->json([
            'message' => 'Successfully upload file!',
            'path' => $storeFilePath,
        ], 201);
    }
}
