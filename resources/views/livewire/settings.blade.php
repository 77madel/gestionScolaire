<div>
    <div class="col-lg-12">
        <div class="card">
           <div class=" d-flex justify-content-between align-items-center card-header ">
              <h5 class="card-title">
                <input class="form-control" placeholder="Rechercher" wire:model='search'>
                </h5>
              <a  href="{{ route("settings.create_school_year") }}" type="button" class="btn btn-info mt-1 text-white"
              >Nouvelle Annee-Scolaire</a>
           </div>
           @if(Session::has("success"))
                <div p-5>
                    <div class="border-success text-white">{{ Session::get("success") }}</div>
                </div>
          @endif
           <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-striped mb-0">
                    <thead>
                       <tr>
                          <th>Annee-Scolaire</th>
                          <th>Statut</th>
                          <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                        @forelse ($schoolYearList as $schoolYear)
                            <tr>
                                <td>{{ $schoolYear->school_year}}</td>
                                <td>
                                    @if ($schoolYear->active >= 1)
                                        <span class="p-2 bg-success rounded text-white">Actif</span>
                                    @else
                                    <span class="p-2 bg-danger rounded text-white">Inactif</span>
                                    @endif
                                </td>
                                <td>
                                        <button class="  {{ $schoolYear->active == 1 ? 'btn btn-danger' : 'btn btn-success'  }} rounded text-white text-sm-start" wire:click='toggleStatut({{ $schoolYear->id }})'>{{  $schoolYear->active == 1 ? 'Rende Inactif': 'Rende Actif' }}</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="justify-center">
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
                        {{ $schoolYearList->links() }}
                    </div>

              </div>
           </div>
        </div>
     </div>
</div>
