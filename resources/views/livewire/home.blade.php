@extends('layouts.app', ['title' => __('Customer Numbers')])

@livewireStyles

@section('content')
    @include('users.partials.header')   

<div class="container-fluid mt--7">
    <div class="row">
        <!-- preferences -->
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            @livewire('preferences')
        </div>
        <!-- number -->
        @livewire('number',['id' => Route::current()->parameter('id')])
    </div>
    @livewireScripts

</div>
@endsection