<div>
    <div class="col-lg-12">
        <div class="card">
           <div class=" d-flex justify-content-between align-items-center card-header ">
              <h5 class="card-title">
                <input class="form-control" placeholder="Rechercher" wire:model='search'>
                </h5>
              <a  href="{{ route("settings.create_levels") }}" type="button" class="btn btn-info mt-1 text-white"
              >Ajouter niveau</a>
           </div>
           @if(Session::has("success"))
                <div p-5>
                    <div class="border-success text-white">{{ Session::get("success") }}</div>
                </div>
          @endif
           <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-striped">
                    <thead>
                       <tr>
                          <th>Code</th>
                          <th>Libelle</th>
                          <th>Montant Scolarite</th>
                          <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                        @forelse ($levels as $level)
                            <tr>
                                <td>{{ $level->code}}</td>
                                <td>{{ $level->libelle}}</td>
                                <td>{{ $level->scolarite}}</td>
                                <td>
                                    <a  href="{{ route('settings.edit_level', $level->id) }}" class="btn btn-outline-info"> <i class="fas fa-edit"></i> </a>

                                    <div wire:click='delete({{ $level->id }})' class="btn btn-outline-danger"><i class="fas fa-trash"></i></div>

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
                        {{ $levels ->links() }}
                    </div>

              </div>
           </div>
        </div>
     </div>
</div>

