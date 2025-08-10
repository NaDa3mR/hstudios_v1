<x-mail::message>
# Meeting Scheduled

Hello {{ $meeting->client->name }},

Your meeting titled **{{ $meeting->subject }}** has been scheduled.

**Start Time:** {{ $meeting->start_time }}
**End Time:** {{ $meeting->end_time }}

@isset($meeting->details)
You can join the meeting here: [Join Meeting]({{ $meeting->details }})
@endisset

{{-- If you want a button with the meeting link --}}
@if(!empty($meeting->details))
<x-mail::button :url="$meeting->details">
Join Meeting
</x-mail::button>
@endif

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
