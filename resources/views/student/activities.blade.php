@extends('layouts.student')

@section('studentcontent')

<div class="container">
    <h2 class="text-dark mb-4">{{ $course->title }} - Activities Calendar</h2>

    <!-- Calendar -->
    <div id="calendar" style="max-width: 900px; margin: 0 auto; height: 600px;"></div>

    <hr class="my-4">

    <!-- Today's Activity Section -->
    <h3 class="text-dark">Today's Activities</h3>
    @if($todayActivities->isEmpty())
        <p class="text-muted">No activities for today.</p>
    @else
        <ul class="list-group">
            @foreach($todayActivities as $activity)
                <li class="list-group-item text-dark">
                    <strong>{{ $activity->title }}</strong>
                    <p>{{ $activity->description }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</div>

<!-- FullCalendar CSS + JS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 600,
        events: @json($events),
        eventDidMount: function(info) {
            new bootstrap.Tooltip(info.el, {
                title: info.event.title + " - " + (info.event.extendedProps.description ?? ''),
                placement: 'top',
                trigger: 'hover',
                container: 'body'
            });
        }
    });

    calendar.render();
});
</script>

@endsection
