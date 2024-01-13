<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <img x-bind:src="state" class="h-28" alt=""/>
    </div>
</x-dynamic-component>
