<?php
namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;
class ItemController extends Controller
{
    public function index()
    {
        return response()->json(Item::with('category')->get(), 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $item = Item::create($request->all());
        return response()->json($item->load('category'), 201);
    }

    public function show(Item $item)
    {
        return response()->json($item->load('category'), 200);
    }
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'sometimes|required|integer|min:0',
            'price' => 'sometimes|required|numeric|min:0',
            'category_id' => 'sometimes|required|exists:categories,id',
        ]);

        $item->update($request->all());
        return response()->json($item->load('category'), 200);
    }
    public function destroy(Item $item)
    {
        $item->delete();
        return response()->json(['message' => 'Item deleted successfully'], 200);
    }
}