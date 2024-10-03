<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{

    public function index(): JsonResponse
    {
        $customers = Customer::all();
        return response()->json($customers);
    }


    public function store(Request $request): JsonResponse
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:customers',
            'phone' => 'required|numeric|digits_between:0,10',
        ]);

        $customer = Customer::create(
        $request->only(['name', 'email', 'phone'])
        );

        return response()->json($customer,201);
    }




}
