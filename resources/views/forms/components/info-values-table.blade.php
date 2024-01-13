<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    @php
        $info = collect($getChildComponentContainer()->getLivewire()->data)->except(['items_repeater', 'additional_data'])->toArray();
    @endphp
    <div>
        <div class="fi-fo-field-info-values border border-gray-200 shadow-sm rounded-lg overflow-hidden max-w-sm mx-auto">
            <table class="w-full text-sm leading-5">
                <tbody>
                    <tr class="bg-gray-50">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Subtotal sin impuestos</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right">{{ $info['gross_subtotal'] ?? zeros() }}</span></td>
                    </tr>
                    <tr class="bg-white">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Subtotal 12%</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right">{{ $info['subtotal_12'] ?? zeros() }}</span></td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Subtotal 0%</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right">{{ $info['subtotal_0'] ?? zeros() }}</span></td>
                    </tr>
                    <tr class="bg-white">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Subtotal No objeto impuesto</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right">{{ $info['subtotal_no_objeto_impuesto'] ?? zeros() }}</span></td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Subtotal Exento IVA</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right">{{ $info['subtotal_excento_iva'] ?? zeros() }}</span></td>
                    </tr>
                    <tr class="bg-white">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Total Descuento</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right">{{ $info['discount_total'] ?? zeros() }}</span></td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">ICE</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right">{{ $info['ice_total'] ?? zeros() }}</span></td>
                    </tr>
                    <tr class="bg-white">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">IVA 12%</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right">{{ $info['iva_total'] ?? zeros() }}</span></td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Propina</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right">{{ $info['tip_total'] ?? zeros() }}</span></td>
                    </tr>
                    <tr class="bg-white">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Valor total</td>
                        <td class="px-3 py-1.5 text-right text-gray-700">{{ $info['total'] ?? zeros() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-dynamic-component>
