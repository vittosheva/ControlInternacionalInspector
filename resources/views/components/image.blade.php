@props([
    'circular' => true,
    'size' => 'md',
])
<div>
    <img
        {{
            $attributes
                ->class([
                    'fi-avatar object-cover object-center',
                ])
        }}
        src='{{ $getState() }}'
        alt=""
    />
</div>
