<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" value="E-mail" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Senha" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                    name="remember"
                >

                <span class="ms-2 text-sm text-gray-600">
                    Lembrar de mim
                </span>
            </label>
        </div>

        <div class="mt-6 flex flex-col gap-4">
            <button
                type="submit"
                class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-700 !text-white font-semibold px-4 py-2 rounded shadow"
            >
                Entrar
            </button>

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 text-sm">
                @if (Route::has('password.request'))
                    <a
                        class="text-gray-600 hover:text-blue-700 underline"
                        href="{{ route('password.request') }}"
                    >
                        Esqueceu sua senha?
                    </a>
                @endif

                <a
                    class="text-gray-600 hover:text-blue-700 underline"
                    href="{{ route('register') }}"
                >
                    Ainda não tem conta? Cadastre-se
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>