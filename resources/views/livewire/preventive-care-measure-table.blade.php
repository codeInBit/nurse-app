<div>
    <div class="card-header">{{ __('Preventive Care Measures') }}</div>
    <div class="card-body">
        <div>
            <div class="row mb-4">
                <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="float-left mt-5">
                    @if($updateMode)
                        @include('includes.update')
                    @else
                        @include('includes.create')
                    @endif
                </div>
                <div class="float-right mt-5">
                    <input wire:model="search" class="form-control" type="text" placeholder="Search Preventive Care Measure...">
                </div>
                </div>
            </div>

            <div class="row">
                <div class="table-responsive">
                    @if ($preventiveCareMeasures->count())
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <a role="button">
                                            Name
                                        </a>
                                    </th>
                                    <th>
                                        Edit
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($preventiveCareMeasures as $preventiveCareMeasure)
                                    <tr>
                                        <td>{{ $preventiveCareMeasure->name }}</td>
                                        <td>
                                            <button wire:click="edit('{{ $preventiveCareMeasure->id }}')" class="btn btn-sm btn-primary">
                                            Edit
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning">
                            Go ahead and create a preventive care measure!
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col">
                    {{ $preventiveCareMeasures->links() }}
                </div>
            </div>
        </div>
    </div>
</div>