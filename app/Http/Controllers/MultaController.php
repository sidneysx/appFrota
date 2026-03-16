<?php

namespace App\Http\Controllers;

use App\Models\Multa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MultaController extends Controller

{
    /**
     * Lista todas as multas
     */
    public function index()
    {
        $multas = Multa::latest()->paginate(10);

        return view('multas.index', compact('multas'));
    }

    /**
     * Formulário de criação
     */
    public function create()
    {
        return view('multas.create');
    }

    /**
     * Salvar nova multa
     */
    public function store(Request $request)
    {
        $validated = $this->validateData($request);

        $validated = $this->handleUploads($request, $validated);

        Multa::create($validated);

        return redirect()
            ->route('multas.index')
            ->with('success', 'Multa criada com sucesso!');
    }

    /**
     * Editar multa
     */
    public function edit(Multa $multa)
    {
        return view('multas.edit', compact('multa'));
    }

    /**
     * Atualizar multa
     */
    public function update(Request $request, Multa $multa)
    {
        $validated = $this->validateData($request);

        $validated = $this->handleUploads($request, $validated);

        $multa->update($validated);

        return redirect()
            ->route('multas.index')
            ->with('success', 'Multa atualizada com sucesso!');
    }

    /**
     * Excluir multa
     */
    public function destroy(Multa $multa)
    {
        if ($multa->pdf) {
            Storage::disk('public')->delete($multa->pdf);
        }

        if ($multa->pdf_desconto) {
            Storage::disk('public')->delete($multa->pdf_desconto);
        }

        $multa->delete();

        return redirect()
            ->route('multas.index')
            ->with('success', 'Multa removida com sucesso!');
    }

    /**
     * Validação centralizada (boa prática)
     */
    private function validateData(Request $request)
    {
        return $request->validate([
            'placa' => 'required|string|max:10',
            'setor' => 'required|string|max:100',
            'veiculo' => 'required|string|max:100',
            'responsavel' => 'required|string|max:100',
            'numero_auto' => 'required|string|max:50',
            'situacao' => 'required|string|max:50',
            'data_recebimento' => 'required|date',
            'data_vencimento' => 'required|date',
            'descricao' => 'required|string',
            'pdf' => 'nullable|file|mimes:pdf',
            'pdf_desconto' => 'nullable|file|mimes:pdf',
        ]);
    }

    /**
     * Upload de arquivos centralizado
     */
    private function handleUploads(Request $request, array $validated)
    {
        if ($request->hasFile('pdf')) {
            $validated['pdf'] = $request->file('pdf')->store('multas', 'public');
        }

        if ($request->hasFile('pdf_desconto')) {
            $validated['pdf_desconto'] = $request->file('pdf_desconto')->store('multas', 'public');
        }

        return $validated;
    }
}