<x-layouts.portal>
    <x-slot name="title">
        {{ setting('invoice.title', trans_choice('general.invoices', 1)) . ': ' . $invoice->document_number }}
    </x-slot>

    <x-slot name="buttons">
        @stack('button_pdf_start')
        <x-link href="{{ route('portal.invoices.pdf', $invoice->id) }}" class="bg-green text-white px-3 py-1.5 mb-3 sm:mb-0 rounded-lg text-sm font-medium leading-6 hover:bg-green-700">
            {{ trans('general.download') }}
        </x-link>
        @stack('button_pdf_end')

        @stack('button_print_start')
        <x-link href="{{ route('portal.invoices.print', $invoice->id) }}" target="_blank" class="px-3 py-1.5 mb-3 sm:mb-0 bg-gray-100 hover:bg-gray-200 rounded-lg text-sm font-medium leading-6">
            {{ trans('general.print') }}
        </x-link>
        @stack('button_print_end')
    </x-slot>

    <x-slot name="content">
        <div class="flex flex-col lg:flex-row my-10 lg:space-x-24 rtl:space-x-reverse space-y-12 lg:space-y-0">
            <div class="w-full lg:w-5/12">
                @if (! empty($payment_methods) && ! in_array($invoice->status, ['paid', 'cancelled']))
                    <x-tabs active="{{ reset($payment_methods) }}">
                        <div role="tablist" class="flex flex-wrap">
                            @php $is_active = true; @endphp

                            <x-slot name="navs">
                                <div class="swiper swiper-links w-full">
                                    <div class="swiper-wrapper">
                                        @foreach ($payment_methods as $key => $name)
                                            @stack('invoice_{{ $key }}_tab_start')
                                                <div class="swiper-slide">
                                                    <x-tabs.nav
                                                        id="{{ $name }}"
                                                        @click="onChangePaymentMethodSigned('{{ $key }}')"
                                                    >
                                                        <div class="w-24 truncate">
                                                            {{ $name }}
                                                        </div>
                                                    </x-tabs.nav>
                                                </div>
                                            @stack('invoice_{{ $key }}_tab_end')

                                            @php $is_active = false; @endphp
                                        @endforeach
                                    </div>

                                    <div class="swiper-button-next top-3 right-0">
                                        <span class="material-icons">chevron_right</span>
                                    </div>

                                    <div class="swiper-button-prev top-3 left-0">
                                        <span class="material-icons">chevron_left</span>
                                    </div>
                                </div>
                            </x-slot>
                        </div>
                        @php $is_active = true; @endphp

                        <x-slot name="content">
                            @foreach ($payment_methods as $key => $name)
                                @stack('invoice_{{ $key }}_content_start')
                                    <x-tabs.tab id="{{ $name }}">
                                        <div class="my-3">
                                            <component v-bind:is="method_show_html" @interface="onRedirectConfirm"></component>
                                        </div>
                                    </x-tabs.tab>
                                @stack('invoice_{{ $key }}_content_end')

                                @php $is_active = false; @endphp
                            @endforeach

                            <x-form id="portal">
                                <x-form.group.payment-method
                                    id="payment-method"
                                    :selected="array_key_first($payment_methods)"
                                    not-required
                                    form-group-class="invisible"
                                    placeholder="{{ trans('general.form.select.field', ['field' => trans_choice('general.payment_methods', 1)]) }}"
                                    change="onChangePaymentMethod('{{ array_key_first($payment_methods) }}')"
                                />

                                <x-form.input.hidden name="document_id" :value="$invoice->id" v-model="form.document_id" />
                            </x-form>
                        </x-slot>
                    </x-tabs>
                @endif

                @if ($invoice->transactions->count())
                    <x-show.accordion type="transactions" open>
                        <x-slot name="head">
                            <x-show.accordion.head
                                title="{{ trans_choice('general.transactions', 2) }}"
                                description=""
                            />
                        </x-slot>

                        <x-slot name="body" class="block" override="class">
                            <div class="text-xs mt-1" style="margin-left: 0 !important;">
                                <span class="font-medium">
                                    {{ trans('invoices.payment_received') }} :
                                </span>

                                @if ($invoice->transactions->count())
                                    @foreach ($invoice->transactions as $transaction)
                                        <div class="my-2">
                                            <span>
                                                <x-link href="{{ route('portal.payments.show', $transaction->id) }}" class="text-black bg-no-repeat bg-0-2 bg-0-full hover:bg-full-2 bg-gradient-to-b from-transparent to-black transition-backgroundSize" override="class">
                                                    <x-date :date="$transaction->paid_at" />
                                                </x-link>
                                                - {!! trans('documents.transaction', [
                                                    'amount' => '<span class="font-medium">' . money($transaction->amount, $transaction->currency_code, true) . '</span>',
                                                    'account' => '<span class="font-medium">' . $transaction->account->name . '</span>',
                                                ]) !!}
                                            </span>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="my-2">
                                        <span>{{ trans('general.no_records') }}</span>
                                    </div>
                                @endif
                            </div>
                        </x-slot>
                    </x-show.accordion>
                @endif
            </div>

            <div class="hidden lg:block w-7/12">
                <x-documents.show.template
                    type="invoice"
                    :document="$invoice"
                    document-template="{{ setting('invoice.template', 'default') }}"
                />
            </div>
        </div>
    </x-slot>

    @push('stylesheet')
        <link rel="stylesheet" href="{{ asset('public/css/print.css?v=' . version('short')) }}" type="text/css">
    @endpush

    <x-script folder="portal" file="apps" />
</x-layouts.portal>
