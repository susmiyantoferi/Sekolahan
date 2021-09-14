<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCatrgoryController extends Controller
{
    public function ViewFeeCategory(){
        $data ['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_category', $data);
    }
}