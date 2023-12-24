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
                    <tr class="bg-grey-800 text-black text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Last Seen</th>
                        <th class="py-3 px-6 text-left">Status</th>
                    </tr>
                </table>
                @forelse ($users as $user)
                <tr class="border-b border-grey-200 hove:bg-grey-100">
                    <td class="">{{ $user->name }}</td>
                    <td class="">{{ $user->email }}</td>
                    <td class="">{{ carbon\carbon::parse($user->last_seen)->diffForHumans() }}</td>
                    {{--  <span {{ $user->last_seen>=now()->subMinutes(2)?'online':'offline' }}>  --}}
                    <td>{{ $user->last_seen>=now()->subMinutes(2)?'online':'offline' }}</td>
                    {{--  </span>  --}}
                </tr>
                @empty
                Ther are No Users
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
