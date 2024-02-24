<x-layout>
    <x-card>
        <form action="/verify" method="POST" class="flex flex-col space-y-10">
            @csrf
            <div class="flex flex-col space-y-10">
                <label for="code">We sent you an email to verify the login, if you dont see it it may be in your spam folder</label>
                <input class="w-10 border-black border-r-black" type="number" maxlength="6" minlength="6" id="code" name="code">
            </div>
            <x-submit_button>
                Send
            </x-submit_button>
        </form>
    </x-card>
</x-layout>
