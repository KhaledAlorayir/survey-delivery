<?php

namespace App\Http\Controllers;

use App\Mail\SurveyCreatedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SurveyController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'survey_url' => 'required|url',
            'domains' => 'required|array',
            'domains.*.domain_name' => 'required|string|regex:/^(?!:\/\/)([a-zA-Z0-9-_]{1,63}\.)+[a-zA-Z]{2,6}$/',
            'domains.*.admin_email' => 'required|email',
        ]);

        collect($request->domains)->each(function ($domain) use ($request) {
            Mail::to($domain['admin_email'])
                ->queue(new SurveyCreatedMail($request->survey_url, $domain['domain_name']));

            Log::info('send to ' . $domain['admin_email']);
        });

        return response()->json(['message' => 'Survey submitted successfully.']);
    }
}
