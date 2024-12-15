<x-guest-layout>
<style>
body {
    background-color: #f0f8f0; /* Warna latar belakang lembut */
    font-family: 'Poppins', sans-serif;
    color: #333;
}

.form-container {
    background-color: #e6f2e6; /* Hijau lembut */
    border-radius: 10px;
    padding: 30px;
    max-width: 400px;
    margin: auto;
    margin-top: 50px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-container h2 {
    color: #686F4E; /* Hijau Zaitun */
    text-align: center;
    font-size: 1.5em;
    margin-bottom: 20px;
}

.form-container label {
    color: #686F4E; /* Hijau Zaitun */
    font-weight: 500;
}

.form-container input[type="email"],
.form-container input[type="password"] {
    border: 1px solid #686F4E; /* Hijau Zaitun */
    border-radius: 5px;
    padding: 10px;
    width: 100%;
    margin-top: 5px;
    margin-bottom: 15px;
}

.form-container input[type="checkbox"] {
    accent-color: #686F4E; /* Hijau Zaitun */
}

.form-container .text-link {
    color: #686F4E; /* Hijau Zaitun */
    text-decoration: none;
}

.form-container .text-link:hover {
    text-decoration: underline;
}

.form-container button {
    background-color: #686F4E; /* Hijau Zaitun */
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px;
    width: 100%;
    font-weight: 600;
    cursor: pointer;
}

.form-container button:hover {
    background-color: #5a6239; /* Hijau Zaitun Gelap */
}
</style>

    <div class="form-container">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <h2>Log In to LumiSkin</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="text-link" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
