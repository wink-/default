<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Requests\Admin\StoreQuotesRequest;
use App\Http\Requests\Admin\UpdateQuotesRequest;
use App\Quote;

class QuotesController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return Quote::all();
    }

    public function show($id)
    {
        return Quote::findOrFail($id);
    }

    public function update(UpdateQuotesRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $quote = Quote::findOrFail($id);
        $quote->update($request->all());

        return $quote;
    }

    public function store(StoreQuotesRequest $request)
    {
        $request = $this->saveFiles($request);
        $quote = Quote::create($request->all());

        return $quote;
    }

    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();

        return '';
    }
}
