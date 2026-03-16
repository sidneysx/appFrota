<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VeiculoController extends Controller
{
    /**
     * Lista todos os veículos
     */
    public function index()
    {
        $veiculos = Veiculo::latest()->paginate(10);
        return view('veiculos.index', compact('veiculos'));
    }

    /**
     * Formulário de criação
     */
    public function create()
    {
        return view('veiculos.create');
    }

    /**
     * Salvar novo veículo
     */
    public function store(Request $request)
    {
        $validated = $this->validateData($request);

        $validated = $this->handleUploads($request, $validated);

        Veiculo::create($validated);

        return redirect()
            ->route('veiculos.index')
            ->with('success', 'Veículo criada com sucesso!');


    }

    /**
     * Editar veículo
     */
    public function edit(Veiculo $veiculo)
    {
        return view('veiculos.edit', compact('veiculo'));
    }

    /**
     * Atualizar veículo
     */
    public function update(Request $request, Veiculo $veiculo)
    {
        $validated = $this->validateData($request);
        $validated = $this->handleUploads($request, $validated);

        $veiculo->update($validated);

        return redirect()
            ->route('veiculos.index')
            ->with('success', 'Veículo atualizado com sucesso!');
    }

    /**
     * Excluir veículo
     */
    public function destroy(Veiculo $veiculo)
    {
        if ($veiculo->renavan_pdf) {
        Storage::disk('public')->delete($veiculo->renavan_pdf);
    }

        $veiculo->delete();

        return redirect()
            ->route('veiculos.index')
            ->with('success', 'Veículo removido com sucesso!');
    }

    /**
     * Validação centralizada
     */
    private function validateData(Request $request)
    {
        return $request->validate([
            'placa' => 'required|string|max:10',
            'renavan_numero' => 'required|string|max:50',
            'renavan_pdf' => 'nullable|file|mimes:pdf',
            'veiculo' => 'required|string|max:100',
            'ano' => 'required|integer|min:1900|max:2100',
            'tipo' => 'required|string|max:50',
            'setor' => 'required|string|max:100',
            'responsavel' => 'required|string|max:100',
            'dpl' => 'required|string|max:50',
        ]);
    }
    /**
     * Validação centralizada
     */
    private function validateDataUpdate(Request $request)
    {
        return $request->validate([
            'placa' => 'nullable|string|max:10',
            'veiculo' => 'nullable|string|max:100',
            'ano' => 'nullable|integer|min:1900|max:2100',
            'tipo' => 'nullable|string|max:50',
            'setor' => 'nullable|string|max:100',
            'responsavel' => 'nullable|string|max:100',
            'dpl' => 'nullable|string|max:50',
        ]);
    }

    /**
     * Upload de arquivos centralizado
     */
    private function handleUploads(Request $request, array $validated)
    {
        if ($request->hasFile('renavan_pdf')) {
            $validated['renavan_pdf'] = $request->file('renavan_pdf')
                ->store('veiculos', 'public');
        }

        return $validated;
    }

    public function revisoes(Veiculo $veiculo)
    {
        $veiculo->load('revisoes');

        return view('veiculos.revisoes', compact('veiculo'));
    }
    }