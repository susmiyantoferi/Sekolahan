<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;

class FeeAmountController extends Controller
{
    public function ViewFeeAmount()
    {
        $data['allData'] = FeeCategoryAmount::all();
        return view('backend.setup.fee_amount.view_fee_amount', $data);
    }
}
