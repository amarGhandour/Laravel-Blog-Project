<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center text-xl font-bold">Sign In</h1>
            <form method="POST" action="/login">
                @csrf

                <x-form.input name="email" type="email"/>
                <x-form.input name="password" type="password"/>
                <x-form.button>sign in</x-form.button>

            </form>
        </main>
    </section>
</x-layout>
