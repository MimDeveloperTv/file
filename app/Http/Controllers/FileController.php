<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\Entities\FileRepository;
use App\Http\Requests\File\CreateFileRequest;
use App\Http\Requests\File\MoveAllFileRequest;
use App\Http\Requests\File\MoveFileRequest;
use App\Http\Resources\File\CreateFileResource;
use App\Http\Resources\File\DetailFileResource;
use Illuminate\Http\JsonResponse;

class FileController extends Controller
{
    public function __construct(
        public FileRepository $repository
    ) {
    }

    public function show($id): DetailFileResource
    {
        return DetailFileResource::make(
            $this->repository->find($id)
        );
    }

    public function store(CreateFileRequest $request): CreateFileResource
    {
        return CreateFileResource::make(
            $this->repository->create($request->getData())
        );
    }

    public function update(MoveFileRequest $request, $id): JsonResponse
    {
        $this->repository->update($request->getData(), $id);

        return response()->json(['message' => 'Moved File Success']);
    }

    public function updateAll(MoveAllFileRequest $request)
    {
        $this->repository->updateByFolderId([
            'folder_id' => $request->toFolder(),
        ], $request->fromFolder());

        return response()->json(['message' => 'Moved All Files Success']);
    }

    public function destroy($id): JsonResponse
    {
        $this->repository->destroy($id);

        return response()->json(['message' => 'Removed Success']);
    }
}
