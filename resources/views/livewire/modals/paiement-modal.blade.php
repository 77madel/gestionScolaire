<div wire:ignore.self id="paiementadd" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <div class="auth-logo">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-lg">
                                <img src="assets/img/logo.png" alt="" height="42">
                            </span>
                        </a>
                    </div>
                </div>
                <form wire:submit.prevent='store' class="px-3">


                    <div class="form-group">
                        <label>{{ __('Matricule') }} <span class="login-danger">*</span></label>
                        <input class="form-control @error('matricule') border-danger bg-danger
                        @enderror"
                            type="text" wire:model='matricule' name="matricule" autofocus>
                        @error('matricule')
                            <div class="mt-1 text-danger">* Le champs matricule est requis</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Eleve') }} <span class="login-danger">*</span></label>
                        <input class="form-control" wire:model='fullname' readonly>
                    </div>



                    <div class="form-group">
                        <label>{{ __('Montant') }} <span class="login-danger">*</span></label>
                        <input class="form-control @error('montant') border-danger bg-danger
                        @enderror"
                            type="text" wire:model='montant' name="montant" autofocus>
                        @error('montant')
                            <div class="mt-1 text-danger">* Le champs montant est requis</div>
                        @enderror
                    </div>


                    {{-- <div class="form-group">
                        <label>{{ __('Choix du niveau') }} <span class="login-danger">*</span></label>
                        <select class="form-control @error("level_id")
                        border-danger bg-danger
                        @enderror" name="level_id" wire:model='level_id'>
                            <option value="">-- Choisissez un niveau --</option>
                            @foreach ($levels as $level )
                            <option value="{{ $level->id }}">{{ $level->libelle }}</option>
                            @endforeach
                        </select>
                        @error("level_id")
                            <div class="mt-1 text-danger">* Le niveau est requis</div>
                        @enderror
                    </div> --}}

                    {{-- <div class="form-group">
                        <label>{{ __('Selectionner la classe') }} <span class="login-danger">*</span></label>
                        <select class="form-control @error("classe_id")
                        border-danger bg-danger
                        @enderror" name="classe_id" wire:model='classe_id'>
                            <option value="">-- Choisissez un niveau --</option>
                            @foreach ($classes as $classe )
                            <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                            @endforeach
                        </select>
                        @error("classe_id")
                            <div class="mt-1 text-danger">* Le classe est requis</div>
                        @enderror
                    </div> --}}

                    <div class="mb-2 text-center">
                        <button class="btn rounded-pill btn-primary" type="submit">Payer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



{{-- Modal edit Classe --}}

 {{-- <div wire:ignore.self id="editeleve" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <div class="auth-logo">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-lg">
                                <img src="assets/img/logo.png" alt="" height="42">
                            </span>
                        </a>
                    </div>
                </div>
                <form wire:submit.prevent='updateInscri' class="px-3">


                    <div class="form-group">
                        <label>{{ __('Matricule') }} </label>
                        <input class="form-control" type="text" wire:model='matricule' name="matricule" autofocus>
                    </div>

                    <div class="form-group">
                        <label>{{ __('Nom Complet') }} <span class="login-danger">*</span></label>
                        <input class="form-control" wire:model='fullname' readonly>
                    </div>

                    <div class="form-group">
                        <label>{{ __('Choix du niveau') }}</label>
                        <select class="form-control" name="level_id" wire:model='level_id'>
                            @foreach ($levels as $level )
                            <option value="{{ $level->id }}">{{ $level->libelle }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>{{ __('Selectionner la classe') }} <span class="login-danger">*</span></label>
                        <select class="form-control @error("classe_id")
                        border-danger bg-danger
                        @enderror" name="classe_id" wire:model='classe_id'>
                            @foreach ($classes as $classe )
                            <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                            @endforeach
                        </select>
                        @error("classe_id")
                            <div class="mt-1 text-danger">* Le classe est requis</div>
                        @enderror
                    </div>

                    <div class="mb-2 text-center">
                        <button class="btn rounded-pill btn-primary" type="submit">Mettre a jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
