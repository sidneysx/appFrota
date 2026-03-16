<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Revisão
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            <div class="bg-gray-custom shadow sm:rounded-lg p-6">

                <form 
                    method="POST"
                    action="{{ route('revisoes.update', $revisao->id) }}"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <x-input-label value="Data da Revisão" />
                            <x-text-input 
                                type="date" 
                                name="data" 
                                class="mt-1 block w-full"
                                :value="old('data', $revisao->data ? \Carbon\Carbon::parse($revisao->data)->format('Y-m-d') : '')"
                                required 
                            />
                            <x-input-error :messages="$errors->get('data')" class="mt-2" />
                        </div>
                        
                        <div>
                            <x-input-label value="KM" />
                            <x-text-input 
                                name="km" 
                                class="mt-1 block w-full"
                                :value="old('km', $revisao->km)"
                                required 
                            />
                            <x-input-error :messages="$errors->get('km')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Local da Revisão" />
                            <x-text-input 
                                name="local" 
                                class="mt-1 block w-full"
                                :value="old('local', $revisao->local)"
                                required 
                            />
                            <x-input-error :messages="$errors->get('local')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Valor da Revisão" />
                            <x-text-input 
                                name="valor" 
                                class="mt-1 block w-full"
                                :value="old('valor', number_format($revisao->valor, 2, ',', '.'))"
                                required 
                            />
                            <x-input-error :messages="$errors->get('valor')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Próxima Revisão (KM)" />
                            <x-text-input 
                                name="proxima_km_mostragem"
                                class="mt-1 block w-full"
                                :value="$revisao->proxima_km ? number_format($revisao->proxima_km, 0, ',', '.') : ''"
                                disabled
                            />
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <a href="{{ route('revisoes.index', $revisao->veiculo_id) }}" 
                           class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition">
                            Voltar
                        </a>

                        <x-primary-button>
                            Atualizar Revisão
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>