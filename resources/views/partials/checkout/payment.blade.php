@push('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.key') }}"></script>
@endpush
<div class="bg-white border border-gray-200 rounded-xl">
    <div class="flex items-center h-16 px-6 border-b border-gray-100">
        <h3 class="text-lg font-medium">
            Payment
        </h3>
    </div>

    @if ($currentStep >= $step)
        <div class="p-6 space-y-4">
            <div class="flex gap-4">
                <button @class([
                    'px-5 py-2 text-sm border font-medium rounded-lg',
                    'text-green-700 border-green-600 bg-green-50' => $paymentType === 'cash-in-hand',
                    'text-gray-500 hover:text-gray-700' => $paymentType !== 'cash-in-hand',
                ])
                        type="button"
                        wire:click.prevent="$set('paymentType', 'cash-in-hand')">
                    Pay with cash
                </button>

                <button @class([
                    'px-5 py-2 text-sm border font-medium rounded-lg',
                    'text-green-700 border-green-600 bg-green-50' => $paymentType === 'card',
                    'text-gray-500 hover:text-gray-700' => $paymentType !== 'card',
                ])
                        type="button"
                        wire:click.prevent="$set('paymentType', 'card')">
                    Pay by card
                </button>
            </div>

            @if ($paymentType == 'card')
                <livewire:stripe.payment :cart="$cart"
                                         :returnUrl="route('checkout.view')" />
            @endif

            @if ($paymentType == 'cash-in-hand')
            @error('recaptcha')
                <div class="bg-red-300 text-red-700 p-3 rounded">{{ $message }}</div>
            @enderror
                <form id="cashInHand"
                {{-- wire:submit="checkout"  --}}
                @submit.prevent="doCaptcha"
                x-data="{
                    siteKey: @js(config('services.recaptcha.key')),
                    {{-- doCheckout(token) {
                            @this.set('token', token);
                            Livewire.dispatch('formSubmitted');
                    }, --}}
                    doCaptcha() {
                    {{-- grecaptcha.ready(function() { --}}
                        grecaptcha.execute(this.siteKey, {action: 'submit'}).then(token => {
                            @this.set('token', token);
                            Livewire.dispatch('onCheckout');
                        });
                    {{-- }); --}}
                    },
                }">
                    <div class="p-4 text-sm text-center text-blue-700 rounded-lg bg-blue-50">
                        Payment is offline, no card details needed.
                    </div>

                    <button class="g-recaptcha px-5 py-3 mt-4 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-500"
                            {{-- data-sitekey="{{ config('services.recaptcha.key') }}"
                            data-callback='onSubmit'
                            data-action='submit' --}}
                            type="submit"
                            wire:key="payment_submit_btn">
                        <span wire:loading.remove.delay>
                            Submit Order
                        </span>
                        <span wire:loading.delay>
                            <svg class="w-5 h-5 text-white animate-spin"
                                 xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24">
                                <circle class="opacity-25"
                                        cx="12"
                                        cy="12"
                                        r="10"
                                        stroke="currentColor"
                                        stroke-width="4"></circle>
                                <path class="opacity-75"
                                      fill="currentColor"
                                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </span>
                    </button>
                </form>
            {{-- @push('scripts')
            <script type="text/javascript">
                function onSubmit(token) {
                    Alpine.$data(document.getElementById("cashInHand")).doCheckout(token);
                }
            </script>
            @endpush --}}
            @endif
        </div>
    @endif
</div>
