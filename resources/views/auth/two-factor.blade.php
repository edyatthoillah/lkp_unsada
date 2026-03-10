<x-guest-layout>
    <form action="{{ route('two-factor.verify') }}" method="post">
        @csrf
        <div>
            <x-input-label for="Code" :value="__('Two Factor Code')" />
            <p>Enter six digit code OTP from your email</p>
            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" required
                autofocus />
        </div>
         <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Verify') }}
            </x-primary-button>
        </div>
    </form>
    @if ($errors->any())
        <div class="">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach

        </div>
    @endif
</x-guest-layout>
