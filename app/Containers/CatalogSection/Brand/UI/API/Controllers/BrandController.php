<?php

namespace App\Http\Controllers;

use App\Containers\CatalogSection\Brand\Models\brand;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{
    public function index()
    {
        $brands = brand::latest()->paginate(10);

        if (empty($brands)) {
            return ApiResponse::error('No brands found', Response::HTTP_NOT_FOUND);
        }

        return ApiResponse::success($brands);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $brand = brand::create($data);

        return ApiResponse::success($brand, 'Brand created successfully', Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $brand = brand::find($id);

        if (empty($brand)) {
            return ApiResponse::error('Brand not found', Response::HTTP_NOT_FOUND);
        }

        return ApiResponse::success($brand);
    }

    public function update(Request $request, brand $brand)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
        ]);

        if (empty($data)) {
            return ApiResponse::error('No data provided', Response::HTTP_BAD_REQUEST);
        }

        $brand->update($data);

        return ApiResponse::success($brand, 'Brand updated successfully', Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $brand = brand::find($id);

        if (empty($brand)) {
            return ApiResponse::error('Brand not found', Response::HTTP_NOT_FOUND);
        }

        $brand->delete();

        return ApiResponse::success(null, 'Brand deleted successfully', Response::HTTP_OK);
    }
}
