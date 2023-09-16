<div>

    @include('livewire.modals.inscription-modal')

    <div>
        <div class="col-lg-12">
            <div class="card">
                <div class=" d-flex justify-content-between align-items-center card-header ">
                    <h5 class="d-flex justify card-title ">
                        <input class="form-control" placeholder="Rechercher" wire:model='search'>
                    </h5>

                    <div class="form-group col-3 mt-3">
                        <select class="form-control" name="classe_id" wire:model='classe_id'>
                            <option value="">-- Filtrez par classe --</option>
                            @foreach ($classelist as $classe )
                            <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="button" class="btn btn-info mt-1 text-white" data-bs-toggle="modal"
                        data-bs-target="#inscriadd">Inscription</button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Niveau</th>
                                    <th>Classe</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($inscriptions as $inscription)
                                    <tr>
                                        <td>{{ $inscription->student->matricule }}</td>
                                        <td>{{ $inscription->student->nom }}</td>
                                        <td>{{ $inscription->student->prenom }}</td>
                                        <td>{{ $inscription->classe->level->libelle }}</td>
                                        <td>{{ $inscription->classe->libelle }}</td>

                                        <td>
                                            <button wire:click='editEleve({{ $inscription->id }})' type="button"
                                                class="btn btn-outline-info mt-1" data-bs-toggle="modal"
                                                data-bs-target="#editeleve"><i class='fas fa-edit'></i></button>

                                            <div wire:click='deleteClasse({{ $inscription->id }})'
                                                class="btn btn-outline-danger"><i class="fas fa-trash"></i></div>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="justify-center">
                                            <p class="flex justify-center content-center p-4">
                                                <img src="{{ asset('storage/empty.svg') }}" alt=""
                                                    height="100" width="100">
                                            <div>Aucun element</div>
                                            </p>

                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                        <div class="float-left">
                            {{ $inscriptions->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
