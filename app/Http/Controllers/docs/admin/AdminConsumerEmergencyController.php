<?php

namespace App\Http\Controllers\docs\admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\ConsumerEmergency;
use App\Models\User;
use Illuminate\Http\Request;

class AdminConsumerEmergencyController extends Controller
{
    public function index($id, $docID)
    {
        $consumer_emergency = ConsumerEmergency::where('customerID', $id)
            ->where('id', $docID)
            ->get();

        $user = User::where('id', $id)->first();

         // check if users address is empty or not
         $isAddress = Address::where('userID', $id)->get();

        return view('admin.customer.docs.consumer_emergency_and_contact_information', [
            'consumer_emergency' => $consumer_emergency, 
            'user' => $user,
            'isAddress' => $isAddress
        ]);
    }
}
