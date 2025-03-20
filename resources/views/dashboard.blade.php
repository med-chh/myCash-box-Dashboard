<x-app-layout>
    <x-slot name="header">
        <div class="">
            <livewire:date-range />
        </div>
    </x-slot>

    <div class="m-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <!-- Card -->
        <div
            class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase text-gray-500 dark:text-gray-500">
                        Total users
                    </p>
                    <div class="hs-tooltip">
                        <div class="hs-tooltip-toggle">
                            <svg class="shrink-0 size-4 text-gray-500 dark:text-gray-500"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                <path d="M12 17h.01"></path>
                            </svg>
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-2xs dark:bg-gray-700"
                                role="tooltip" style="position: fixed; left: 309.086px; top: 75px;">
                                The number of daily users
                            </span>
                        </div>
                    </div>
                </div>

                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                        72,540
                    </h3>
                    <span class="flex items-center gap-x-1 text-green-600">
                        <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                            <polyline points="16 7 22 7 22 13"></polyline>
                        </svg>
                        <span class="inline-block text-sm">
                            1.7%
                        </span>
                    </span>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div
            class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase text-gray-500 dark:text-gray-500">
                        Sessions
                    </p>
                </div>

                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                        29.4%
                    </h3>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div
            class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase text-gray-500 dark:text-gray-500">
                        Avg. Click Rate
                    </p>
                </div>

                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                        56.8%
                    </h3>
                    <span class="flex items-center gap-x-1 text-red-600">
                        <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="22 17 13.5 8.5 8.5 13.5 2 7"></polyline>
                            <polyline points="16 17 22 17 22 11"></polyline>
                        </svg>
                        <span class="inline-block text-sm">
                            1.7%
                        </span>
                    </span>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div
            class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase text-gray-500 dark:text-gray-500">
                        Pageviews
                    </p>
                </div>

                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                        92,913
                    </h3>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl">
        {{-- <button onclick="window.location.href='{{ route('subscribe') }}';" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Go to Subscription
        </button> --}}
        <x-welcome />
    </div>
</x-app-layout>
