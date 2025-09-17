<x-guest-layout>

    @section('login')
    <x-validation-errors class="mb-4" />

    @session('status')
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ $value }}
    </div>
    @endsession

    <div class="background-image"></div>
    <div class="login-box">

        <a href="/"><h2>Welcome to Angola</h2></a> 
        <p>Faça login para continuar sua viagem</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <x-input type="email" id="email" name="email" placeholder="seu.email@exemplo.com"
                    :value="old('email')" required autofocus autocomplete="username" />
            </div>
            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="password" id="password" name="password" required placeholder="********" autocomplete="current-password">
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>

        <a class="link-esqueci-senha" href="{{ route('register') }}">
            {{ __('Create profile?') }}
        </a>


    </div>


    @endsection




</x-guest-layout>