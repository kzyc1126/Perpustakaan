<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storereservation_detailRequest;
use App\Http\Requests\Updatereservation_detailRequest;
use App\Models\reservation_detail;

class ReservationDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storereservation_detailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storereservation_detailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reservation_detail  $reservation_detail
     * @return \Illuminate\Http\Response
     */
    public function show(reservation_detail $reservation_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reservation_detail  $reservation_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(reservation_detail $reservation_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatereservation_detailRequest  $request
     * @param  \App\Models\reservation_detail  $reservation_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Updatereservation_detailRequest $request, reservation_detail $reservation_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reservation_detail  $reservation_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(reservation_detail $reservation_detail)
    {
        //
    }
}
