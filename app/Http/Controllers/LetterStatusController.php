<?php

namespace App\Http\Controllers;

use App\Models\letterStatus;
use App\Http\Requests\StoreletterStatusRequest;
use App\Http\Requests\UpdateletterStatusRequest;

class LetterStatusController extends Controller
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
     * @param  \App\Http\Requests\StoreletterStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreletterStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\letterStatus  $letterStatus
     * @return \Illuminate\Http\Response
     */
    public function show(letterStatus $letterStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\letterStatus  $letterStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(letterStatus $letterStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateletterStatusRequest  $request
     * @param  \App\Models\letterStatus  $letterStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateletterStatusRequest $request, letterStatus $letterStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\letterStatus  $letterStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(letterStatus $letterStatus)
    {
        //
    }
}
