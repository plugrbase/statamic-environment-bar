@extends('statamic::layout')
@section('title', 'Socialize Settings')

@section('content')
    <publish-form
        title="Environment Bar Settings"
        action="{{ cp_route('plugrbase.envbar.settings.update') }}"
        method="put"
        :blueprint='@json($blueprint)'
        :meta='@json($meta)'
        :values='@json($values)'
    ></publish-form>
@endsection