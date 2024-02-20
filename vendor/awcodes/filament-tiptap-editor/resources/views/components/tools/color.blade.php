<x-filament-tiptap-editor::dropdown-button
    label="{{ trans('filament-tiptap-editor::editor.color.label') }}"
    active="color"
    icon="color"
    :list="false"
>
    <div
        x-data="{
            state: editor().getAttributes('textStyle').color || '#000000',

            init: function () {
                if (!(this.state === null || this.state === '')) {
                    this.setState(this.state)
                }
            },

            setState: function (value) {
                this.state = value
            }
        }"
        x-on:keydown.esc="isOpen() && $event.stopPropagation()"
        class="relative flex-1 p-1"
    >
        <tiptap-hex-color-picker x-bind:color="state" x-on:color-changed="setState($event.detail.value)"></tiptap-hex-color-picker>

        <div class="w-full flex gap-2 mt-2">
            <x-filament::button
                x-on:click="editor().chain().focus().setColor(state).run(); $dispatch('close-panel')"
                size="sm"
                class="flex-1"
            >
                {{ trans('filament-tiptap-editor::editor.color.choose') }}
            </x-filament::button>

            <x-filament::button
                x-on:click="editor().chain().focus().unsetColor().run(); $dispatch('close-panel')"
                size="sm"
                class="flex-1"
                color="danger"
            >
                {{ trans('filament-tiptap-editor::editor.color.remove') }}
            </x-filament::button>
        </div>
    </div>
</x-filament-tiptap-editor::dropdown-button>