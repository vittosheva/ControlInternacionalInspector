@props([
    'title'     => __('QR Code'),
    'name'      => 'qr_code',
    'qrCode'    => '',
    'class'     => 'mx-auto',
    'width'     => '75',
    'style'     => '',
    'showTitle' => false,
    'align'     => 'center',
    'showIf'    => true,
])
@if ($showIf)
    <div>
        @if ($showTitle)
            <div class="flex justify-between items-center">
                <label for="{{ $name }}" class="flex mb-1 font-semibold text-gray-700">{{ $title }}</label>
            </div>
        @endif
        <div class="mx-auto text-{{ $align }}">
            @if (! empty($qrCode))
                <img src="data:image/png;base64,{{ $qrCode }}" alt="{{ __('QR Code') }}" id="{{ $name }}" @class($class) width="{{ $width }}">
            @else
                {{ 'No existe código QR' }}
            @endif
        </div>
    </div>
@endif
