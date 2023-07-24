@component('mail::message')
Dear {{$patientName}},

Your appointment for {{$specialist}}, Dr. {{$doctorName}} has been booked for {{$dayOfWeek}}, {{$appointment_date}}.
The doctor will be available from {{$fromTime}} to {{$toTime}}.


    Thank you,
    E-Clinic
@endcomponent
