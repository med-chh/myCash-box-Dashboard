@unless ($breadcrumbs->isEmpty())
    <!-- Display only the last breadcrumb's title -->
    <h2 class="p-3 font-semibold text-2xl leading-tight text-gray-800 truncate dark:text-neutral-200">
        {{ $breadcrumbs->last()->title }}
    </h2>

    <nav class="px-6 mx-auto">
        <ol class="flex items-center whitespace-nowrap p-2">
            @foreach ($breadcrumbs as $breadcrumb)
                @php
                    $isFirst = $loop->first; // Check if it's the first breadcrumb
                @endphp
                @if ($breadcrumb->url && !$loop->last)
                    <li class="inline-flex items-center">
                        <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-hidden focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
                            href="{{ $breadcrumb->url }}">
                            <!-- Display icon if available -->
                            @if (isset($breadcrumb->icon))
                                <!-- Render the icon component dynamically -->
                                <x-icon :name="$breadcrumb->icon" class="mr-2" />
                            @endif
                            <!-- Conditionally hide the title for the first breadcrumb -->
                            @unless ($isFirst)
                                {{ $breadcrumb->title }}
                            @endunless
                        </a>
                    </li>
                @else
                    <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200"
                        aria-current="page">
                        <!-- Display icon if available -->
                        @if (isset($breadcrumb->icon))
                            <!-- Render the icon component dynamically -->
                            <x-icon :name="$breadcrumb->icon" class="mr-2" />
                        @endif
                        {{ $breadcrumb->title }}
                    </li>
                @endif
                @unless ($loop->last)
                    <li class="text-gray-500 px-1">
                        <svg class="shrink-0 mx-2 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </li>
                @endif
                @endforeach
            </ol>
        </nav>
    @endunless
