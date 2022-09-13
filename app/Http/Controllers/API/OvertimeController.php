<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOvertimeRequest;
use App\Http\Services\OvertimeServices;
use Exception;
use Illuminate\Http\Request;

class OvertimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOvertimeRequest $request)
    {
      try{
        $request->validated();
        $overtimeServices = new OvertimeServices();

        $data = $overtimeServices->createOvertime($request);

        if($data){
          return ApiFormatter::createApi(200, 'Success', $data);
        }
        else{
          return ApiFormatter::createApi(400, 'Failed');
        }
      }
      catch(Exception $error){
        return ApiFormatter::createApi(400, 'Failed', $error);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($month)
    {
      try{
        $overtimeServices = new OvertimeServices();
        $data = $overtimeServices->getCalculateOvertime($month);

        return ApiFormatter::createApi(200, 'Success', $data);
      }
      catch(Exception $error){
        return ApiFormatter::createApi(400, 'Failed', $error);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
