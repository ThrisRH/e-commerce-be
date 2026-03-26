<?php

namespace App\Containers\CatalogSection\Brand\UI\API\Controllers;

use App\Containers\CatalogSection\Brand\Actions\CreateBrandAction;
use App\Containers\CatalogSection\Brand\Actions\DeleteBrandAction;
use App\Containers\CatalogSection\Brand\Actions\GetByBrandIdAction;
use App\Containers\CatalogSection\Brand\Models\Brand;
use App\Containers\CatalogSection\Brand\Tasks\GetAllBrandTask;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{
    public function index(GetAllBrandTask $getAllTask)
    {
        $brands = $getAllTask->run();

        return ApiResponse::success($brands);
    }

    public function store(CreateBrandAction $action, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $brand = $action->run($data);

        return ApiResponse::success($brand, 'Brand created successfully', Response::HTTP_CREATED);
    }

    public function show(GetByBrandIdAction $action, $id)
    {
        $brand = $action->run($id);

        return ApiResponse::success($brand);
    }

    public function update(Request $request, Brand $brand)
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

    public function destroy(DeleteBrandAction $action, int $id)
    {
        $action->run($id);

        return ApiResponse::success(null, 'Brand deleted successfully');
    }
}
