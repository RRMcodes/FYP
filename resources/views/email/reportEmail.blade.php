@component('mail::message')
    Dear Sir/Ma'am,

    Please find the attached medical report of {{$test->name}} for {{$patient->f_name}} {{$patient->l_name}}.
    The report is named "{{$report->file}}".

    Thank you for using E-Clinic for your healthcare needs.

    Best regards,
    E-Clinic
@endcomponent
