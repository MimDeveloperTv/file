<?php

namespace App\Http\Controllers;

use App\Http\Requests\Folder\CreateFolderRequest;
use App\Http\Resources\Folder\CreateFolderResource;
use App\Http\Resources\Folder\DetailFolderResource;
use App\Http\Resources\Folder\ListFolderResource;
use App\Services\Entities\FolderService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FolderController extends Controller
{
    public function __construct(
        public FolderService $service
    ) {
    }

    public function index(): AnonymousResourceCollection
    {
        return ListFolderResource::collection(
            $this->service->get(['children'])
        );
    }

    public function store(CreateFolderRequest $request): CreateFolderResource
    {
        return CreateFolderResource::make(
            $this->service->create($request->getData())
        );
    }

    public function show($id): DetailFolderResource
    {
        return DetailFolderResource::make(
            $this->service->find($id, ['children'])
        );
    }
}
