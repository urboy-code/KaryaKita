<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Kelola Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white md:bg-gradient-to-br from-secondary-light to-primary-light overflow-hidden shadow-sm sm:rounded-lg py-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium">{{ __('Daftar Semua Pengguna') }}</h3>

                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 mt-6 rounded-md">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                        Nama
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                        Peran
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                        Tgl. Daftar
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900"><span
                                            class="sr-only">Aksi</span></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-gray-900">
                                @forelse ($users as $user)
                                    <tr class="@if ($user->status == 'blocked') bg-red-700 text-white @endif">
                                        <td class="px-6 py-4">{{ $user->name }}</td>
                                        <td class="px-6 py-4">{{ $user->email }}</td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if ($user->role == 'admin') bg-red-100 text-red-800 @endif 
                                                @if ($user->role == 'talent') bg-green-100 text-green-800 @endif 
                                                @if ($user->role == 'client') bg-blue-100 text-blue-800 @endif">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <form action="{{ route('admin.users.toggle_status', $user) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="font font-medium 
                                                    @if ($user->status == 'active') text-red-600 hover:text-red-900 
                                                    @else text-green-600 hover:text-green-900 @endif                                    ">
                                                    {{ $user->status == 'active' ? 'Block' : 'Unblock' }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-950">
                                            Belum ada pengguna.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
