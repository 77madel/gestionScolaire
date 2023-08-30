<div>

    @include('livewire.modals.class-add-modal')

    <div>
        <div class="col-lg-12">
            <div class="card">
               <div class=" d-flex justify-content-between align-items-center card-header ">
                  <h5 class="card-title">
                    <input class="form-control" placeholder="Rechercher" wire:model='search'>
                    </h5>
                    <button type="button" class="btn btn-info mt-1" data-bs-toggle="modal" data-bs-target="#login-modal">Log In Modal</button>
               </div>

               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>Libelle</th>
                              <th>Niveaux</th>
                              <th>Montant Scolarite</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                            @forelse ($classes as $classe)
                                <tr>
                                    <td>{{ $classe->libelle}}</td>
                                    <td>{{ $classe->level->libelle}}</td>
                                    <td>{{ $classe->level->scolarite}} Fcfa</td>
                                    <td>
                                        <button wire:click='editclasse({{ $classe->id }})' type="button" class="btn btn-outline-info mt-1" data-bs-toggle="modal" data-bs-target="#editclasse"><i class='fas fa-edit'></i></button>

                                        <div wire:click='deleteClasse({{ $classe->id }})' class="btn btn-outline-danger"><i class="fas fa-trash"></i></div>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="justify-center">
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
                            {{ $classes ->links() }}
                        </div>

                  </div>
               </div>
            </div>
         </div>
    </div>


</div>
