<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center text-xl font-bold">Register</h1>
            <form method="POST" action="/register">
                @csrf
                <x-form.input name="name"/>
                <x-form.input name="username"/>
                <x-form.input name="password" type="password"/>
                <x-form.input name="email" type="email"/>
                <x-form.button>register</x-form.button>

            </form>
        </main>
    </section>

</x-layout>
