@php
    $label = $label ?? '';
    $url = $url ?? '#';

@endphp
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ $url }}">{{ $label }}</a></li>
    </ol>
</nav>
