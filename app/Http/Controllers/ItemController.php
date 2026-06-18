<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Services\ItemService;
use App\Http\Controllers\Api\BaseController;

class ItemController extends BaseController
{
    protected ItemService $svc;

    public function __construct(ItemService $svc)
    {
        $this->svc = $svc;
    }

    public function index(Request $request)
    {
        $items = $this->svc->all();

        if ($request->filled('category_id')) {
            $items = $items->filter(function ($item) use ($request) {
                return $item->category_id == $request->category_id;
            })->values();
        }

        return $this->success($items);
    }

    public function store(StoreItemRequest $req)
    {
        $item = $this->svc->create($req->validated());
        return $this->success($item, "Item dibuat", 201);
    }

    public function show($id)
    {
        try {
            $item = $this->svc->find($id);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 404);
        }
    }

    public function update(UpdateItemRequest $req, $id)
    {
        $item = $this->svc->update($id, $req->validated());
        return $this->success($item, "Item diperbarui");
    }

    public function destroy($id)
    {
        $this->svc->delete($id);
        return $this->success(null, "Item dihapus", 204);
    }
}