<div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 overflow-hidden sm:rounded-lg">
        <div class="flex flex-col md:flex-row py-4">
            {{-- <nav class="basis-1/5 space-y-4 text-sm font-medium ml-4">
                <a href="#" class="block underline hover:opacity-75">Orders</a>
                <a href="#" class="block underline hover:opacity-75">Addresses</a>
            </nav> --}}
            <div class="ml-4 mb-3 md:basis-4/5">
                <h3 class="mb-4 text-2xl font-medium">Orders</h3>
                <div class="w-full flex flex-col">
                    <table class="table-auto">
                        <thead class="font-medium bg-gray-100 dark:bg-gray-900"><tr>
                            <td class="p-4">Order</td>
                            <td class="p-4">Date</td>
                            <td class="p-4">Status</td>
                            <td class="p-4">Total</td>
                        </tr></thead>
                        <tbody class="text-sm">
                        @forelse($this->orders as $order)
                        <tr>
                            <td class="p-4">{{ $order->reference }}</td>
                            <td class="p-4">{{ $order->placed_at->toDateString() }}</td>
                            <td class="p-4">{{ $order->status }}</td>
                            <td class="p-4">{{ $order->total->formatted() }} for {{ count($order->lines) }} items</td>
                        </tr>
                        @empty
                        <div class="flex flex-col items-center gap-4">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </div>
                        <div><p>You haven't shopped with us yet. Is today the day?</p></div>
                        <x-primary-button><a href="/">Continue shopping</a></x-primary-button>
                        </div>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- <h3 class="mb-4 text-2xl font-medium">Addresses</h3>
                <div class="w-full flex flex-col">
                    @forelse($user->latestCustomer()?->addresses as $address)
                    <pre>{{ $address }}</pre>
                    @empty
                    <a href="#" class="block underline hover:opacity-75">Add an address</a>
                    @endforelse
                </div> --}}
            </div>
        </div>
    </div>
</div>
