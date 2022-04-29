@extends('layouts.app') 
 @section('content')
        <div class="card text-center"style="margin-top:80px;">
             <header class="card-header bg-primary text-white">
                 <h6>user profile</h6>
             </header>
          <div class="card-body">
              <form action="{{url('update-profile')}}" method="post"> 
                @csrf
                @method('PUT')
            <div class="row">
                <div class="login-box pt-3">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row mb-3">
                    <label for="Name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                    <div class="col-md-6">
                        <input id="firstname" type="text" class="form-control @error('first Name') is-invalid @enderror"
                            name="firstname" value="{{ $user->name }}" 
                            autofocus>

                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                    <div class="col-md-6">
                        <input id="lastname" type="text" class="form-control @error('Last Name') is-invalid @enderror"
                            name="lastname" value="{{ $user->lastname }}"  
                            autofocus>

                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $user->email}}" >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                            name="address1" value="{{$user->address }}"  >


                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="address2" class="col-md-4 col-form-label text-md-end">Address2 (optional)</label>

                    <div class="col-md-6">
                        <input id="address2" type="text" class="form-control @error('address') is-invalid @enderror"
                            name="address2" value="{{ $user->address2 }}"  >


                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="city"class="col-md-4 col-form-label text-md-end">{{__('City')}}</label>
                    <div class="col-md-6">
                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                        name="city" value="{{ $user->city }}"  >


                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="state"class="col-md-4 col-form-label text-md-end">{{__('State')}}</label>
                    <div class="col-md-6">
                        <input id="state" type="text" class="form-control @error('State') is-invalid @enderror"
                        name="state" value="{{ $user->state }}" >


                    @error('State')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="country"class="col-md-4 col-form-label text-md-end">{{__('Country')}}</label>
                    <div class="col-md-6">
                        <input id="country" type="text" class="form-control @error('Country') is-invalid @enderror"
                        name="country" value="{{ $user->country }}"  autofocus="country" autofocus>


                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="dob" class="col-md-4 col-form-label text-md-end">Date of birth</label>
                    <div class="col-md-6">
                        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob"
                            value="{{$user->dob }}"  >


                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-form-label text-md-end">Phone Number</label>

                    <div class="col-md-6">
                        <input id="phone" type="tel" class="form-control @error('dob') is-invalid @enderror"
                            name="phone" value="{{$user->phone}}"  >


                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>






               

                <div class="row mb-3">
                    <label for="password"
                        class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password"
                            value="{{Auth::user()->password}}">
                    </div>
                </div>
<button type="submit"class="btn btn-primary ">Update</button>


               {{-- <footer class="card-footer bg-primary"></footer> --}}
            </div> 
        </form>
          </div>
        </div>
 @endsection