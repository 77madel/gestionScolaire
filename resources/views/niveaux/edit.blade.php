@extends("layouts.master")

@section("contenu")
    @livewire('editlevel', ['level' => $level])
@endsection
