<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use View;
use App\Services\BillService as BillService;

class BillController extends Controller
{
    public function __construct(Request $request)
    {
        $this->_request = $request;
    }

    public function calculateBill(BillService $billService)
    {
        try {
            $validator = $billService->validator($this->_request->all());

            if ($validator->fails()) {
                return Redirect::to('/')->withErrors($validator);
            } else {
                $units = $this->_request['numberOfUnits'];
                $finalAmount = $billService->calculateFinalAmount($units);
            }

            return View::make('bill', compact(
                'finalAmount',
                'units'
            ));
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }
}
