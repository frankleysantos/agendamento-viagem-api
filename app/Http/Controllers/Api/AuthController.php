<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;



class AuthController extends Controller
{

    protected $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->repository = $userRepository;
    }
    
    public function login(Request $request){
        $response = $this->repository->login($request);
        // dd($response);
        // if(isset($response['statusCode'])) {
        //     return response()->json($response, $response['statusCode']);
        // }
        return response()->json($response);
    }

    public function register(Request $request) {
        $response = $this->repository->register($request);
        return response()->json($response);
    }

    public function logout() {
       $response = $this->repository->logout();
       return response()->json($response);
    }

    public function refresh() {
        $response = $this->repository->refresh();
        return response()->json($response);
    }

    public function userProfile() {
        $response = $this->repository->userProfile();
        return response()->json($response);
    }
}
