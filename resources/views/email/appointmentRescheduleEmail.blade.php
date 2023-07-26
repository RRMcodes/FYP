@component('mail::message')
    Dear {{$data['patientName']}},

    This mail is to inform you that your appointment time for {{$data['specialist']}}, Dr. {{$data['doctorName']}} on
    {{$data['day']}}, {{$data['date']}} has been rescheduled. The doctor will be available from {{$data['from']}} to {{$data['to']}}.


    Thank you,
    E-Clinic
@endcomponent
