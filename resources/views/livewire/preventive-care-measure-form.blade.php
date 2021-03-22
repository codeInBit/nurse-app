<div>
    <form> 
        <div class="card-header">
            <div class="form-group row">
                <label for="activePatient" class="col-sm-5 col-form-label col-form-label-lg">{{ __('Preventive Care Measures') }} for  Patient</label>
                <div class="col-sm-5">
                    <select wire:model="activePatient" class="form-control" id="activePatient" name="activePatient">
                        @forelse ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @empty
                            <option>N/A</option>
                        @endforelse

                    </select>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col col-sm-3 border-right">
                    <ul class="nav nav-pills flex-column nav-fill p-3">
                        @forelse ($preventiveCareMeasures as $preventiveCareMeasure)
                            <li class="nav-item">
                                <a wire:click.prevent="clickPreventiveCareMeasure('{{ $preventiveCareMeasure->id }}')" class="nav-link @if ($activePreventiveCareMeasure->id == $preventiveCareMeasure->id) active @endif button" id="{{ $preventiveCareMeasure->slug }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $preventiveCareMeasure->slug }}"
                                        type="button" role="tab" aria-controls="{{ $preventiveCareMeasure->slug }}" aria-selected="true">
                                    {{ $preventiveCareMeasure->name }}
                                </a>
                            </li>
                        @empty
                            <p>Preventive Care Measure N/A</p>
                        @endforelse
                    </ul>
                </div>
                <div class="col col-sm-4">
                    <div class="tab-content p-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="d-flex flex-column">
                                <h4>{{ $activePreventiveCareMeasure->name }}</h4>
                                <p class="fs-6">Frequency: {{ $activePreventiveCareMeasure->frequency }}</p>
    
                                <div class="mt-4">
                                    <h5 class="fs-6">Status:</h5>
                                    @forelse ($statuses as $status)
                                        <div class="form-check @if ($loop->first) mt-4 @endif">
                                            <input wire:model="status" class="form-check-input" type="radio" name="status"
                                                id="{{ $status->id }}" value="{{ $status->id }}"
                                                    @if ($activeStatus == $status->id) checked @endif
                                                >
                                            <label class="form-check-label" for="{{ $status->id }}">
                                                {{ $status->name }}
                                            </label>
                                        </div>
                                    @empty
                                        <p>Status N/A</p>
                                    @endforelse
                                </div>
    
                            </div>
                        </div>
                    </div>
                    <div class="mt-12">
                        <button wire:click.prevent="cancel()" type="submit" class="btn btn-outline-secondary mb-2">Clear Form</button>
                    </div>
                </div>
                @if (count($reasons))
                    <div class="col col-sm-5 border-left">
                        <div class="d-flex flex-column p-5 mt-6">
                            <h5 class="fs-6">Reasons:</h5>
                            @forelse ($reasons as $reason)
                                <div class="form-check mt-2">
                                    <input wire:model="reason" class="form-check-input" type="radio" name="main_reason[]" id="{{ $reason->id }}" value="{{ $reason->id }}">
                                    <label class="form-check-label" for="{{ $reason->id }}">
                                            {{ $reason->title }}
                                    </label>
                                    @if ($reason->title_field)
                                        @foreach ($reason->title_field as $item)
                                            <div class="row mt-6 col-4 mb-2">
                                                <div class="mb-1">
                                                    <input type="text" class="btn-check" id="btncheck1" name="main_reason[]" placeholder={{ $item }}>
                                                </div>
                                            </div>                                            
                                        @endforeach
                                    @endif
                                </div>
                            @empty
                                
                            @endforelse
                        </div>
                    </div>
                @endif
                
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button wire:click.prevent="saveNote()" type="submit" class="btn btn-success mb-2">Save Note</button>
                </div>
            </div>
        </div>
    </form>
</div>