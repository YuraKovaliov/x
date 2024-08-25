<?php

namespace App\Http\Controllers;

use App\Models\testTi;
use Illuminate\Http\Request;

class CreateTiketController extends Controller
{
    public function createTicket(Request $request)
    {
        $title = $request->query('title');
        $priority = $request->query('priority');
        $description = $request->query('description');
        $email = $request->query('email');

        //тест
        if (!$title || !$priority || !$description || !$email) {
            return response()->json(['message' => 'Missing parameters'], 400);
        }


        $ticket = testTi::create([
            'ticketTitle' => $title,
            'ticketPriority' => $priority,
            'ticketDescription' => $description,
            'user_email' => $email,
        ]);//новый


        return response()->json(['message' => 'Ticket успешно создан', 'ticket' => $ticket]);
    }

}
