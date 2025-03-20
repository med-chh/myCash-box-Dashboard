<div>
    <div class="my-7" x-data="{ open: @entangle('date_model') }" @click.outside="open = false">
        <div class="relative w-full text-gray-700">
            <div class="flex items-center ">
                <!-- Previous Button -->
                <button type="button"
                    class="px-3 py-2 h-10 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white rounded-l flex items-center justify-center">
                    <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M14.9998 19.9201L8.47984 13.4001C7.70984 12.6301 7.70984 11.3701 8.47984 10.6001L14.9998 4.08008"
                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </g>
                    </svg>
                </button>

                <!-- Date Range Input -->
                <button type="button" id="date-range-input" @click="open = !open"
                    class="relative flex items-center justify-between w-full px-3 h-10 border text-sm text-gray-700 placeholder-gray-400 transition-colors bg-white border-gray-300 focus:outline-none dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:placeholder-gray-500">
                    <span class="truncate">{{ $start_date ?? 'Start Date' }} - {{ $end_date ?? 'End Date' }}</span>
                    <span class="truncate">
                        @if ($start_time === '00:00' && $end_time === '23:59')
                            All Day
                        @else
                            {{ $start_time }} - {{ $end_time }}
                        @endif
                    </span>
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.75 2.5C7.75 2.08579 7.41421 1.75 7 1.75C6.58579 1.75 6.25 2.08579 6.25 2.5V4.07926C4.81067 4.19451 3.86577 4.47737 3.17157 5.17157C2.47737 5.86577 2.19451 6.81067 2.07926 8.25H21.9207C21.8055 6.81067 21.5226 5.86577 20.8284 5.17157C20.1342 4.47737 19.1893 4.19451 17.75 4.07926V2.5C17.75 2.08579 17.4142 1.75 17 1.75C16.5858 1.75 16.25 2.08579 16.25 2.5V4.0129C15.5847 4 14.839 4 14 4H10C9.16097 4 8.41527 4 7.75 4.0129V2.5Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2 12C2 11.161 2 10.4153 2.0129 9.75H21.9871C22 10.4153 22 11.161 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12ZM17 14C17.5523 14 18 13.5523 18 13C18 12.4477 17.5523 12 17 12C16.4477 12 16 12.4477 16 13C16 13.5523 16.4477 14 17 14ZM17 18C17.5523 18 18 17.5523 18 17C18 16.4477 17.5523 16 17 16C16.4477 16 16 16.4477 16 17C16 17.5523 16.4477 18 17 18ZM13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.5523 12 13 12.4477 13 13ZM13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17ZM7 14C7.55228 14 8 13.5523 8 13C8 12.4477 7.55228 12 7 12C6.44772 12 6 12.4477 6 13C6 13.5523 6.44772 14 7 14ZM7 18C7.55228 18 8 17.5523 8 17C8 16.4477 7.55228 16 7 16C6.44772 16 6 16.4477 6 17C6 17.5523 6.44772 18 7 18Z"
                            fill="currentColor"></path>
                    </svg>
                </button>


                <!-- Next Button -->
                <button type="button"
                    class="px-3 py-2 h-10 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white rounded-r flex items-center justify-center">
                    <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M8.91016 19.9201L15.4302 13.4001C16.2002 12.6301 16.2002 11.3701 15.4302 10.6001L8.91016 4.08008"
                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </g>
                    </svg>
                </button>
            </div>
            <div x-show="open"
                class="transition-all ease-out duration-300 absolute z-10 mt-[1px] text-sm lg:text-xs 2xl:text-sm block translate-y-0 opacity-1">
                <div
                    class="absolute z-20 h-4 w-4 rotate-45 mt-0.5 ml-[1.2rem] border-l border-t border-gray-300 bg-white dark:bg-slate-800 dark:border-slate-600">
                </div>
                <div
                    class="mt-2.5 shadow-sm border border-gray-300 px-1 py-0.5 bg-white dark:bg-slate-800 dark:text-white dark:border-slate-600 rounded-lg">
                    <div class="flex flex-col lg:flex-row py-2">
                        <div
                            class="md:border-b mb-3 lg:mb-0 lg:border-r lg:border-b-0 border-gray-300 dark:border-gray-700 pr-1">
                            <ul class="w-full tracking-wide flex flex-wrap lg:flex-col pb-1 lg:pb-0">
                                <li wire:click="setDateRange('today')"
                                    class="whitespace-nowrap w-1/2 md:w-1/3 lg:w-auto transition-all duration-300 hover:bg-gray-100 dark:hover:bg-white/10 p-2 rounded cursor-pointer   dark:hover:text-sky-400 hover:text-sky-700 {{ $range == 'today' ? 'bg-gray-100 dark:bg-white/10 dark:text-white text-gray-800' : 'text-sky-600 dark:text-sky-400' }}">
                                    Today
                                </li>
                                <li wire:click="setDateRange('yesterday')"
                                    class="whitespace-nowrap w-1/2 md:w-1/3 lg:w-auto transition-all duration-300 hover:bg-gray-100 dark:hover:bg-white/10 p-2 rounded cursor-pointer text-sky-600 dark:text-sky-400 dark:hover:text-sky-400 hover:text-sky-700 {{ $range == 'yesterday' ? 'bg-gray-100 dark:bg-white/10 dark:text-white text-gray-800' : 'text-sky-600 dark:text-sky-400' }}">
                                    Yesterday
                                </li>
                                <li wire:click="setDateRange('last7days')"
                                    class="whitespace-nowrap w-1/2 md:w-1/3 lg:w-auto transition-all duration-300 hover:bg-gray-100 dark:hover:bg-white/10 p-2 rounded cursor-pointer text-sky-600 dark:text-sky-400 dark:hover:text-sky-400 hover:text-sky-700 {{ $range == 'last7days' ? 'bg-gray-100 dark:bg-white/10 dark:text-white text-gray-800' : 'text-sky-600 dark:text-sky-400' }}">
                                    Last 7 days
                                </li>
                                <li wire:click="setDateRange('thisWeek')"
                                    class="whitespace-nowrap w-1/2 md:w-1/3 lg:w-auto transition-all duration-300 hover:bg-gray-100 dark:hover:bg-white/10 p-2 rounded cursor-pointer text-sky-600 dark:text-sky-400 dark:hover:text-sky-400 hover:text-sky-700 {{ $range == 'thisWeek' ? 'bg-gray-100 dark:bg-white/10 dark:text-white text-gray-800' : 'text-sky-600 dark:text-sky-400' }}">
                                    This week
                                </li>
                                <li wire:click="setDateRange('lastWeek')"
                                    class="whitespace-nowrap w-1/2 md:w-1/3 lg:w-auto transition-all duration-300 hover:bg-gray-100 dark:hover:bg-white/10 p-2 rounded cursor-pointer text-sky-600 dark:text-sky-400 dark:hover:text-sky-400 hover:text-sky-700 {{ $range == 'lastWeek' ? 'bg-gray-100 dark:bg-white/10 dark:text-white text-gray-800' : 'text-sky-600 dark:text-sky-400' }}">
                                    Last week
                                </li>
                                <li wire:click="setDateRange('last30days')"
                                    class="whitespace-nowrap w-1/2 md:w-1/3 lg:w-auto transition-all duration-300 hover:bg-gray-100 dark:hover:bg-white/10 p-2 rounded cursor-pointer text-sky-600 dark:text-sky-400 dark:hover:text-sky-400 hover:text-sky-700 {{ $range == 'last30days' ? 'bg-gray-100 dark:bg-white/10 dark:text-white text-gray-800' : 'text-sky-600 dark:text-sky-400' }}">
                                    Last 30 days
                                </li>
                                <li wire:click="setDateRange('thisMonth')"
                                    class="whitespace-nowrap w-1/2 md:w-1/3 lg:w-auto transition-all duration-300 hover:bg-gray-100 dark:hover:bg-white/10 p-2 rounded cursor-pointer text-sky-600 dark:text-sky-400 dark:hover:text-sky-400 hover:text-sky-700 {{ $range == 'thisMonth' ? 'bg-gray-100 dark:bg-white/10 dark:text-white text-gray-800' : 'text-sky-600 dark:text-sky-400' }}">
                                    This month
                                </li>
                                <li wire:click="setDateRange('lastMonth')"
                                    class="whitespace-nowrap w-1/2 md:w-1/3 lg:w-auto transition-all duration-300 hover:bg-gray-100 dark:hover:bg-white/10 p-2 rounded cursor-pointer text-sky-600 dark:text-sky-400 dark:hover:text-sky-400 hover:text-sky-700 {{ $range == 'lastMonth' ? 'bg-gray-100 dark:bg-white/10 dark:text-white text-gray-800' : 'text-sky-600 dark:text-sky-400' }}">
                                    Last month
                                </li>
                                <li wire:click="setDateRange('thisYear')"
                                    class="whitespace-nowrap w-1/2 md:w-1/3 lg:w-auto transition-all duration-300 hover:bg-gray-100 dark:hover:bg-white/10 p-2 rounded cursor-pointer text-sky-600 dark:text-sky-400 dark:hover:text-sky-400 hover:text-sky-700 {{ $range == 'thisYear' ? 'bg-gray-100 dark:bg-white/10 dark:text-white text-gray-800' : 'text-sky-600 dark:text-sky-400' }}">
                                    This year
                                </li>
                                <li @disabled(true)
                                    class="whitespace-nowrap w-1/2 md:w-1/3 lg:w-auto transition-all duration-300 hover:bg-gray-100 dark:hover:bg-white/10 p-2 rounded cursor-pointer text-sky-600 dark:text-sky-400 dark:hover:text-sky-400 hover:text-sky-700 {{ $range == 'custom' ? 'bg-gray-100 dark:bg-white/10 dark:text-white text-gray-800' : 'text-sky-600 dark:text-sky-400' }}">
                                    Custom Range
                                </li>
                            </ul>
                        </div>
                        <div
                            class="flex items-stretch flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-1.5 md:pl-2 pr-2 lg:pr-1">
                            <div x-data="{ showstartMonths: false, showstartYears: false }" class="w-full md:w-[296px] md:min-w-[296px]">
                                <div
                                    class="flex items-center space-x-1.5 border border-gray-300 dark:border-gray-700 rounded-md px-2 py-1.5">
                                    <div class="flex-none">
                                        <button type="button" x-show="!showstartYears" wire:click="prevstartMonth()"
                                            class="dark:text-white/70 dark:hover:bg-white/10 dark:focus:bg-white/10  transition-all duration-300 hover:bg-gray-100 rounded-full p-[0.45rem] focus:ring-1 focus:ring-sky-500/50 focus:bg-sky-100/50 ">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                                            </svg>
                                        </button>
                                        <button type="button" wire:click="prevStartYear()" x-show="showstartYears"
                                            class="dark:text-white/70 dark:hover:bg-white/10 dark:focus:bg-white/10  transition-all duration-300 hover:bg-gray-100 rounded-full p-[0.45rem] focus:ring-1 focus:ring-blue-500/50 focus:bg-blue-100/50 ">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="w-1/2">
                                        <button type="button"
                                            @click="showstartMonths = !showstartMonths; if (showstartMonths) { showstartYears = false; }"
                                            class="w-full tracking-wide dark:text-white/70 dark:hover:bg-white/10 dark:focus:bg-white/10 transition-all duration-300 px-3 py-[0.55rem] uppercase hover:bg-gray-100 rounded-md focus:ring-1 focus:ring-sky-500/50 focus:bg-sky-100/50">
                                            {{ $start_month }}
                                        </button>
                                    </div>
                                    <div class="w-1/2">
                                        <button type="button"
                                            @click="showstartYears = !showstartYears; if (showstartYears) { showstartMonths = false; }"
                                            class="w-full tracking-wide dark:text-white/70 dark:hover:bg-white/10 dark:focus:bg-white/10 transition-all duration-300 px-3 py-[0.55rem] uppercase hover:bg-gray-100 rounded-md focus:ring-1 focus:ring-sky-500/50 focus:bg-sky-100/50">
                                            {{ $start_year }}
                                        </button>
                                    </div>
                                    <div class="flex-none">
                                        <button type="button" x-show="!showstartYears" wire:click="nextstartMonth()"
                                            class="dark:text-white/70 dark:hover:bg-white/10 dark:focus:bg-white/10  transition-all duration-300 hover:bg-gray-100 rounded-full p-[0.45rem] focus:ring-1 focus:ring-sky-500/50 focus:bg-sky-100/50 ">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </button>
                                        <button type="button" x-show="showstartYears" wire:click="nextStartYear()"
                                            class="dark:text-white/70 dark:hover:bg-white/10 dark:focus:bg-white/10  transition-all duration-300 hover:bg-gray-100 rounded-full p-[0.45rem] focus:ring-1 focus:ring-blue-500/50 focus:bg-blue-100/50 ">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div x-show="showstartMonths" class="px-0.5 sm:px-2 mt-0.5 min-h-[285px]">
                                    <div class="w-full grid grid-cols-2 gap-2 mt-2">
                                        @foreach (['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $month)
                                            <button @click="showstartMonths = false" type="button"
                                                wire:click="setStartMonth('{{ $month }}')"
                                                class="w-full tracking-wide dark:text-white/70 dark:hover:bg-white/10 dark:focus:bg-white/10 transition-all duration-300 px-3 py-3 uppercase hover:bg-gray-100 rounded-md focus:ring-1 focus:ring-blue-500/50 focus:bg-blue-100/50">
                                                {{ $month }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                                <div x-show="showstartYears" class="px-0.5 sm:px-2 mt-0.5 min-h-[285px]">
                                    <div class="w-full grid grid-cols-2 gap-2 mt-2">
                                        @foreach ($this->getYearList() as $start_year)
                                            <button type="button" wire:click="setStartYear({{ $start_year }})"
                                                @click="showstartYears = false"
                                                class="w-full tracking-wide dark:text-white/70 dark:hover:bg-white/10 dark:focus:bg-white/10 transition-all duration-300 px-3 py-3 uppercase hover:bg-gray-100 rounded-md focus:ring-1 focus:ring-blue-500/50 focus:bg-blue-100/50">
                                                {{ $start_year }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>

                                <div x-show="!showstartMonths && !showstartYears"
                                    class="px-0.5 sm:px-2 mt-0.5 min-h-[285px]">
                                    <div class="grid grid-cols-7 border-b border-gray-300 dark:border-gray-700 py-2">
                                        <div class="tracking-wide text-gray-500 text-center">Sun</div>
                                        <div class="tracking-wide text-gray-500 text-center">Mon</div>
                                        <div class="tracking-wide text-gray-500 text-center">Tue</div>
                                        <div class="tracking-wide text-gray-500 text-center">Wed</div>
                                        <div class="tracking-wide text-gray-500 text-center">Thu</div>
                                        <div class="tracking-wide text-gray-500 text-center">Fri</div>
                                        <div class="tracking-wide text-gray-500 text-center">Sat</div>
                                    </div>
                                    <div>
                                        @foreach ($this->calendar_start() as $week)
                                            <div class="grid grid-cols-7 gap-y-0.5 my-1">
                                                @foreach ($week as $day)
                                                    <button type="button"
                                                        wire:click="selectDate('{{ $day['date'] }}')"
                                                        aria-label="Date: {{ \Carbon\Carbon::parse($day['date'])->format('F j, Y') }}"
                                                        aria-pressed="{{ $day['date'] == $this->start_date || $day['date'] == $this->end_date ? 'true' : 'false' }}"
                                                        role="button"
                                                        class="flex items-center justify-center w-12 h-12 lg:w-10 lg:h-10 rounded-md
                                                        {{ $day['isToday'] && $day['isCurrentMonth'] ? 'text-sky-500 border-gray-700 dark:border-gray-300' : '' }}
                                                        {{ $day['date'] == $this->start_date && $day['isCurrentMonth'] ? 'dark:bg-white dark:text-sky-500 rounded-r-none' : '' }}
                                                        {{ $day['date'] == $this->end_date && $day['isCurrentMonth'] ? 'dark:bg-white dark:text-sky-500 rounded-l-none' : '' }}
                                                        {{ $this->isDateBetween($day['date']) && $day['isCurrentMonth'] ? 'bg-gray-400 dark:bg-gray-600 rounded-none' : '' }}
                                                        {{ $day['isCurrentMonth'] ? 'hover:bg-gray-500 dark:hover:bg-gray-400' : 'text-gray-400' }}">
                                                        {{ $day['day'] }}
                                                    </button>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="h-7 w-1 rounded-full hidden md:block bg-sky-500"></div>
                            </div>
                            <div x-data="{ showendMonths: false, showendYears: false }" class="w-full md:w-[296px] md:min-w-[296px]">
                                <div
                                    class="flex items-center space-x-1.5 border border-gray-300 dark:border-gray-700 rounded-md px-2 py-1.5">
                                    <div class="flex-none"><button type="button"
                                            class="dark:text-white/70 dark:hover:bg-white/10 dark:focus:bg-white/10  transition-all duration-300 hover:bg-gray-100 rounded-full p-[0.45rem] focus:ring-1 focus:ring-sky-500/50 focus:bg-sky-100/50 "><svg
                                                class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                                            </svg></button></div>
                                    <div class="flex flex-1 items-center space-x-1.5">
                                        <div class="w-1/2"><button type="button"
                                                class="w-full tracking-wide dark:text-white/70 dark:hover:bg-white/10 dark:focus:bg-white/10  transition-all duration-300 px-3 py-[0.55rem] uppercase hover:bg-gray-100 rounded-md focus:ring-1 focus:ring-sky-500/50 focus:bg-sky-100/50 ">{{ $end_month }}</button>
                                        </div>
                                        <div class="w-1/2"><button type="button"
                                                class="w-full tracking-wide dark:text-white/70 dark:hover:bg-white/10 dark:focus:bg-white/10  transition-all duration-300 px-3 py-[0.55rem] uppercase hover:bg-gray-100 rounded-md focus:ring-1 focus:ring-sky-500/50 focus:bg-sky-100/50 ">{{ $end_year }}</button>
                                        </div>
                                    </div>
                                    <div class="flex-none"><button type="button"
                                            class="dark:text-white/70 dark:hover:bg-white/10 dark:focus:bg-white/10  transition-all duration-300 hover:bg-gray-100 rounded-full p-[0.45rem] focus:ring-1 focus:ring-sky-500/50 focus:bg-sky-100/50 "><svg
                                                class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg></button></div>
                                </div>
                                <div class="px-0.5 sm:px-2 mt-0.5 min-h-[285px]">
                                    <div class="grid grid-cols-7 border-b border-gray-300 dark:border-gray-700 py-2">
                                        <div class="tracking-wide text-gray-500 text-center">Sun</div>
                                        <div class="tracking-wide text-gray-500 text-center">Mon</div>
                                        <div class="tracking-wide text-gray-500 text-center">Tue</div>
                                        <div class="tracking-wide text-gray-500 text-center">Wed</div>
                                        <div class="tracking-wide text-gray-500 text-center">Thu</div>
                                        <div class="tracking-wide text-gray-500 text-center">Fri</div>
                                        <div class="tracking-wide text-gray-500 text-center">Sat</div>
                                    </div>
                                    <div>
                                        @foreach ($this->calendar_end() as $week)
                                            <div class="grid grid-cols-7 gap-y-0.5 my-1">
                                                @foreach ($week as $day)
                                                    <button type="button"
                                                        wire:click="selectDate('{{ $day['date'] }}')"
                                                        aria-label="Date: {{ \Carbon\Carbon::parse($day['date'])->format('F j, Y') }}"
                                                        aria-pressed="{{ $day['date'] == $this->start_date || $day['date'] == $this->end_date ? 'true' : 'false' }}"
                                                        role="button"
                                                        class="flex items-center justify-center w-12 h-12 lg:w-10 lg:h-10 rounded-md
                                                        {{ $day['isToday'] && $day['isCurrentMonth'] ? 'text-sky-500 border-gray-700 dark:border-gray-300' : '' }}
                                                        {{ $day['date'] == $this->start_date && $day['isCurrentMonth'] ? 'dark:bg-white dark:text-sky-500 rounded-r-none' : '' }}
                                                        {{ $day['date'] == $this->end_date && $day['isCurrentMonth'] ? 'dark:bg-white dark:text-sky-500 rounded-l-none' : '' }}
                                                        {{ $this->isDateBetween($day['date']) && $day['isCurrentMonth'] ? 'bg-gray-400 dark:bg-gray-600 rounded-none' : '' }}
                                                        {{ $day['isCurrentMonth'] ? 'hover:bg-gray-500 dark:hover:bg-gray-400' : 'text-gray-400' }}">
                                                        {{ $day['day'] }}
                                                    </button>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-end pb-2.5 pt-3 border-t border-gray-300 dark:border-gray-700">
                        <div class="w-full md:w-auto flex items-center justify-center space-x-3">
                            <div class="flex flex-col">
                                <label for="start_date" class="text-sm text-gray-700 dark:text-gray-300 ">Start
                                    Date:</label>
                                <input type="date" id="start_date" wire:model="start_date"
                                    wire:change="setCustomRange"
                                    class="px-3 py-1 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-0 focus:ring-sky-500 focus:border-sky-500">
                            </div>

                            <div class="flex flex-col">
                                <label for="end_date" class="text-sm text-gray-700 dark:text-gray-300">End
                                    Date:</label>
                                <input type="date" id="end_date" wire:model="end_date"
                                    wire:change="setCustomRange"
                                    class="px-3 py-1 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-0 focus:ring-sky-500 focus:border-sky-500">
                            </div>
                            <div class="flex flex-col">time</div>

                            <button type="button"
                                class="transition-all duration-300 bg-white dark:bg-gray-800 dark:text-gray-300
                                       font-medium border border-gray-300 dark:border-gray-600
                                       px-4 py-2 text-sm rounded-md focus:ring-2 focus:ring-offset-2
                                       hover:bg-gray-50 dark:hover:bg-gray-700 focus:ring-sky-500">
                                Cancel
                            </button>

                            <button type="button" disabled
                                class="transition-all duration-300 bg-sky-500 border-sky-500 text-white
                                       font-medium border px-4 py-2 text-sm rounded-md focus:ring-2
                                       focus:ring-offset-2 hover:bg-sky-600 focus:ring-sky-500 cursor-not-allowed">
                                Apply
                            </button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
