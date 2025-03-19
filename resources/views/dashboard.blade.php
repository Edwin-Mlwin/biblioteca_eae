<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    
                    <!-- Mostrar la lista de usuarios -->
                    <h3 class="mt-5">Lista de Usuarios</h3>
                    <table class="min-w-full border-collapse table-auto">
                        <thead>
                            <tr>
                                <th class="border-b px-4 py-2 text-left">Nombre</th>
                                <th class="border-b px-4 py-2 text-left">Email</th>
                                <th class="border-b px-4 py-2 text-left">Estado</th>  <!-- Nueva columna para el estado -->
                                <th class="border-b px-4 py-2 text-left">Fecha de creación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td class="border-b px-4 py-2">{{ $usuario->name }}</td>
                                    <td class="border-b px-4 py-2">{{ $usuario->email }}</td>
                                    
                                    <!-- Mostrar el estado como "Activo" o "Inactivo" -->
                                    <td class="border-b px-4 py-2">
                                        @if($usuario->estado == 1)
                                            <span class="text-green-500">Activo</span>
                                        @else
                                            <span class="text-red-500">Inactivo</span>
                                        @endif
                                    </td>
                                    
                                    <td class="border-b px-4 py-2">{{ $usuario->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
