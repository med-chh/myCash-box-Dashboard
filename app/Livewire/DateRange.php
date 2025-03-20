<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class DateRange extends Component
{
    public $start_date;
    public $start_month;
    public $start_year;
    public $yearListStart;
    public $end_date;
    public $end_month;
    public $end_year;
    public $yearListEnd;
    public $start_time;
    public $end_time;
    public $selected_date_range;
    public $range;
    public $selected_start = false;
    public $date_model = false;

    public function mount()
    {
        $this->setDefaultDates();

        if (session()->has('selected_date_range')) {
            $this->selected_date_range = session('selected_date_range');
            $this->start_date = $this->selected_date_range['start_date'];
            try {
                $this->start_year = Carbon::parse($this->start_date)->year;
                $this->start_month = Carbon::parse($this->start_date)->format('M');
            } catch (\Exception $e) {
                $this->start_year = Carbon::now()->year;
                $this->start_month = Carbon::now()->format('M');
                $this->start_date = Carbon::now()->format('Y-m-d');
            }

            $this->end_date = $this->selected_date_range['end_date'];
            $this->start_time = $this->selected_date_range['start_time'];
            $this->end_time = $this->selected_date_range['end_time'];
            $this->range = session('range');
        } else {
            $this->start_year = Carbon::now()->year;
            $this->start_month = Carbon::now()->format('M');
            $this->start_date = Carbon::now()->format('Y-m-d');
        }
    }

    public function setDefaultDates()
    {
        $this->start_date = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->end_date = Carbon::now()->format('Y-m-d');
        $this->start_time = '00:00';
        $this->end_time = '23:59';
    }

    public function setDateRange($range)
    {
        $this->selected_date_range = $range;
        switch ($range) {
            case 'today':
                $this->start_date = Carbon::today()->format('Y-m-d');
                $this->end_date = Carbon::today()->format('Y-m-d');
                $this->range = "today";
                break;
            case 'yesterday':
                $this->start_date = Carbon::yesterday()->format('Y-m-d');
                $this->end_date = Carbon::yesterday()->format('Y-m-d');
                $this->range = "yesterday";
                break;
            case 'last7days':
                $this->start_date = Carbon::now()->subDays(6)->format('Y-m-d');
                $this->end_date = Carbon::now()->format('Y-m-d');
                $this->range = "last7days";
                break;
            case 'last30days':
                $this->start_date = Carbon::now()->subDays(29)->format('Y-m-d');
                $this->end_date = Carbon::now()->format('Y-m-d');
                $this->range = "last30days";
                break;
            case 'thisMonth':
                $this->start_date = Carbon::now()->startOfMonth()->format('Y-m-d');
                $this->end_date = Carbon::now()->format('Y-m-d');
                $this->range = "thisMonth";
                break;
            case 'lastMonth':
                $this->start_date = Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');
                $this->end_date = Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d');
                $this->range = "lastMonth";
                break;
            case 'thisYear':
                $this->start_date = Carbon::now()->startOfYear()->format('Y-m-d');
                $this->end_date = Carbon::today()->format('Y-m-d');
                $this->range = "thisYear";
                break;
            case 'thisWeek':
                $this->start_date = Carbon::now()->startOfWeek()->format('Y-m-d');
                $this->end_date = Carbon::now()->endOfWeek()->format('Y-m-d');
                $this->range = "thisWeek";
                break;
            case 'lastWeek':
                $this->start_date = Carbon::now()->subWeek()->startOfWeek()->format('Y-m-d');
                $this->end_date = Carbon::now()->subWeek()->endOfWeek()->format('Y-m-d');
                $this->range = "lastWeek";
                break;
            case 'custom':
                // Custom range is handled by the date picker inputs.
                // The applyDateRange() function will set the dates
                // So no action is needed here.
                $this->range = "custom";
                break;
            default:
                $this->setDefaultDates();
                $this->range = null;
                break;
        }

        $this->selected_date_range = [
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'range' => $this->range,
        ];

        $this->start_year = Carbon::parse($this->start_date)->year;
        $this->start_month = Carbon::parse($this->start_date)->format('M');

        // Store selected_date_range in session
        session(['selected_date_range' => $this->selected_date_range]);
        session(['range' => $this->range]);
        $this->dispatch('dateRangeSelected', $this->selected_date_range);
    }
    public function setCustomRange()
    {
        // Indicate that custom range has been selected
        $this->setDateRange('custom');
        $this->range = "custom";

        $this->selected_date_range = [
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ];
        $this->start_year = Carbon::parse($this->start_date)->year;
        $this->start_month = Carbon::parse($this->start_date)->format('M');

        session(['selected_date_range' => $this->selected_date_range]);
        session(['range' => $this->range]);
        $this->dispatch('dateRangeSelected', $this->selected_date_range);
    }

    public function applyDateRange()
    {
        $this->selected_date_range = [
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ];

        if ($this->start_date > $this->end_date) {
            $this->addError('end_date', 'End date must be after start date.');
            return;
        }
        $this->start_year = Carbon::parse($this->start_date)->year;
        $this->start_month = Carbon::parse($this->start_date)->format('M');

        session(['selected_date_range' => $this->selected_date_range]);

        $this->dispatch('dateRangeSelected', $this->selected_date_range);
        $this->date_model = false;
    }
    public function selectDate($date)
    {
        if (!$this->selected_start) {
            // First click: set start date
            $this->start_date = $date;
            $this->selected_start = true;
            Session::put('start_date', $date);
            Session::put('selected_start', true);
        } else {
            // Second click: set end date
            if (Carbon::parse($date)->greaterThanOrEqualTo(Carbon::parse($this->start_date))) {
                // End date is valid
                $this->end_date = $date;
                $this->selected_start = false;
                Session::put('end_date', $date);
                Session::put('selected_start', false);

                // Update selected_date_range and dispatch event like setCustomRange
                $this->selected_date_range = [
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                    'start_time' => $this->start_time, // Assuming these are set elsewhere
                    'end_time' => $this->end_time,     // Assuming these are set elsewhere
                ];
                $this->start_year = Carbon::parse($this->start_date)->year;
                $this->start_month = Carbon::parse($this->start_date)->format('M');

                Session::put('selected_date_range', $this->selected_date_range);

                $this->dispatch('dateRangeSelected', $this->selected_date_range);

                // Add setDateRange and range assignment
                $this->setDateRange('custom');
                $this->range = "custom";
            } else {
                // End date is before start date: reset
                $this->start_date = $date;
                $this->end_date = null;
                Session::put('start_date', $date);
                Session::put('end_date', null);
            }
        }
    }

    public function isDateBetween($date)
    {
        if (!$this->start_date || !$this->end_date) {
            return false;
        }

        $date = Carbon::parse($date)->startOfDay();
        $startDate = Carbon::parse($this->start_date)->startOfDay()->addDay();
        $endDate = Carbon::parse($this->end_date)->startOfDay()->subDay();

        return $date->between($startDate, $endDate);
    }
    public function calendar_start()
    {
        if (!$this->start_date) {
            return [];
        }

        $startDate = Carbon::parse($this->start_date);
        $firstDayOfMonth = $startDate->copy()->startOfMonth();
        $lastDayOfMonth = $startDate->copy()->endOfMonth();
        $firstDayOfWeek = $firstDayOfMonth->dayOfWeek;

        $calendar = [];
        $currentDate = $firstDayOfMonth->copy()->subDays($firstDayOfWeek);

        while ($currentDate->lessThanOrEqualTo($lastDayOfMonth->copy()->endOfWeek())) {
            $week = [];
            for ($i = 0; $i < 7; $i++) {
                $today = Carbon::today()->toDateString();
                $week[] = [
                    'date' => $currentDate->toDateString(),
                    'day' => $currentDate->day,
                    'isCurrentMonth' => $currentDate->isSameMonth($startDate),
                    'isToday' => $currentDate->toDateString() === $today,
                ];
                $currentDate->addDay();
            }
            $calendar[] = $week;
        }

        return $calendar;
    }
    public function setStartMonth($month)
    {
        $this->start_month = $month;
        $monthNumber = Carbon::parse($month)->month;

        $this->start_date = Carbon::create($this->start_year, $monthNumber, 1)->format('Y-m-d');

        // Check if start month is equal to end month and adjust end month if needed
        if ($this->start_month === $this->end_month) {
            $endDate = Carbon::parse($this->end_date)->addMonth();
            $this->end_date = $endDate->format('Y-m-d');
            $this->end_month = $endDate->format('M');
        }

        $this->dispatch('dateRangeSelected', $this->selected_date_range);
    }

    public function nextstartMonth()
    {
        $currentDate = Carbon::parse($this->start_date);
        $nextMonth = $currentDate->addMonth();

        $this->start_date = $nextMonth->format('Y-m-d');
        $this->start_month = $nextMonth->format('M');
        $this->start_year = $nextMonth->year;

        $this->dispatch('dateRangeSelected', $this->selected_date_range);
    }
    public function prevstartMonth()
    {
        $currentDate = Carbon::parse($this->start_date);
        $prevMonth = $currentDate->subMonth();

        $this->start_date = $prevMonth->format('Y-m-d');
        $this->start_month = $prevMonth->format('M');
        $this->start_year = $prevMonth->year;

        $this->dispatch('dateRangeSelected', $this->selected_date_range);
    }

    public function setStartYear($year)
    {
        $this->start_year = $year;
        $this->start_date = Carbon::create($this->start_year, Carbon::parse($this->start_date)->month, 1)->format('Y-m-d');
        $this->dispatch('dateRangeSelected', $this->selected_date_range);
        $this->updateYearListStart(); // Update the year list start
    }

    public function nextStartYear()
    {
        $this->start_year += 10; // Increment by 10 years
        $this->start_date = Carbon::create($this->start_year, Carbon::parse($this->start_date)->month, 1)->format('Y-m-d');
        $this->dispatch('dateRangeSelected', $this->selected_date_range);
        $this->updateYearListStart(); // Update the year list start
    }

    public function prevStartYear()
    {
        $this->start_year -= 10; // Decrement by 10 years
        $this->start_date = Carbon::create($this->start_year, Carbon::parse($this->start_date)->month, 1)->format('Y-m-d');
        $this->dispatch('dateRangeSelected', $this->selected_date_range);
        $this->updateYearListStart(); // Update the year list start
    }

    public function updateYearListStart()
    {
        // Update the yearListStart to show the next/previous 10 years
        $this->yearListStart = floor($this->start_year / 10) * 10;
    }

    public function getYearList()
    {
        // Generate the 10-year list starting from the year of the start date
        $years = [];
        $startYear = Carbon::parse($this->start_date)->year; // Get the year from start_date

        for ($i = 0; $i < 12; $i++) {
            $years[] = $startYear + $i;
        }
        return $years;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function calendar_end()
    {
        if (!$this->end_date) {
            return [];
        }

        $endDate = Carbon::parse($this->end_date);
        $firstDayOfMonth = $endDate->copy()->startOfMonth();
        $lastDayOfMonth = $endDate->copy()->endOfMonth();
        $firstDayOfWeek = $firstDayOfMonth->dayOfWeek;

        $calendar = [];
        $currentDate = $firstDayOfMonth->copy()->subDays($firstDayOfWeek);

        while ($currentDate->lessThanOrEqualTo($lastDayOfMonth->copy()->endOfWeek())) {
            $week = [];
            for ($i = 0; $i < 7; $i++) {
                $today = Carbon::today()->toDateString();
                $week[] = [
                    'date' => $currentDate->toDateString(),
                    'day' => $currentDate->day,
                    'isCurrentMonth' => $currentDate->isSameMonth($endDate),
                    'isToday' => $currentDate->toDateString() === $today,
                ];
                $currentDate->addDay();
            }
            $calendar[] = $week;
        }

        return $calendar;
    }
    public function setEndMonth($month)
    {
        $this->end_month = $month;
        $monthNumber = Carbon::parse($month)->month;

        // Check if end_date is already set, if not, set it to the first of the selected month
        if (!$this->end_date) {
            $this->end_date = Carbon::create($this->start_year, $monthNumber, 1)->format('Y-m-d');
        } else {
            // If end_date is set, update only the month, keep the day and year.
            $currentEndDate = Carbon::parse($this->end_date);
            $this->end_date = Carbon::create($currentEndDate->year, $monthNumber, $currentEndDate->day)->format('Y-m-d');
        }

        // Check if start month is equal to end month and adjust end month if needed
        if ($this->start_month === $this->end_month) {
            $endDate = Carbon::parse($this->end_date)->addMonth();
            $this->end_date = $endDate->format('Y-m-d');
            $this->end_month = $endDate->format('M');
        }

        $this->dispatch('dateRangeSelected', $this->selected_date_range);
    }
    public function nextEndMonth()
    {
        $currentDate = Carbon::parse($this->end_date);
        $nextMonth = $currentDate->addMonth();

        $this->end_date = $nextMonth->format('Y-m-d');
        $this->end_month = $nextMonth->format('M');
        $this->end_year = $nextMonth->year; // Assuming you have end_year property

        $this->dispatch('dateRangeSelected', $this->selected_date_range);
    }

    public function prevEndMonth()
    {
        $currentDate = Carbon::parse($this->end_date);
        $prevMonth = $currentDate->subMonth();

        $this->end_date = $prevMonth->format('Y-m-d');
        $this->end_month = $prevMonth->format('M');
        $this->end_year = $prevMonth->year; // Assuming you have end_year property

        $this->dispatch('dateRangeSelected', $this->selected_date_range);
    }
    public function setEndYear($year)
    {
        $this->end_year = $year;
        $this->end_date = Carbon::create($this->end_year, Carbon::parse($this->end_date)->month, 1)->format('Y-m-d');
        $this->dispatch('dateRangeSelected', $this->selected_date_range);
        $this->updateEndYearListStart(); // Update the year list start
    }

    public function nextEndYear()
    {
        $this->end_year += 10; // Increment by 10 years
        $this->end_date = Carbon::create($this->end_year, Carbon::parse($this->end_date)->month, 1)->format('Y-m-d');
        $this->dispatch('dateRangeSelected', $this->selected_date_range);
        $this->updateEndYearListStart(); // Update the year list start
    }

    public function prevEndYear()
    {
        $this->end_year -= 10; // Decrement by 10 years
        $this->end_date = Carbon::create($this->end_year, Carbon::parse($this->end_date)->month, 1)->format('Y-m-d');
        $this->dispatch('dateRangeSelected', $this->selected_date_range);
        $this->updateEndYearListStart(); // Update the year list start
    }

    public function updateEndYearListStart()
    {
        // Update the yearListStart to show the next/previous 10 years
        $this->yearListEnd = floor($this->end_year / 10) * 10;
    }

    public function getEndYearList()
    {
        // Generate the 12-year list starting from the year of the end date
        $years = [];
        $endYear = Carbon::parse($this->end_date)->year; // Get the year from end_date

        for ($i = 0; $i < 12; $i++) {
            $years[] = $endYear + $i;
        }
        return $years;
    }
    public function render()
    {
        return view('livewire.date-range');
    }
}
