<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EventParticipantController extends Controller
{

    public function index()
    {

        $eventParticipant = EventParticipant::all();
        return response()->json($eventParticipant);
    }


    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|integer',
            'participant_id' => 'required|integer',
            'invitation' => 'string',
            'first_name',
            'last_name',
            'email',
            'phone_number'

        ]);

        $eventParticipant = new EventParticipant(
            [

                'event_id' => $request->event_id,
                'participant_id' => $request->participant_id,
                'invitation' => $request->invitation,
                'participate' => $request->participate,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,


            ]
        );
        $eventParticipant->save();


        $data["email"] = $eventParticipant->email;
        $data["title"] = "confirmation de votre participation dans l evenement ";
        $data["body"] = "Vous trouvrez dans ce document votre information ainssi que le QR code qui vous permez de participer dans l evenement";
        $data["qrCode"] = QrCode::size(200)->generate($eventParticipant->first_name .$eventParticipant->last_name .$eventParticipant->id );
        $data["nom"] = $eventParticipant->last_name;
        $data["prenom"] = $eventParticipant->first_name;
        $data["telephone"] = $eventParticipant->phone_number;
        $pdf = PDF::loadView('Email.pdfEmail', $data);
        Mail::send('Email.pdfEmail', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "text.pdf");
        });


        return response()->json($eventParticipant, 200);
    }


    public function show(EventParticipant $eventParticipant)
    {
    }


    public function update(Request $request, EventParticipant $eventParticipant)
    {
    }


    public function destroy($id)
    {
        $eventParticipant = Event::find($id);
        $eventParticipant->delete();
        return response()->json([
            'message' => 'deleted!'
        ], 201);
    }


    public function TotalEventParticipant()
    {
        return DB::table('event_participants')
            ->select("event_id", DB::raw("(COUNT(id)) as nbParticipants"))
            ->Groupby(DB::raw('event_id'))
            ->get();
    }
}
