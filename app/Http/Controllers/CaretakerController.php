<?php

namespace App\Http\Controllers;

use App\Caretaker;
use App\Sponsor;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\View;

class CaretakerController extends Controller
{
    /**
     * Show the form for creating a new caretaker.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created caretaker in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified caretaker.
     *
     * @param  \App\Caretaker  $caretaker
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $caretaker = Caretaker::find($id);
        $sponsor = $caretaker->sponsor;
        $partner = Caretaker::all()
            ->where('family_id', '=', $caretaker->family_id)
            ->where('id', '!=', $caretaker->id)
            ->first();

        $avatar = $caretaker->avatar;
        $children = $caretaker->family->children;
        $pageTitle = "Vous";
        $pageDescription = "Voici votre profil tel qu'il apparaît aux membres de la Gleefamily !";

        return view('pages.caretakers.profile', [
            'caretaker' => $caretaker,
            'partner' => $partner,
            'avatar' => $avatar,
            'children' => $children,
            'sponsor' => $sponsor,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'url' => 'caretaker'
            ]);
    }

    /**
     * Show the form for editing the specified caretaker.
     *
     * @param  \App\Caretaker  $caretaker
     * @return \Illuminate\Http\Response
     */
    public function edit(Caretaker $caretaker)
    {
        //
    }

    /**
     * Update the specified caretaker in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caretaker  $caretaker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caretaker $caretaker)
    {
        //
    }

    /**
     * Remove the specified caretaker from storage.
     *
     * @param  \App\Caretaker  $caretaker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caretaker $caretaker)
    {
        //
    }

    public function calendar()
    {
        $caretaker = \Auth::user();
        $id = $caretaker->id;

        $appointments = $caretaker->appointments;
        $children = $caretaker->family->children;
        $avatar = $caretaker->avatar;
        $pageTitle = "Vos rendez-vous";
        $pageDescription = "Consultez vos prochains rendez-vous et ajoutez-les à votre calendrier!";
        View::share('pageTitle', $pageTitle);
        View::share('appointments', $appointments);
        View::share('pageDescription', $pageDescription);

        return view('pages.caretakers.calendar', [
            'appointments' => $appointments,
            'url' => 'caretaker',
            'caretaker' => $caretaker,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            ]);
    }

    public function home()
    {
        $caretaker = \Auth::user();
        $id = $caretaker->id;

        $children = $caretaker->family->children;
        $sponsor = $caretaker->sponsor;
        $partner = Caretaker::all()
            ->where('family_id', '=', $caretaker->family_id)
            ->where('id', '!=', $caretaker->id)
            ->first();
        $pageTitle = "Bonjour $caretaker->first_name !";
        $pageDescription = "Ici, vous pouvez consulter et modifier les informations vous concernant.";
        View::share('pageTitle', $pageTitle);
        View::share('pageDescription', $pageDescription);

        return view('caretaker', [
            'caretaker' => $caretaker,
            'sponsor' => $sponsor,
            'children' => $children,
            'partner' => $partner,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'url' => 'caretaker'
            ]);
    }

    public function myPractitioners()
    {
        $caretaker = \Auth::user();
        $id = $caretaker->id;
        $myPractitioners = $caretaker->appointments->pluck('practitioner');
        $pageTitle = "Vos praticiens";
        $pageDescription = "Les praticiens qui vous accompagnent de près ou de loin sont tous ici.";

        return view('pages.caretakers.practitioners', [
            'practitioners' => $myPractitioners,
            'caretaker' => $caretaker,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'id' => $id,
            'url' => 'caretaker'
            ]);
    }

    public function mySponsor($id)
    {
        $caretaker = \Auth::user();
        return view('pages.sponsors.show', [
            'sponsor' => Sponsor::findOrFail($id),
            'caretaker' => $caretaker,
            'url' => 'caretaker'
        ]);
    }

}
