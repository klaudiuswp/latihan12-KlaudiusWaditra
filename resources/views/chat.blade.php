@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Chat') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container" id="app">
                            <p class="text-center p-0 m-0">Laravel Application</p>
                            <h1 class="text-center p-0 m-0">Gemini AI Chat</h1>
                            <div class="card mt-4">
                                <div class="card-header p-2">
                                    Chat guru mtk
                                    {{-- <form>
                                        <div class="col-lg-2 col-md-3 col-sm-12 mt-2 p-0">
                                            <label>Name</label>
                                            <input class="form-control form-control-sm" placeholder="Name" v-model="name">
                                        </div>
                                        <div class="col-lg-1 col-md-2 col-sm-12 mt-2 p-0">
                                            <button v-if="connected === false" v-on:click="connect()" type="button"
                                                class="mr-2 btn btn-sm btn-primary w-100">
                                                Connect
                                            </button>
                                            <button v-if="connected === true" v-on:click="disconnect()" type="button"
                                                class="mr-2 btn btn-sm btn-danger w-100">
                                                Disconnect
                                            </button>
                                        </div>
                                    </form> --}}
                                    {{-- <div>
                                        <p>Channels current state is @{{ state }}</p>
                                    </div> --}}
                                </div>
                                <div v-if="connected === true" class="card-body">

                                    <div class="col-12 bg-light pt-2 pb-2 mt-3">
                                        <p class="p-0 m-0 ps-2 pe-2" v-for="(message, index) in incomingMessages">
                                            {{-- (@{{ message.time }}) <b>@{{ message.name }}</b> --}}
                                            {{-- @if (session['response']) --}}
                                            <b>Gemini AI</b>
                                            @if (session()->has('response'))
                                                {!! Str::markdown(session('response')) !!}
                                            @endif

                                        </p>
                                    </div>

                                    <h4 class="mt-4">Message</h4>
                                    <form action="chat" method="POST">
                                        @csrf
                                        <div class="row mt-2">
                                            {{-- <div class="col-12 text-white" v-show="formError === true">
                                                <div class="bg-danger p-2 mb-2">
                                                    <p class="p-0 m-0"><b>Error:</b> Invalid message.</p>
                                                </div>
                                            </div> --}}
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea name="message" placeholder="Masukkan perintah disini..." class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row text-right mt-2">
                                            <div class="col-lg-10">

                                            </div>
                                            <div class="col-lg-2">
                                                <button type="submit" v-on:click="sendMessage()"
                                                    class="btn btn-primary w-100">Kirim</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
