<?php
namespace App\Services;

use Validator;
use Config;

class BillService
{

    public function validator(array $data)
    {
        return Validator::make($data, [
            'numberOfUnits' => 'required|numeric|min:1',
        ]);
    }

    public function calculateFinalAmount($numberOfUnits)
    {

        $configData = Config::get('constants.bill.calculation');
        $total = 0;
        $tmpCheckUnit = 0;
        $balanceUnits = $numberOfUnits;

        foreach ($configData as $checkUnits => $pricePerUnit) {

            if ($checkUnits == 'above' && $balanceUnits > 0) {
                $total += ($balanceUnits * $pricePerUnit);
                break;
            } elseif ($numberOfUnits >= $checkUnits) {
                $total += (($checkUnits - $tmpCheckUnit) * $pricePerUnit);
                $balanceUnits = $numberOfUnits - $checkUnits;
                $tmpCheckUnit = $checkUnits;
            } elseif ($balanceUnits > 0) {
                $total += ($balanceUnits * $pricePerUnit);
                break;
            }
        }

        return $total;

    }

}