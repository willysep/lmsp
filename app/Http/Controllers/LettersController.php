<?php

namespace App\Http\Controllers;

use App\Models\Letters;
use App\Helpers\MyFunction;
use App\Models\LetterTypes;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLetterRequest;
use App\Models\letterStatus;

class LettersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function typeShow($typeCode)
    {
        $letterType = LetterTypes::where('typeCode', $typeCode)->get()->first();
        return view('letters.letter', [
            'contentHeader' => $letterType->typeName,
            'breadcrumb' => 'Letter',
            'breadcrumbLink' => '#',
            'active' => ['letter' => $letterType->typeCode],
            'letterTypes' => LetterTypes::all(),
            'chosenType' => $letterType,
            'letters' => Letters::where('typeID', $letterType->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreLetterRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLetterRequest $request)
    {
        $letterType = LetterTypes::where('typeCode', $request->letterType)->first();
        try {
            $letterNumber = MyFunction::generateLetterNumber($letterType->lastNumber, $letterType->numberingRule);
            $letter = Letters::create([
                'typeID' => $letterType->id,
                'subject' => $request->subject,
                'letterNumber' => $letterNumber,
                'slug' => Str::random(20),
                'recipient' => $request->recipient,
                'userID' => 1,
                'statusID' => 1,
            ]);

            $letterType->lastNumber += 1;
            $letterType->save();

            return redirect()->route('letter.type', $letterType->typeCode)->with('success',  $letter->letterNumber);
        } catch (\Throwable $th) {
            return redirect()->route('letter.type', $letterType->typeCode)->with('failed',  $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\letters  $letters
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $letter = Letters::where('slug', $slug)->get()->first();
        // dd($letter->status);
        return view('letters.detail', [
            'letter' => $letter
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\letters  $letters
     * @return \Illuminate\Http\Response
     */
    public function edit(letters $letters)
    {
        return view('letter.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\letters  $letters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, letters $letters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\letters  $letters
     * @return \Illuminate\Http\Response
     */
    public function destroy(letters $letters)
    {
        //
    }

    public function cancel(Request $request)
    {
        try {
            $letter = Letters::where('slug', $request->slug)->get()->first();
            $letter->statusID = 2; //cancel id
            $letter->save();
            return 'success';
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function upload(Request $request)
    {
        $validatedData = $request->validate([
            'slug' => ['required', 'max:20'],
            'archive' => ['required', 'mimes:pdf,jpg,zip', 'file', 'max:10240'],
        ]);
        try {
            if (!$request->hasFile('archive')) {
                return redirect()->route('letter.show', $validatedData['slug'])->with('failed',  'no file uploaded');
            }
            $extension = $request->file('archive')->getClientOriginalExtension();
            $letter = Letters::where('slug', $validatedData['slug'])->get()->first();
            $letter->archive = $request->file('archive')
                ->storeAs('letters', MyFunction::generateLetterArchiveName(
                    $letter->letterNumber,
                    $letter->subject,
                    $extension
                ));
            $letter->statusID = 3;
            $letter->save();
            return redirect()->route('letter.show', $validatedData['slug'])->with('success', 'Your archive has been uploaded successfully');
        } catch (\Throwable $th) {
            return redirect()->route('letter.show', $validatedData['slug'])->with('failed',  $th->getMessage());
        }
    }
}
