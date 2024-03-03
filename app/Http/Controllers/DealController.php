<?php

namespace App\Http\Controllers;

use App\Helpers\Stage;
use App\Helpers\Zoho;
use App\Http\Requests\DealRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DealController extends Controller
{
    public function form(): Response
    {
        $zoho = new Zoho();
        $accounts = $zoho->getRecord('Accounts') ?: [];
        foreach ($accounts as $account)
            $data['accounts'][] = ['label' => $account['Account_Name'], 'value' => $account['id']];
        $data['stage'] = Stage::all();
        return Inertia::render('Deal/Form', $data);
    }

    public function store(DealRequest $request)
    {
        $data = [
            [
                'Deal_Name' => $request['name'],
                'Account_Name' => ['id' => $request['account']],
                'Closing_Date' => $request['date'],
                'Stage' => $request['stage'],
            ]
        ];
        $zoho = new Zoho();
        if ($zoho->createRecord('Deals', $data))
            return response()->json(['message' => 'Success']);
        else
            return response()->json(['message' => 'Error'], 500);
    }
}
