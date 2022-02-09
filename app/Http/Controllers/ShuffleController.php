<?php

namespace App\Http\Controllers;

use App\Exports\ShuffleWinnersExport;
use App\Http\Requests\StoreShuffleRequest;
use App\Models\Shuffle;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ShuffleController extends Controller
{
    public function index()
    {
        return view('pages.shuffle.index');
    }

    public function create()
    {
         return view('pages.shuffle.create');
    }

    public function store(StoreShuffleRequest $request)
    {
        $shuffle = $request->validated();
        Shuffle::create($shuffle);

        toast('Your Shuffle has been created!','success');
        return redirect()->route('shuffle.index');
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
