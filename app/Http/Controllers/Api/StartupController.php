<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Startup;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StartupController extends Controller
{
    //Lista Startups
    public function index()
    {
        $startups = Startup::orderBy('data_cadastro', 'desc')->get();

        return response()->json($startups, Response::HTTP_OK);
    }

    //Guarda Startups
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'           => 'required|string|max:255',
            'setor'          => 'required|string|max:255',
            'email_contato'  => 'required|email|max:255',
        ]);

        $startup = Startup::create([
            'nome'          => $validated['nome'],
            'setor'         => $validated['setor'],
            'email_contato' => $validated['email_contato'],
            'data_cadastro' => now(),
        ]);

        return response()->json([
            'message' => 'Startup registrada com sucesso',
            'data'    => $startup,
        ], Response::HTTP_CREATED);
    }
}
