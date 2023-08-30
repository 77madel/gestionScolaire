<div wire:ignore.self id="elleveadd" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <input
                            class="form-control @error('matricule')
                        border-danger bg-danger
                        @enderror"
                            type="text" wire:model='matricule' autofocus>
                        @error('matricule')
                            <div class="mt-1 text-danger">* Le champs matricule est requis</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Nom') }} <span class="login-danger">*</span></label>
                        <input
                            class="form-control @error('nom')
                        border-danger bg-danger
                        @enderror"
                            type="text" wire:model='nom' autofocus>
                        @error('nom')
                            <div class="mt-1 text-danger">* Le champs nom est requis</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Prenom') }} <span class="login-danger">*</span></label>
                        <input
                            class="form-control @error('prenom')
                        border-danger bg-danger
                        @enderror"
                            type="text" wire:model='prenom' autofocus>
                        @error('prenom')
                            <div class="mt-1 text-danger">* Le champs prenom est requis</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Date Naissance') }} <span class="login-danger">*</span></label>
                        <input
                            class="form-control @error('naissance')
                        border-danger bg-danger
                        @enderror"
                            type="date" wire:model='naissance' autofocus>
                        @error('naissance')
                            <div class="mt-1 text-danger">* Le champs naissance est requis</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Contact Parent') }} <span class="login-danger">*</span></label>
                        <input
                            class="form-control @error('contact_parent')
                        border-danger bg-danger
                        @enderror"
                            type="text" wire:model='contact_parent' autofocus>
                        @error('contact_parent')
                            <div class="mt-1 text-danger">* Le champs contact_parent est requis</div>
                        @enderror
                    </div>



                    {{-- <div class="form-group">
                        <label>{{ __('Niveau') }} <span class="login-danger">*</span></label>
                        <select class="form-control @error('level_id')
                        border-danger bg-danger
                        @enderror" name="level_id" wire:model='level_id'>
                            @foreach ($currentLevels as $item)
                            <option value="">-- Choisissez un niveau --</option>
                            <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                            @endforeach
                        </select>
                        @error('level_id')
                            <div class="mt-1 text-danger">* Le niveau est requis</div>
                        @enderror
                    </div> --}}

                    <div class="mb-2 text-center">
                        <button class="btn rounded-pill btn-primary" type="submit">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="button-list">
