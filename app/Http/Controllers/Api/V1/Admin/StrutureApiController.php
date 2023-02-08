<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreStrutureRequest;
use App\Http\Requests\UpdateStrutureRequest;
use App\Http\Resources\Admin\StrutureResource;
use App\Models\Struture;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StrutureApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('struture_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StrutureResource(Struture::all());
    }

    public function store(StoreStrutureRequest $request)
    {
        $struture = Struture::create($request->all());

        return (new StrutureResource($struture))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Struture $struture)
    {
        abort_if(Gate::denies('struture_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StrutureResource($struture);
    }

    public function update(UpdateStrutureRequest $request, Struture $struture)
    {
        $struture->update($request->all());

        return (new StrutureResource($struture))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Struture $struture)
    {
        abort_if(Gate::denies('struture_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $struture->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
