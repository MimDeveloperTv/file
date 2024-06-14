<?php

namespace App\Http\Controllers;

use App\Http\Requests\Folder\CreateFolderRequest;
use App\Http\Resources\Folder\CreateFolderResource;
use App\Http\Resources\Folder\DetailFolderResource;
use App\Http\Resources\Folder\ListFolderResource;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection as ResourceCollection;

class FolderController extends Controller
{
    public function index(): ResourceCollection
    {
        return ListFolderResource::collection(
            Folder::with('children')->get()
        );
    }

    public function store(CreateFolderRequest $request): CreateFolderResource
    {
        return CreateFolderResource::make(
            Folder::query()->create($request->getData())
        );
    }

    public function show($id): DetailFolderResource
    {
        $repository = (new Folder())
            ->makeQueryBuilder()
            ->with(['children'])
            ->findOrFail($id);

        return DetailFolderResource::make($repository);
    }

    public function update(Request $request, $id)
    {
        $folder = Folder::findOrFail($id);
        $folder->update($request->all());

        return response()->json($folder);
    }

    public function destroy($id)
    {
        $folder = Folder::findOrFail($id);
        $folder->delete();

        return response()->json(null, 204);
    }
}
