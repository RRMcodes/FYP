@component('mail::message')
    Dear Sir/Ma'am,

    This email is to inform you about {{$event->name}}, being organised from {{$event->start_date}} to {{$event->end_date}}.

    {{$event->description}}

    location: {{$event->location}}
    Time: {{$event->start_time}} to {{$event->end_time}}

    Thank you,
    E-Clinic
@endcomponent
