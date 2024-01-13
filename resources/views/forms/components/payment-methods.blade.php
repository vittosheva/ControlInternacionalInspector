<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    @php
        $livewire = $getChildComponentContainer()->getLivewire();
    @endphp
    <livewire:payment-method-form
        :operation="$livewire->cachedForms['form']->getOperation()"
        :info="collect($livewire->data)
            ->only(['payment_methods'])
            ->toArray()"
        :total="collect($livewire->data)
            ->only(['total'])
            ->get('total')"
    />
</x-dynamic-component>
