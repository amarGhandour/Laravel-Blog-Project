@props(['name', 'type' => 'text'])

<x-form.panel>
    <x-form.label name="{{$name}}"/>

    <input class="border border-gray-400 p-2 w-full rounded"
           name="{{$name}}"
           id="{{$name}}"
           value="{{ old($name) }}"
           type="{{$type}}"
           required
    >

    <x-form.error name="{{$name}}"/>
</x-form.panel>
