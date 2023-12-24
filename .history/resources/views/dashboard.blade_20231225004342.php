<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--
                <x-welcome /> --}}
                <table class="w-full table-auto">
                    <tr class="bg-grey-800 text-whiite text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Last Seen</th>
                        <th class="py-3 px-6 text-center">Status</th>
                    </tr>
                @forelse ($users as $user)
                <tr class="border-b border-grey-200 hove:bg-grey-100">
                    <td class="py-3 px-6">{{ $user->name }}</td>
                    <td class="py-3 px-6">{{ $user->email }}</td>
                    <td class="py-3 px-6">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>
                    <td class="py-3 px-6 text-center">
                    <span bg-{{ $user->last_seen>=now()->subMinutes(2)?'green':'red' }}-500 text-white py-1 px-3 rounded-full text-lg>
                        {{ $user->last_seen >= now()->subMinutes(2) ?'online':'offline' }}
                    </td>
                    </span>
                </tr>
                @empty
                Ther are No Users
                @endforelse
            </table>

            </div>
        </div>
    </div>
</x-app-layout>
