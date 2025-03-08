@props(['disabled' => false, 'options' => [], 'selected' => [], 'tomOptions' => []])

<div wire:ignore x-data="{
    init() {
        new Tom(this.$refs.select, {
            sortField: {
                field: 'text',
                direction: 'asc'
            },
            valueField: 'value',
            labelField: 'text',
            searchField: 'text',
            ...@json($tomOptions)
        });
    }
}">
    <select 
        x-ref="select" 
        {{ $disabled ? 'disabled' : '' }} 
        {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm dark:text-white dark:bg-zinc-700']) !!}
    >
        @foreach($options as $key => $value)
            <option value="{{ $key }}" {{ in_array($key, $selected) ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
        {{ $slot }}
    </select>
</div>