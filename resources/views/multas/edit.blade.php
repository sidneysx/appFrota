<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Multa
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            <div class="bg-gray-custom shadow sm:rounded-lg p-6">

                <form method="POST"
                      action="{{ route('multas.update', $multa->id) }}"
                      enctype="multipart/form-data"
                      class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <x-input-label value="Placa" />
                            <x-text-input name="placa"
                                class="mt-1 block w-full"
                                :value="old('placa', $multa->placa)"
                                required />
                            <x-input-error :messages="$errors->get('placa')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Setor" />
                            <x-text-input name="setor"
                                class="mt-1 block w-full"
                                :value="old('setor', $multa->setor)"
                                required />
                            <x-input-error :messages="$errors->get('setor')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Veículo" />
                            <x-text-input name="veiculo"
                                class="mt-1 block w-full"
                                :value="old('veiculo', $multa->veiculo)"
                                required />
                            <x-input-error :messages="$errors->get('veiculo')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Responsável" />
                            <x-text-input name="responsavel"
                                class="mt-1 block w-full"
                                :value="old('responsavel', $multa->responsavel)"
                                required />
                            <x-input-error :messages="$errors->get('responsavel')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Número do Auto de Infração" />
                            <x-text-input name="numero_auto"
                                class="mt-1 block w-full"
                                :value="old('numero_auto', $multa->numero_auto)"
                                required />
                            <x-input-error :messages="$errors->get('numero_auto')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Situação" />
                            <select name="situacao"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="Pendente" @selected($multa->situacao == 'Pendente')>Pendente</option>
                                <option value="Pago" @selected($multa->situacao == 'Pago')>Pago</option>
                                <option value="Recorrida" @selected($multa->situacao == 'Recorrida')>Recorrida</option>
                                <option value="Cancelada" @selected($multa->situacao == 'Cancelada')>Cancelada</option>
                                <option value="Vencida" @selected($multa->situacao == 'Vencida')>Vencida</option>
                            </select>
                        </div>

                        <div>
                            <x-input-label value="Data de Recebimento" />
                            <x-text-input type="date"
                                name="data_recebimento"
                                class="mt-1 block w-full"
                                :value="old('data_recebimento', $multa->data_recebimento)"
                                required />
                            <x-input-error :messages="$errors->get('data_recebimento')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Data de Vencimento" />
                            <x-text-input type="date"
                                name="data_vencimento"
                                class="mt-1 block w-full"
                                :value="old('data_vencimento', $multa->data_vencimento)"
                                required />
                            <x-input-error :messages="$errors->get('data_vencimento')" class="mt-2" />
                        </div>

                    </div>

                    <div>
                        <x-input-label value="Descrição da Infração" />
                        <textarea name="descricao"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            rows="3"
                            required>{{ old('descricao', $multa->descricao) }}</textarea>
                        <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                    </div>

                    {{-- PDF Atual --}}
                    <div>
                        <x-input-label value="PDF Atual" />
                        @if($multa->pdf)
                            <a href="{{ asset('storage/'.$multa->pdf) }}"
                               target="_blank"
                               class="text-indigo-600 hover:text-indigo-800 font-medium">
                                Visualizar PDF
                            </a>
                        @else
                            <p class="text-sm text-gray-500">Não enviado</p>
                        @endif
                    </div>

                    <div>
                        <x-input-label value="Novo PDF da Multa" />
                        <input type="file"
                            name="pdf"
                            class="mt-1 block w-full text-sm text-gray-500"
                            accept="application/pdf">
                    </div>

                    {{-- PDF Desconto --}}
                    <div>
                        <x-input-label value="PDF Desconto Atual" />
                        @if($multa->pdf_desconto)
                            <a href="{{ asset('storage/'.$multa->pdf_desconto) }}"
                               target="_blank"
                               class="text-indigo-600 hover:text-indigo-800 font-medium">
                                Visualizar PDF Desconto
                            </a>
                        @else
                            <p class="text-sm text-gray-500">Não enviado</p>
                        @endif
                    </div>

                    <div>
                        <x-input-label value="Novo PDF Desconto" />
                        <input type="file"
                            name="pdf_desconto"
                            class="mt-1 block w-full text-sm text-gray-500"
                            accept="application/pdf">
                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('multas.index') }}"
                           class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition">
                            Voltar
                        </a>

                        <x-primary-button>
                            Atualizar Multa
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>