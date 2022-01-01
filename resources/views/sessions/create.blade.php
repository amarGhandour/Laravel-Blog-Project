<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10  ">
            <x-panel class="bg-gray-100">
                <h1 class="text-center text-xl font-bold">Sign In</h1>
                <form method="POST" action="/login">
                    @csrf

                    <x-form.input name="email" type="email" required/>
                    <x-form.input name="password" type="password" required/>
                    <x-form.button>sign in</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
