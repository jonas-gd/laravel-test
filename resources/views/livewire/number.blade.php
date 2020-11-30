<div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Customer numbers') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

<div>
    @if($updateMode)
        @include('livewire.edit')
    @else
        @include('livewire.create')
    @endif

    <div class="row">
        <div class="col">
            <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Customer numbers</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                    <th scope="col" class="sort" data-sort="id">ID</th>
                    <th scope="col" class="sort" data-sort="number">Number</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col" class="sort">Actions</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="list">
                @foreach($numbers as $number)
                    <tr>
                        <td class="id">
                            {{$number->id}}
                        </td>
                        <td class="number">
                            <span class="mb-0 text-sm">{{$number->number}}</span>
                        </td>
                        <td>
                            <span class="badge badge-dot mr-4 number-status">
                                @switch($number->status)
                                    @case('active')
                                    <i class="bg-success"></i>
                                    @break
                                    @case('inactive')
                                    <i class="bg-warning"></i>
                                    @break
                                    @case('cancelled')
                                    <i class="bg-danger"></i>
                                    @break
                                @endswitch
                            <span class="status">{{$number->status}}</span>
                            </span>
                        </td>
                        <td class="text-right">
                            <button wire:click="showPreferences({{ $number->id }})" class="btn btn-secondary btn-sm">Preferences</button>
                            <button wire:click="edit({{ $number->id }})" class="btn btn-info btn-sm">Edit</button>
                            <button wire:click="delete({{ $number->id }})" class="btn btn-warning btn-sm">Delete</button>
                        </td>
                    </tr>
                 @endforeach
                </tbody>
                </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
                </div>
            </div>
        </div>
    </div>
</div>
