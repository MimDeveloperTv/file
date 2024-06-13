<?php

namespace App\Http\Controllers;

use App\Http\Requests\File\CreateFileRequest;
use App\Http\Requests\File\MoveFileRequest;
use App\Http\Resources\File\CreateFileResource;
use App\Http\Resources\File\DetailFileResource;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
//    public function index(Request $request, $folderId)
//    {
//        $query = File::where('folder_id', $folderId);
//
//        if ($request->has('date')) {
//            $query->orderBy('created_at', $request->date);
//        }
//
//        if ($request->has('keyword')) {
//            $query->where('name', 'like', '%' . $request->keyword . '%');
//        }
//
//        if ($request->has('deleted')) {
//            $query->onlyTrashed();
//        }
//
//        return response()->json($query->get());
//    }

    public function store(CreateFileRequest $request): CreateFileResource
    {
        return CreateFileResource::make(
            File::query()->create($request->getData())
        );
    }


    public function show($id): DetailFileResource
    {
        return DetailFileResource::make(
            File::query()->findOrFail($id)
        );
    }


    public function update(MoveFileRequest $request, $id): DetailFileResource
    {
        $file = File::query()->findOrFail($id);
        $file->update($request->getData());
        return DetailFileResource::make($file);
    }

    public function destroy($id)
    {
        $file = File::findOrFail($id);
        $file->delete();
        return response()->json('Removed Success', 204);
    }

}
