@php
    if(isset($formValue)){
        $setValue = $formValue;
    }else{
        $setValue = $oldValue;
    }
@endphp

<input type="text" name="{{ $name }}" value="{{ $setValue }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />