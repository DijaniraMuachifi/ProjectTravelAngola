<x-guest-layout>



    @section('login')
    <x-validation-errors class="mb-4" />

    <div class="background-image"></div>
    <div class="login-box">
      <a href="/"><h2>Welcome to Angola</h2></a> 
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input-group">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="input-group">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                </div>
                <div class="col">
                    <div class="input-group">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-login">Register</button>

              <a class="link-esqueci-senha" href="{{ route('login') }}">
        {{ __('Already registered?') }}
    </a>
    </div>
     
    </form>
 
    </div>



    @endsection


</x-guest-layout>