@props(['on', 'ms' => 2000])

<div x-data="{ shown: false, timeout: null }"
    x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, {{ $ms }});  })"
    x-show.transition.opacity.out.duration.1500ms="shown"
    style="display: none;"
    {{ $attributes->merge(['class' => 'text-sm text-gray-600']) }}>
    {{ $slot ?? 'Saved.' }}
</div>
