<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\Entities\FolderRepository;
use App\Http\Requests\Folder\CreateFolderRequest;
use App\Http\Resources\Folder\CreateFolderResource;
use App\Http\Resources\Folder\DetailFolderResource;
use App\Http\Resources\Folder\ListFolderResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FolderController extends Controller
{
    public function __construct(
        public FolderRepository $repository
    ) {
    }

    public function index(): AnonymousResourceCollection
    {
        return ListFolderResource::collection(
            $this->repository->get(['children'])
        );
    }

    public function store(CreateFolderRequest $request): CreateFolderResource
    {
        return CreateFolderResource::make(
            $this->repository->create($request->getData())
        );
    }

    public function show($id): DetailFolderResource
    {
        return DetailFolderResource::make(
            $this->repository->find($id, ['children'])
        );
    }
}
