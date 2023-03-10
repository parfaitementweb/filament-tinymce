<x-dynamic-component
        :component="$getFieldWrapperView()"
        :id="$getId()"
        :label="$getLabel()"
        :label-sr-only="$isLabelHidden()"
        :helper-text="$getHelperText()"
        :hint="$getHint()"
        :hint-action="$getHintAction()"
        :hint-color="$getHintColor()"
        :hint-icon="$getHintIcon()"
        :required="$isRequired()"
        :state-path="$getStatePath()"
>

    <div
        wire:ignore
        class="relative"
        x-data="filamenttinymce({
            state: $wire.entangle('{{ $getStatePath() }}').defer,
            state_path: '{{ $getStatePath() }}',
            wire: $wire,
            id: $id,
            css: '{{ $getCssPath() }}',
            body_class: '{{ config('filament-tinymce.body_class', '') }}',
            content_style: '{{ $getContentStyle() ?? config('filament-tinymce.content_style', '') }}'
        })"
    >

        <div x-ref="element"></div>

        <textarea
                x-ref="textarea"
                tabindex="-1"
                class="sr-only"
                aria-hidden="true"
                name="{{ $getStatePath() }}"
        @if (!$isConcealed())
            {!! filled($length = $getMaxLength()) ? "maxlength=\"{$length}\"" : null !!}
            {!! filled($length = $getMinLength()) ? "minlength=\"{$length}\"" : null !!}
            {!! $isRequired() ? 'required' : null !!}
        @endif
        {{ $applyStateBindingModifiers('wire:model') }}="{{ $getStatePath() }}"
        ></textarea>

    </div>
</x-dynamic-component>
