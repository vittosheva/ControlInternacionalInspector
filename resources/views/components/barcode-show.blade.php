@props([
    'title'     => __('Barcode'),
    'name'      => 'bar_code',
    'barcode'   => '',
    'class'     => '',
    'width'     => '',
    'style'     => '',
    'showTitle' => true,
    'showIf'    => true,
])
@if ($showIf)
    <div @class([$class => ! empty($class)])>
        @if ($showTitle)
            <div class="flex justify-between items-center">
                <label for="{{ $name }}" class="flex mb-1 font-semibold text-gray-700">{{ $title }}</label>
            </div>
        @endif
        <div class="mx-auto text-center">
            @if ($barcode && is_string($barcode))
                @if (isValidXML($barcode))
                    {!! $barcode !!}
                @else
                    <img src="data:image/png;base64,{!! base64_encode($barcode) !!}" alt="barcode" style="height:50px;width:100%;"/>
                @endif
            @else
                {{ __('There is no barcode') }}
            @endif

            {{--@if ($barcode && is_int($barcode))
                {!! DNS1D::getBarcodeHTML($barcode, 'EAN13') !!}
            @elseif (is_string($barcode))
                <img src="data:image/png,{!! DNS1D::getBarcodePNG($barcode, 'C39+') !!}" alt="barcode" style="height:50px;width:100%"/>
            @else
                {{ 'No existe código de barras' }}
            @endif--}}
        </div>
    </div>
@endif
