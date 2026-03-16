<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nova Multa
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            <div class="bg-gray-custom shadow sm:rounded-lg p-6">

                <form method="POST" action="{{ route('multas.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <x-input-label value="Placa" />
                            <x-text-input name="placa" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('placa')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Setor" />
                            <x-text-input name="setor" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('setor')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Veículo" />
                            <x-text-input name="veiculo" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('veiculo')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Responsável" />
                            <x-text-input name="responsavel" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('responsavel')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Número do Auto de Infração" />
                            <x-text-input name="numero_auto" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('numero_auto')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Situação" />
                            <select name="situacao" class="mt-1 block w-full rounded-md border-gray-300">
                                <option value="Pendente">Pendente</option>
                                <option value="Pago">Pago</option>
                                <option value="Recorrida">Recorrida</option>
                                <option value="Cancelada">Cancelada</option>
                                <option value="Vencida">Vencida</option>
                            </select>
                        </div>

                        <div>
                            <x-input-label value="Data de Recebimento" />
                            <x-text-input type="date" name="data_recebimento" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('data_recebimento')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label value="Data de Vencimento" />
                            <x-text-input type="date" name="data_vencimento" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('data_vencimento')" class="mt-2" />
                        </div>

                    </div>

                    <div>
                        <x-input-label value="Descrição da Infração" />
                        <textarea name="descricao"
                            class="mt-1 block w-full rounded-md border-gray-300"
                            rows="3"
                            required></textarea>
                        <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label value="Anexar PDF da Multa" />
                        <input type="file" name="pdf"
                            class="mt-1 block w-full text-sm text-gray-500"
                            accept="application/pdf">
                        <x-input-error :messages="$errors->get('pdf')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label value="Anexar PDF do Desconto Assinado" />
                        <input type="file" name="pdf_desconto"
                            class="mt-1 block w-full text-sm text-gray-500"
                            accept="application/pdf">
                        <x-input-error :messages="$errors->get('pdf_desconto')" class="mt-2" />
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>
                            Salvar Multa
                        </x-primary-button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>