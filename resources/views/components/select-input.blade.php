@props(['disabled' => false, 'selected' => null, 'options' => []])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-theme-primary-500 dark:focus:border-theme-primary-600 focus:ring-theme-primary-500 dark:focus:ring-theme-primary-600 rounded-md shadow-sm']) !!}>
    <option value=""> {{__('Please select any option')}} </option>
    @foreach ($options as $key => $option)
        <option value="{{$key}}" @if($key == $selected) selected @endif> {{$option}} </option>
    @endforeach
</select>
