@extends('layouts.student')

@section('studentcontent')
<div class="container py-4">
    <h4>📡 Live Class</h4>

    <div id="jitsi-container" style="height: 600px; width: 100%;" class="border rounded shadow"></div>
</div>

<div id="jitsi-container" style="height: 600px;"></div>

<script src="https://meet.jit.si/external_api.js"></script>
<script>
    const domain = 'meet.jit.si';
    const options = {
        roomName: "{{ $room }}",
        width: '100%',
        height: 600,
        parentNode: document.querySelector('#jitsi-container'),
        userInfo: {
            displayName: "{{ auth()->user()->name }}"
        }
    };
    const api = new JitsiMeetExternalAPI(domain, options);
</script>

@endsection
