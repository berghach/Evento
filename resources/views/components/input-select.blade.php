@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'h-10 ps-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    <option value="" selected disabled>Choose your type</option>
    <option value="client">Client</option>
    <option value="organiser">Organiser</option>
</select>
