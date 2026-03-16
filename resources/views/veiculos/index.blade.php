<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Veículos') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Controle de Veículos
        </h2>

        <a href="{{ route('veiculos.create') }}"
           class="px-4 py-2 bg-indigo-300 text-black rounded-md text-sm hover:bg-indigo-400 hover:text-white transition">
            + Novo Veículo
        </a>
    </div>

    <div class=" mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white shadow-md rounded-xl overflow-hidden">

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-4 py-3 text-left">Placa</th>
                            <th class="px-4 py-3 text-left">Renavan</th>
                            <th class="px-4 py-3 text-left">Veículo</th>
                            <th class="px-4 py-3 text-left">Ano</th>
                            <th class="px-4 py-3 text-left">Tipo</th>
                            <th class="px-4 py-3 text-left">Setor</th>
                            <th class="px-4 py-3 text-left">Responsável</th>
                            <th class="px-4 py-3 text-left">DPL</th>
                            <th class="px-4 py-3 text-left">Revisão</th>
                            <th class="px-4 py-3 text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @foreach ($veiculos as $veiculo)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-3 font-medium">{{ $veiculo->placa ?? '-' }}</td>

                                <td class="px-4 py-3">
                                   @if($veiculo->renavan_pdf)
                                        <a href="{{ asset('storage/'.$veiculo->renavan_pdf) }}"
                                        target="_blank"
                                        class="text-indigo-600 hover:text-indigo-800 font-medium">
                                            {{ $veiculo->renavan_numero }}
                                        </a>
                                    @endif
                                </td>

                                <td class="px-4 py-3">{{ $veiculo->veiculo }}</td>
                                <td class="px-4 py-3">{{ $veiculo->ano ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $veiculo->tipo ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $veiculo->setor ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $veiculo->responsavel ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $veiculo->dpl }}</td>

                                <td class="px-4 py-3 text-center">
                                <a href="{{ route('revisoes.index', $veiculo->id) }}"
                                class="text-indigo-600 hover:text-indigo-800 font-medium">
                                Revisões
                                </a>
                                </td>

                                <td class="px-4 py-3 text-center space-x-3">
                                    <a href="{{ route('veiculos.edit', $veiculo->id) }}"
                                       class="text-indigo-600 hover:text-blue-800 font-medium">
                                       <i class="fa-solid fa-file-pen"></i>
                                    </a>

                                    <form action="{{ route('veiculos.destroy', $veiculo->id) }}"
                                          method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Deseja realmente excluir este veículo?')"
                                                class="text-red-600 hover:text-red-800 font-medium">
                                                <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if ($veiculos->isEmpty())
                            <tr>
                                <td colspan="10" class="text-center py-6 text-gray-500">
                                    <i class="fa-solid fa-triangle-exclamation"></i>Nenhum veículo cadastrado.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>