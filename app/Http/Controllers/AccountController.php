<?php

namespace App\Http\Controllers;

use App\Helpers\Zoho;
use App\Http\Requests\AccountRequest;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;
use Inertia\Response;

class AccountController extends Controller
{
    public function form(): Response
    {
        return Inertia::render('Account/Form', []);
    }

    public function store(AccountRequest $request): JsonResponse
    {
        $data = [
            [
                'Account_Name' => $request['name'],
                'Phone' => $request['phone'],
                'Website' => $request['website'],
            ]
        ];
        $zoho = new Zoho();
        if ($zoho->createRecord('Accounts', $data))
            return response()->json(['message' => 'Success']);
        else
            return response()->json(['message' => 'Error'], 500);
    }
}
