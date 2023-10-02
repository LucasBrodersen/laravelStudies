<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\ServicesFilter;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Resources\V1\ServiceResource;
use App\Http\Resources\V1\ServiceCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Requests\V1\BulkStoreServiceRequest;
use App\Http\Requests\V1\StoreServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new ServicesFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0){
            return new ServiceCollection(Service::paginate());
        } else {
            $services = Service::where($queryItems)->paginate();
            return new ServiceCollection($services->appends($request->query()));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\V1\StoreServiceRequest
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        return new ServiceResource(Service::create($request->all()));
    }

    public function bulkStore(BulkStoreServiceRequest $request)
    {

        $bulk = collect($request->all())->map(function($arr, $key) {
           return Arr::except($arr, ['customerId', 'billedDate', 'paidDate']);
        });

        Service::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return new ServiceResource($service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
