<div class="min-h-screen flex">
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-[#003DA5] via-[#0052CC] to-[#0072C6] items-center justify-center relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-white/5 rounded-full"></div>
            <div class="absolute bottom-[-15%] right-[-10%] w-[600px] h-[600px] bg-white/5 rounded-full"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] h-[300px] bg-white/3 rounded-full"></div>
        </div>

        <div class="relative z-10 text-center text-white px-12 max-w-lg">
            <img
                src="{{ url('/unesco-icon.png') }}"
                alt="UNESCO"
                class="h-28 mx-auto mb-10 drop-shadow-lg"
            >
            <h1 class="text-4xl font-bold mb-4 tracking-tight">
                UNESCO Zimbabwe
            </h1>
            <p class="text-xl text-blue-100/90 font-light leading-relaxed">
                Regional Office for Southern Africa
            </p>
            <div class="mt-10 flex items-center justify-center gap-3 text-sm text-blue-200/70">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                </svg>
                <span>Secure Admin Access</span>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center bg-gradient-to-br from-gray-50 to-white px-6 py-12 sm:px-12">
        <div class="w-full max-w-sm">
            <div class="lg:hidden flex items-center justify-center gap-3 mb-10">
                <img
                    src="{{ url('/unesco-icon.png') }}"
                    alt="UNESCO"
                    class="h-10"
                >
                <span class="text-xl font-bold text-gray-900">UNESCO Zimbabwe</span>
            </div>

            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight">
                    Welcome back
                </h2>
                <p class="text-gray-500 mt-2 text-sm">
                    Sign in to the admin portal
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8">
                {{ $this->content }}
            </div>

            <p class="text-center text-gray-400 text-xs mt-8">
                &copy; {{ date('Y') }} UNESCO Zimbabwe. All rights reserved.
            </p>
        </div>
    </div>

</div>
