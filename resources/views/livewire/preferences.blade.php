<div>
@if($showPreferences)
<div class="card card-profile shadow">
    <div class="card-body pt-0 pt-md-4">
        <div class="row">
            <div class="col">
                <a wire:click="closePreferences()" class="btn btn-sm btn-secondary float-right">{{ __('Close') }}</a>
                @if($updateMode)
                    @include('livewire.edit_preference')
                @else
                    @include('livewire.create_preference')
                @endif
                <!-- start table -->
                <div class="card border-0">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Preferences</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Name</th>
                                    <th scope="col" class="sort" data-sort="value">Value</th>
                                    <th scope="col" class="sort">Actions</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <!-- foreach table -->
                                @foreach($preferences as $preference)
                                <tr>
                                    <td class="name">
                                        <span class="mb-0 text-sm">{{$preference->name}}</span>
                                    </td>
                                    <td class="value">
                                        <span class="mb-0 text-sm">{{$preference->value}}</span>
                                    </td>
                                    <td class="text-right">
                                        <button wire:click="edit({{ $preference->id }})" class="btn btn-info btn-sm">Edit</button>
                                        <button wire:click="delete({{ $preference->id }})" class="btn btn-warning btn-sm">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end table -->
            </div>
        </div>
    </div>
</div>
@endif
</div>