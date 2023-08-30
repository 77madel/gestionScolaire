




     <form  wire:submit.prevent="store" method="POST" class="px-3">
        @csrf

        @if(Session::has("error"))
            <div p-5>
                <div class="border-danger bg-danger text-white">{{ Session::get("error") }}</div>
            </div>
        @endif

        <div class="form-group">
            <label>{{ __('Libelle Annee Scolaire') }} <span class="login-danger">*</span></label>
            <input class="form-control @error("libelle")
            border-danger bg-danger
            @enderror" type="text" wire:model='libelle' autofocus>
            @error("libelle")
                <div class="mt-1 text-danger">* Le champs libelle est requis</div>
            @enderror
        </div><br>


        <div class="mb-2 text-center">
            <a type="button" href="{{ route("settings") }}" class="btn rounded-pill btn-danger">
                Annuler
            </a>

            <button class="btn rounded-pill btn-primary" type="submit">
                Ajouter
            </button>
        </div>
    </form>






{{-- <div>
    <div wire:ignore.self id="addSchoolYear" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <div class="auth-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-lg">
                                    <img src="{{asset ("img/logo.png") }}" alt="" height="42">
                                </span>
                            </a>
                        </div>
                    </div>
                    <form  wire:submit.prevent="store" class="px-3">

                        <div class="form-group">
                            <label>{{ __('Libelle Annee Scolaire') }} <span class="login-danger">*</span></label>
                            <input class="form-control" type="text" wire:model='libelle' autofocus required>

                        </div><br>


                        <div class="mb-2 text-center">
                            <button class="btn rounded-pill btn-danger" data-bs-dismiss="modal">
                                Annuler
                            </button>

                            <button class="btn rounded-pill btn-primary" type="submit">
                                Ajouter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div> --}}
