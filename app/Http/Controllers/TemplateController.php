<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class TemplateController extends Controller
{
    public function listagem()
    {
        $templates = Template::all();
        return view('templates.listagem', compact('templates'));
    }

    public function show($id)
    {
        $template = Template::findOrFail($id);

        return response()->json([
            'nome' => $template->nome,
            'preview' => $template->conteudo, // Conteúdo do template em JSON ou SVG
            'tipo' => $template->tipo,
            'descricao' => 'Descrição do template e para que serve.' // Altere conforme necessário
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'conteudo' => 'required|string',
        ]);

        $template = new Template();
        $template->nome = 'Modelo Inicial'; // Defina um nome ou crie um campo no editor para isso
        $template->conteudo = $request->conteudo; // O SVG ou JSON gerado
        $template->descricao = $request->descricao;
        $template->tipo = $request->tipo;
        $template->save();

        return response()->json(['message' => 'Template salvo com sucesso!']);
    }

    public function create()
    {
        return view('templates.editor');
    }
    public function criar()
    {
        return view('templates.editor');
    }



}
