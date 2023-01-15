<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResources;
use App\Http\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->user = new UserServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return UserResources::collection($this->user->getAll());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $result =  $this->user->create($request);
        if($result){
            return responseWithSuccess(__('messages.user_created'));
        }
        return responseWithSuccess(__('messages.something_error'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  new UserResources($this->user->getOne($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $result =  $this->user->update($request,$id);
        if ($result){
            return responseWithSuccess(__('messages.user_updated'));
        }
        return responseWithFailure(__('messages.something_error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $result =  $this->user->delete($id);
       if ($result){
           return responseWithSuccess(__('messages.user_deleted'));
       }
        return responseWithFailure(__('messages.something_error'));
    }
}
