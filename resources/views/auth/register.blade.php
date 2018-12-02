@extends('layouts.app')

@section('content') 

<div class="container">
    <div class="columns">
        <div class="column">
            <div class="column is-one-third is-offset-one-third m-t-100">
                <div class="card">
                    <div class="card-content">
                        <h1 class="title">Join the Community</h1>
                        <form action="{{route('register')}}" method="POST" role="form">
                        {{csrf_field()}}
                        <div class="field">
                            <label for="name" class="label">Full Name</label>
                            <p class="control">
                                <input class="input {{$errors->has('name')? 'is-danger' : ''}}" type="text" name="name" id="name" placeholder="Your Name" value="{{old('name')}}" required>
                            </p>
                            @if($errors->has('name'))
                                <p class="help is-danger">{{$errors->first('name')}}</p>
                            @endif
                        </div>
                        
                        <div class="field">
                            <label for="email" class="label">Email Address</label>
                            <p class="control">
                                <input class="input {{$errors->has('email')? 'is-danger' : ''}}" type="text" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}" required>
                            </p>
                            @if($errors->has('email'))
                                <p class="help is-danger">{{$errors->first('email')}}</p>
                            @endif
                        </div>
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label for="password" class="label">Password</label>
                                    <p class="control">
                                        <input class="input {{$errors->has('password')? 'is-danger' : ''}}" type="password" name="password" id="password" required>
                                    </p>
                                    @if($errors->has('password'))
                                        <p class="help is-danger">{{$errors->first('password')}}</p>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="column">
                                <div class="field">
                                    <label for="password_confirmation" class="label">Confirm Password</label>
                                    <p class="control">
                                        <input class="input {{$errors->has('password_confirmation')? 'is-danger' : ''}}" type="password_confirmation" name="password_confirmation" id="password_confirmation" required>
                                    </p>
                                    @if($errors->has('password_confirmation'))
                                        <p class="help is-danger">{{$errors->first('password_confirmation')}}</p>
                                    @endif
                                </div>
                            </div>    
                        </div>
                            
                        <button class="button is-primary is-outlined is-fullwidth m-t-30">Register</button>
                        </form>    
                    </div> <!--End Of .card-content-->
                </div> <!--End of content-->
                     
                <h5 class="has-text-centered m-t-20">
                    <a href="{{route('login')}}" class="is-muted">Already have an Account?</a>
                </h5>
                    
            </div>
        </div>
    </div>
</div>
    
@endsection
