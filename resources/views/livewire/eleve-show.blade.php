<div>

     @include('livewire.modals.student-modals')

    <div>
        <div class="col-lg-12">
            <div class="card">
               <div class=" d-flex justify-content-between align-items-center card-header ">
                  <h5 class="card-title">
                    <input class="form-control" placeholder="Rechercher" wire:model='search'>
                    </h5>
                     <button type="button" class="btn btn-info mt-1 text-white" data-bs-toggle="modal" data-bs-target="#elleveadd">Ajouer un eleve</button>
               </div>

               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>Matricule</th>
                              <th>Nom</th>
                              <th>Prenom</th>
                              <th>Date de Naissance</th>
                              <th>Contact Parent</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                            @forelse ($eleves as $eleve)
                                <tr>
                                    <td>{{ $eleve->matricule}}</td>
                                    <td>{{ $eleve->nom}}</td>
                                    <td>{{ $eleve->prenom}}</td>
                                    <td>{{ $eleve->naissance}}</td>
                                    <td>{{ $eleve->contact_parent}}</td>
                                    <td>
                                        <button wire:click='editclasse({{ $eleve->id }})' type="button" class="btn btn-outline-info mt-1" data-bs-toggle="modal" data-bs-target="#editclasse"><i class='fas fa-edit'></i></button>

                                        <div wire:click='deleteClasse({{ $eleve->id }})' class="btn btn-outline-danger"><i class="fas fa-trash"></i></div>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="justify-center">
                                        <p class="flex justify-center content-center p-4">
                                            <img src="{{ asset('storage/empty.svg') }}" alt="" height="100" width="100">
                                            <div>Aucun element</div>
                                        </p>

                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                     </table>

                        <div class="float-left">
                            {{ $eleves ->links() }}
                        </div>

                  </div>
               </div>
            </div>
         </div>
    </div>


</div>
