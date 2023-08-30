<div wire:ignore.self id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <label>{{ __('libelle') }} <span class="login-danger">*</span></label>
                        <input class="form-control @error("lebelle")
                        border-danger bg-danger
                        @enderror" type="text" wire:model='libelle' autofocus>
                        @error("libelle")
                            <div class="mt-1 text-danger">* Le champs libelle est requis</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Niveau') }} <span class="login-danger">*</span></label>
                        <select class="form-control @error("level_id")
                        border-danger bg-danger
                        @enderror" name="level_id" wire:model='level_id'>
                            @foreach ($currentLevels as $item )
                            <option value="">-- Choisissez un niveau --</option>
                            <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                            @endforeach
                        </select>
                        @error("level_id")
                            <div class="mt-1 text-danger">* Le niveau est requis</div>
                        @enderror
                    </div>

                    <div class="mb-2 text-center">
                        <button class="btn rounded-pill btn-primary" type="submit">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="button-list">


{{-- 
 Modal edit Classe --}}

<div wire:ignore.self id="editclasse" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form wire:submit.prevent='updateClasse' class="px-3">

                    <div class="form-group">
                        <label>{{ __('libelle') }} <span class="login-danger">*</span></label>
                        <input class="form-control @error("lebelle")
                        border-danger bg-danger
                        @enderror" type="text" wire:model='libelle' autofocus>
                        @error("libelle")
                            <div class="mt-1 text-danger">* Le champs libelle est requis</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Niveau') }} <span class="login-danger">*</span></label>
                        <select class="form-control @error("level_id")
                        border-danger bg-danger
                        @enderror" name="level_id" wire:model='level_id'>
                            @foreach ($currentLevels as $item )
                            <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                            @endforeach
                        </select>
                        @error("level_id")
                            <div class="mt-1 text-danger">* Le niveau est requis</div>
                        @enderror
                    </div>

                    <div class="mb-2 text-center">
                        <button class="btn rounded-pill btn-primary" type="submit">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="button-list">

