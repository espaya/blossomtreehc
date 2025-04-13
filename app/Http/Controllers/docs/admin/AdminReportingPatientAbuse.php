<?php

namespace App\Http\Controllers\docs\admin;

use App\Http\Controllers\Controller;
use App\Models\ReportingPatientAbuse;
use App\Models\User;
use Illuminate\Http\Request;

class AdminReportingPatientAbuse extends Controller
{
    public function index($id, $docID)
    {
        $reportingPatientAbuse = ReportingPatientAbuse::where('customerID', $id)
            ->where('id', $docID)
            ->get();

        $user = User::where('id', $id)->first();

        return view('admin.customer.docs.reporting_patient_abuse_and_neglect', [
            'reportingPatientAbuse' => $reportingPatientAbuse,
            'user' => $user
        ]);
    }
}
