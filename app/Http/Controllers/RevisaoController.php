<?php

namespace App\Http\Controllers;

use App\Models\Revisao;
use App\Models\Veiculo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RevisaoController extends Controller
{
    private const INTERVALO_PROXIMA_REVISAO_KM = 10000;
    
    public function index(Veiculo $veiculo)
    {
        $revisoes = $veiculo->revisoes()
            ->latest()
            ->get();

        return view('revisoes.index', compact('veiculo','revisoes'));
    }

    
    public function create(Veiculo $veiculo)
    {
        return view('revisoes.create', compact('veiculo'));
    }

    
    public function store(Request $request, Veiculo $veiculo)
    {
        
        if ($request->filled('valor')) {
            $request->merge([
                'valor' => $this->normalizeValor($request->input('valor')),
            ]);
        }

        $data = $this->validateData($request);

        $ultimaRevisao = $veiculo->revisoes()->latest()->first();

        if ($ultimaRevisao) {
            if (Carbon::parse($data['data'])->lt(Carbon::parse($ultimaRevisao->data))) {
                throw ValidationException::withMessages([
                    'data' => 'A data deve ser igual ou posterior à última revisão em ' . Carbon::parse($ultimaRevisao->data)->format('d/m/Y') . '.',
                ]);
            }

            if ($data['km'] < $ultimaRevisao->km) {
                throw ValidationException::withMessages([
                    'km' => 'O KM deve ser igual ou maior que o último registrado (' . $ultimaRevisao->km . ').',
                ]);
            }
        }

        $data['proxima_km'] = $data['km'] + self::INTERVALO_PROXIMA_REVISAO_KM;
        $data['veiculo_id'] = $veiculo->id;

        Revisao::create($data);

        return redirect()->route('revisoes.index', $veiculo->id)
            ->with('success', 'Revisão cadastrada com sucesso.');
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(Revisao $revisao)
    {
        $veiculo = $revisao->veiculo;

        return view('revisoes.edit', compact('veiculo', 'revisao'));
    }

    
    public function update(Request $request, Revisao $revisao)
    {
        if ($request->filled('valor')) {
            $request->merge([
                'valor' => $this->normalizeValor($request->input('valor')),
            ]);
        }

        $data = $this->validateDataUpdate($request);

        $veiculo = $revisao->veiculo;

        $ultimaRevisao = $veiculo->revisoes()
            ->where('id', '!=', $revisao->id)
            ->latest()
            ->first();

        if ($ultimaRevisao) {
            if (isset($data['data']) && Carbon::parse($data['data'])->lt(Carbon::parse($ultimaRevisao->data))) {
                throw ValidationException::withMessages([
                    'data' => 'A data deve ser igual ou posterior à última revisão em ' . Carbon::parse($ultimaRevisao->data)->format('d/m/Y') . '.',
                ]);
            }

            if (isset($data['km']) && $data['km'] < $ultimaRevisao->km) {
                throw ValidationException::withMessages([
                    'km' => 'O KM deve ser igual ou maior que o último registrado (' . $ultimaRevisao->km . ').',
                ]);
            }
        }

        if (isset($data['km'])) {
            $data['proxima_km'] = $data['km'] + self::INTERVALO_PROXIMA_REVISAO_KM;
        }

        $revisao->update($data);

        return redirect()->route('revisoes.index', $revisao->veiculo_id)
            ->with('success', 'Revisão atualizada com sucesso.');
    }

   
    public function destroy(Revisao $revisao)
    {
        $veiculoId = $revisao->veiculo_id;

        $revisao->delete();

        return redirect()->route('revisoes.index', $veiculoId)
            ->with('success', 'Revisão excluída com sucesso.');
    }

    
    private function validateData(Request $request)
    {
        return $request->validate([
            'data' => 'required|date',
            'km' => 'required|integer',
            'local' => 'required|string',
            'valor' => 'required|numeric'
        ]);
    }

    
    private function validateDataUpdate(Request $request)
    {
        return $request->validate([
            'data' => 'nullable|date',
            'km' => 'nullable|integer',
            'local' => 'nullable|string',
            'valor' => 'nullable|numeric'
        ]);
    }

    
    private function normalizeValor(?string $valor): ?string
    {
        if ($valor === null) {
            return null;
        }

       
        $semPonto = str_replace('.', '', $valor);

    
        return str_replace(',', '.', $semPonto);
    }
    
}
