<div>





    <form  wire:submit.prevent="store" method="POST" class="px-3">
        @csrf

        @if(Session::has("success"))
            <div p-5>
                <div class="border-danger bg-danger text-white">{{ Session::get("success") }}</div>
            </div>
        @endif

        <div class="form-group">
            <label>{{ __('code') }} <span class="login-danger">*</span></label>
            <input class="form-control @error("code")
            border-danger bg-danger
            @enderror" type="text" wire:model='code' autofocus>
            @error("code")
                <div class="mt-1 text-danger">{{ $message }}</div>
            @enderror
        </div>

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
            <label>{{ __('Montant Scolarite') }} <span class="login-danger">*</span></label>
            <input class="form-control @error("scolarite")
            border-danger bg-danger
            @enderror" type="number" wire:model='scolarite' autofocus>
            @error("scolarite")
                <div class="mt-1 text-danger">* Le champs scolarite est requis</div>
            @enderror
        </div>
        <br>


        <div class="mb-2 text-center">
            <a type="button" href="{{ route("niveaux.list") }}" class="btn rounded-pill btn-danger">
                Annuler
            </a>

            <button class="btn rounded-pill btn-primary" type="submit">
                Ajouter
            </button>
        </div>
    </form>

</div>
