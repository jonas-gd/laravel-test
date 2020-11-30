@extends('layouts.app', ['title' => __('New Customer')])

@section('content')
    @include('users.partials.header')   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit Customer') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/customer/update/{{$customer->id}}" autocomplete="off">
                            @csrf
                            @method('post')

                            <h6 class="heading-small text-muted mb-4">{{ __('Customer information') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{$customer->name}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('document') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-document">{{ __('Document') }}</label>
                                    <input type="text" name="document" id="input-document" class="form-control form-control-alternative{{ $errors->has('document') ? ' is-invalid' : '' }}" placeholder="{{ __('Document (6 to 12 characters required
)') }}" value="{{$customer->document}}" required>

                                    @if ($errors->has('document'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('document') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-document">{{ __('Status') }}</label>
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="status" class="custom-control-input" id="status-new" {{$customer->status=='new'?'checked':''}} type="radio" value="new">
                                            <label class="custom-control-label" for="status-new">New</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="status" class="custom-control-input" id="status-active" {{$customer->status=='active'?'checked':''}} type="radio" value="active">
                                            <label class="custom-control-label" for="status-active">Active</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="status" class="custom-control-input" id="status-suspended" {{$customer->status=='suspended'?'checked':''}} type="radio" value="suspended">
                                            <label class="custom-control-label" for="status-suspended">Suspended</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3">
                                            <input name="status" class="custom-control-input" id="status-cancelled" {{$customer->status=='cancelled'?'checked':''}} type="radio" value="cancelled">
                                            <label class="custom-control-label" for="status-cancelled">Cancelled</label>
                                        </div>
                                    </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
