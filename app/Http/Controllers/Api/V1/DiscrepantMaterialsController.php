<?php

namespace App\Http\Controllers\Api\V1;

use App\DiscrepantMaterial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDiscrepantMaterialsRequest;
use App\Http\Requests\Admin\UpdateDiscrepantMaterialsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\DataTables\DataTables;

class DiscrepantMaterialsController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return DiscrepantMaterial::all();
    }

    public function show($id)
    {
        return DiscrepantMaterial::findOrFail($id);
    }

    public function update(UpdateDiscrepantMaterialsRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $discrepant_material = DiscrepantMaterial::findOrFail($id);
        $discrepant_material->update($request->all());
        

        return $discrepant_material;
    }

    public function store(StoreDiscrepantMaterialsRequest $request)
    {
        $request = $this->saveFiles($request);
        $discrepant_material = DiscrepantMaterial::create($request->all());
        

        return $discrepant_material;
    }

    public function destroy($id)
    {
        $discrepant_material = DiscrepantMaterial::findOrFail($id);
        $discrepant_material->delete();
        return '';
    }
}
