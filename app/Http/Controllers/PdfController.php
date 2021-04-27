<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'pdf' => ['required', 'pdf'],
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pdf.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pdf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = request()->validate([
        'pdf' => ['required', 'pdf'],
      ]);

      $imagePath = request('pdf')->store('uploads','public');

      pdf()->create([
        'pdf' => $imagePath,
      ]);

      return redirect('/pdfs/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function show(Pdf $pdf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function edit(Pdf $pdf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pdf $pdf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pdf $pdf)
    {
        //
    }
}
