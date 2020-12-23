@extends('layouts.app')

@section('title', 'Plugin home')

@section('content')
    <div class="container content" id="plugin--flyff">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table" data-aos="fade-up">
                        <thead>
                        <tr>
                            <th scope="col">Account Name</th>
                            <th scope="col">Role</th>
                            <th scope="col"># of characters</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($user->accounts as $item)
                            <tr>
                                <td>{{$item->account}}</td>
                                <td>{{$item->member}}</td>
                                <td>{{$item->characters()->count()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="500">
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-header">Create a game account</div>
                    <div class="card-body">
                        <form action="{{route('flyff.accounts.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Account Name</label>
                                <input type="text" name="account"
                                       class="form-control @error('account') is-invalid @enderror"
                                       id="exampleInputEmail1">
                                @error('account')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="exampleInputPassword1">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">{{ trans('auth.confirm-password') }}</label>
                                <input id="password-confirm" type="password"
                                       class="form-control @error('password_confirmation') is-invalid @enderror"
                                       name="password_confirmation" required autocomplete="new-password">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
