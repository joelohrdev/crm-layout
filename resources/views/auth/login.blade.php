<x-guest-layout>
    <div class="min-h-full flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <img class="h-12 w-auto" src="/images/tkd-logo-dark.svg" alt="TKD Logo">
                </div>

                <div class="mt-8">

                    <div class="mt-6">
                        <x-jet-validation-errors class="mb-4" />
                        <form action="{{ route('login') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700"> Email address </label>
                                    <div class="mt-1">
                                        <input id="email" name="email" type="email" :value="old('email')" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-slate-500 focus:border-slate-500 sm:text-sm">
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                                    <div class="mt-1">
                                        <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-slate-500 focus:border-slate-500 sm:text-sm">
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-slate-600 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block relative w-0 flex-1">
                <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80" alt="">
            </div>
        </div>
</x-guest-layout>
