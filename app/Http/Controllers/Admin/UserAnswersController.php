<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserAnswersRequest;
use App\Http\Requests\UpdateUserAnswersRequest;
use App\Models\UserAnswers;

class UserAnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserAnswersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserAnswers $userAnswers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserAnswers $userAnswers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserAnswersRequest $request, UserAnswers $userAnswers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAnswers $userAnswers)
    {
        //
    }
}
