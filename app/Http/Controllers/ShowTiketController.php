<?php

namespace App\Http\Controllers;

use App\Models\testTi;
use Illuminate\Http\Request;

class ShowTiketController extends Controller
{
    public function showTicket(Request $request)
    {
        $id = $request->query('id');

        if (!$id) {
            return response()->json(['message' => 'ID is required'], 400);
        }

        // Найти тикет по ID
        $ticket = testTi::find($id);

        if (!$ticket) {
            return response()->json(['message' => 'Ticket not found'], 404);
        }


        return response()->json($ticket);
    }
}
