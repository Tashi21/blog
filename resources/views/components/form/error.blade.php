@props(['name'])

@error($name)
<p class="text-red-500 test-xs mt-1">
    {{$message}}
</p>
@enderror
