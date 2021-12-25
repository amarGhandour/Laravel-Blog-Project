@if(session()->has('success'))
    <div x-data="{show : true}"
         x-init="setTimeout(function () { show = false }, 4000)"
         x-show="show"
         class="bg-blue-500 fixed right-0 rounded-xl text-white text-sm bottom-3 right-4 px-4 py-2">
        <p> {{ session('success') }} </p>
    </div>
@endif
