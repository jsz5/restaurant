<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Jobs\Contact;
use App\Models\User;
use App\Services\UserService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ApiContactController extends Controller
{
    /**
     * Add feedback
     * @param ContactRequest $request
     * @return JsonResponse
     */
    public function addFeedback(ContactRequest $request)
    {
        try {
            Contact::dispatch($request->email, $request->name, $request->msg);
            return response()->json("Dziękujemy za kontakt z " . config('app.name'), 200);
        } catch (Exception $e) {
            Log::notice("Error :" . $e);
            Log::notice("Error :" . $e->getMessage());
            Log::notice("Error :" . $e->getCode());
            return response()->json('Wystąpił nieoczekiwany błąd', 500);
        }
    }
}

