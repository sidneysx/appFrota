<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($veiculo) ? 'Editar Veículo' : 'Novo Veículo' }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            <div class="bg-gray-custom shadow sm:rounded-lg p-6">

                <form 
                method="POST"
                action="{{ isset($veiculo) ? route('veiculos.update', $veiculo) : route('veiculos.store') }}"
                enctype="multipart/form-data"
            >
                @csrf

                @if(isset($veiculo))
                    @method('PUT') 
                @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <x-input-label value="Placa" />
                            <x-text-input name="placa" class="mt-1 block w-full"
                                :value="old('placa', $veiculo->placa ?? '')"
                                required />
                            <x-input-error :messages="$errors->get('placa')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Renavam" />
                            <x-text-input name="renavan_numero" class="mt-1 block w-full"
                                :value="old('renavan_numero', $veiculo->renavan_numero ?? '')"
                                required />
                            <x-input-error :messages="$errors->get('renavan_numero')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Veículo (Modelo)" />
                            <x-text-input name="veiculo" class="mt-1 block w-full"
                                :value="old('veiculo', $veiculo->veiculo ?? '')"
                                required />
                            <x-input-error :messages="$errors->get('veiculo')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Ano" />
                            <x-text-input type="number" name="ano" class="mt-1 block w-full"
                                :value="old('ano', $veiculo->ano ?? '')"
                                required />
                            <x-input-error :messages="$errors->get('ano')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Tipo" />
                            <x-text-input name="tipo" class="mt-1 block w-full"
                                :value="old('tipo', $veiculo->tipo ?? '')"
                                required />
                            <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Setor" />
                            <x-text-input name="setor" class="mt-1 block w-full"
                                :value="old('setor', $veiculo->setor ?? '')"
                                required />
                            <x-input-error :messages="$errors->get('setor')" class="mt-2" />
                           
                        </div>

                        <div>
                            <x-input-label value="Responsável" />
                            <x-text-input name="responsavel" class="mt-1 block w-full"
                                :value="old('responsavel', $veiculo->responsavel ?? '')"
                                required />
                            <x-input-error :messages="$errors->get('responsavel')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="DPL" />
                            <select name="dpl" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="DPL FROTA SUL" @selected(old('dpl', $veiculo->dpl ?? '')=='DPL FROTA SUL')>DPL FROTA SUL</option>
                            </select>
                            <x-input-error :messages="$errors->get('dpl')" class="mt-2" />
                            
                        </div>

                        <div class="md:col-span-2">
                            <x-input-label value="Renavam (PDF)" />
                            <input type="file" name="renavan_pdf" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                            <x-input-error :messages="$errors->get('renavan_pdf')" class="mt-2" />

                            @if(isset($veiculo) && $veiculo->renavan_pdf)
                                <p class="mt-2 text-sm text-gray-600">
                                    Arquivo atual: <a class="underline" href="{{ asset('storage/'.$veiculo->renavan_pdf) }}" target="_blank" rel="noopener">ver PDF</a>
                                </p>
                            @endif
                        </div>

                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <a href="{{ route('veiculos.index') }}" 
                           class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition">
                            Voltar
                        </a>

                        <x-primary-button>
                            {{ isset($veiculo) ? 'Atualizar Veículo' : 'Salvar Veículo' }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>