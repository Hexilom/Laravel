<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{
    //
    public function index(): View
    {
        //$notes = Note::all(); //me desordenaa
        $notes = Note::orderBy('created_at','asc')->get();
        return view('note.index', compact('notes'));
    }
    public function create(): View
    {
        return view('note.create');
    }
    public function store(NoteRequest $request): RedirectResponse
    {
        /* una forma de validacion/ no recomendada porque alarga codigo y pierde el sentido de unicidad de la funcion
        usar NoteRequest $request es mejor
        $request->validate([
            'title' => 'required|max:255|min:3',
            'description' => 'required|max:255|min:3'
        ]);*/

        // si se respetan los nombres de los campos existe este atajo
        Note::create($request->all());

        /* //otro metodo
        Note::create([
            'title' => request->title,
            'description' => request->description
        ]);
        */
        /* //un metodo
        $note = new Note;
        $note->title = $request->title;
        $note->title = $request->description;
        $note->save();
        */
        return redirect()->route('note.index')->with('success','Note Created');
    }

    public function edit(Note $note): View
    {// laravel ya te bussca la la instancia,otra forma es ($note)
        // $myNote = Note::find($note); y redireccionar
        return view('note.edit',compact('note'));
    }
    public function update(NoteRequest $request, Note $note): RedirectResponse
    {
        //mismo caso queel create
        $note->update($request->all());
        return redirect()->route('note.index')->with('success','Note Updated');;
    }
    public function mostrar(Note $note): View
    {
        return view('note.mostrar',compact('note'));
    }
    public function destroy(/*Request $request, (no es necesrio)*/Note $note): RedirectResponse
    {
        $note->delete();
        return redirect()->route('note.index')->with('danger','Note Deleted');;
    }
}
