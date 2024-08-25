<?php

namespace App\Http\Controllers;

use App\Models\testTi;
use Illuminate\Http\Request;

class DeleteTiketController extends Controller
{
    public function deleteTicket(Request $request)
    {
        $id = $request->query('id');

        if (!$id) {
            return response()->json(['message' => 'ID is required'], 400);
        }

        //  тикетID
        $ticket = testTi::find($id);

        if (!$ticket) {
            return response()->json(['message' => 'Ticket not found'], 404);
        }


        $ticket->delete();

        return response()->json(['message' => 'Ticket deleted successfully']);
    }

}
