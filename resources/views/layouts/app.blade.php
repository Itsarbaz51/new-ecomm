@props(['title' => '', 'bodyClass' => ''])
<x-base-layout :$title :$bodyClass>
    @include('layouts.headerFooter.header')
    {{ $slot }}
    {{--  <hr class="mt-5 text-secondary" />  --}}
    @include('layouts.headerFooter.footer')
    {{--  <div id="scrollTop" class="visually-hidden end-0"></div>
    <div class="page-overlay"></div>  --}}
</x-base-layout>
