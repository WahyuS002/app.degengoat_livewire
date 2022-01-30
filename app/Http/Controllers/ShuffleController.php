<?php

namespace App\Http\Controllers;

use App\Exports\ShuffleWinnersExport;
use App\Models\Shuffle;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ShuffleController extends Controller
{
    public function index()
    {
        return view('shuffle.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function exportWinners(Shuffle $shuffle)
    {
        return Excel::download(new ShuffleWinnersExport($shuffle->id), $shuffle->title . ' winners' . '.xlsx');
    }
}
