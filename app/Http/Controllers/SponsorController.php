<?php

namespace App\Http\Controllers;

use App\Sponsor as Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    /**
     * Display a listing of the sponsors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.sponsors.index', ['sponsors' => Sponsor::all()]);
        // $sponsors = Sponsor::all()->get();
    }

    /**
     * Show the form for creating a new sponsor.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created sponsor in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified sponsor.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor, $id)
    {
        return view('pages.sponsors.show', ['sponsor' => Sponsor::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified sponsor.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        //
    }

    /**
     * Update the specified sponsor in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        //
    }

    /**
     * Remove the specified sponsor from storage.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        //
    }
}
