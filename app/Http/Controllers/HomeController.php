<?php

namespace App\Http\Controllers;

use App\Models\testTi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $email = Auth::user()->email;

        // Выполняем запрос для получения тикетов, фильтруя по email и приоритете
        $data = TestTi::where('ticketPriority', 'like', '%Open%')
            ->where('user_email', $email) // Предполагается, что у вас есть поле user_email
            ->orderBy('created_at', 'desc') // Сортируем по дате создания в обратном порядке
            ->get();

        return view('home', ['data' => $data]);

    }





    public function closeTiket()
    {


        $email = Auth::user()->email;

        //  получения
        $data = TestTi::where('ticketPriority', 'like', '%Close%')
            ->where('user_email', $email)
            ->get();


        return view('home', ['data' => $data]);
    }



    public function createTiket()
    {
        return view('createTiket');

    }

    public function submitForm(Request $request)
    {

        $valid =$request->validate([
            'ticketTitle' => 'required|min:4|max:20',
            'ticketDescription' => 'required|min:4',
            'ticketPriority' => 'required|min:1',
        ],[
            'ticketTitle.required' => 'Поле "Заголовок тикета" обязательно для заполнения.',
            'ticketTitle.min' => 'Поле "Заголовок тикета" должно содержать минимум :min символа.',
            'ticketTitle.max' => 'Поле "Заголовок тикета" должно содержать максимум :max символов.',

            'ticketDescription.required' => 'Поле "Описание" обязательно для заполнения.',
            'ticketDescription.min' => 'Поле "Описание" должно содержать минимум :min символа.',
            'ticketDescription.max' => 'Поле "Описание" должно содержать максимум :max символов.',

            'ticketPriority.required' => 'Поле "Статус" обязательно для заполнения.',
            'ticketPriority.min' => 'Поле "Статус" должно содержать минимум :min символа.',
        ]);

        $check = new testTi();
        $check->ticketTitle = $request->input('ticketTitle');
        $check->ticketDescription = $request->input('ticketDescription');
        $check->ticketPriority = $request->input('ticketPriority');
        $check->user_email = Auth::user()->email;

        $check->save();

        return redirect()->route('home')->with('success', 'Тикет успешно создан!');
    }

    public function close($id)
    {
        $ticket = testTi::find($id);
        $ticket->ticketPriority = 'Closed';
        $ticket->save();

        return redirect()->back();
    }
    public function opentiket($id)
    {
        $ticket = testTi::find($id);
        $ticket->ticketPriority = 'Open';
        $ticket->save();

        return redirect()->back();
    }


    public function delete($id)
    {
        $ticket = testTi::find($id);
        $ticket->delete();

        return redirect()->back();
    }

    public function api()
    {
       return view('Api');
    }

}
