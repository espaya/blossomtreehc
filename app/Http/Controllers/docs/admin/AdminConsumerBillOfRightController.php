<?php

namespace App\Http\Controllers\docs\admin;

use App\Http\Controllers\Controller;
use App\Models\ConsumerBillOfRight;
use App\Models\User;
use Illuminate\Http\Request;

class AdminConsumerBillOfRightController extends Controller
{
    public function index($id, $docID)
    {
        $consumer_bill = ConsumerBillOfRight::where('customerID', $id)->where('id', $docID)->get();
        $user = User::where('id', $id)->first();

        return view('admin.customer.docs.consumer_bill_of_rights', [
            'consumer_bill' => $consumer_bill, 
            'user' => $user
        ]);
    }
}
