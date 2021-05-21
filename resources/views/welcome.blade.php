@extends('layouts.main')

@section('content')
        <div class="conteiner-fluid p-0 mt-3 mb-2  bg-dark  text-white w-100 sizecont">
            <div class="d-flex justify-content-center  align-items-center bg-secondary text-white mt-4 mb-4 w-100">
                <h1 class="p-1 "> Acortador de links</h1>
            </div>
            <div class="d-flex justify-content-center  align-items-center ">
                    <form action="{{ route('short.url') }}" method="POST"  class="mt-2">
                            @csrf
                            <label for="" class="m-2">Ingresa la url que desas acortar</label><br>
                            <input type="url" name="url" id="" class="mb-2"><br>
                            <button type="submit" class="btn btn-primary mb-3">acortar</button>
                    </form>
            </div>
            <div class="mb-4 d-flex flex-column text-center border-top border-secondary">
                        @if (session ('success_message'))
                            {!! session('success_message') !!}
                        @endif
            </div>
            
        </div>
@endsection
