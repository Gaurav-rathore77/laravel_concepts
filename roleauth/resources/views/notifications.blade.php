<h2>My Notifications</h2>
<ul>
@foreach(auth()->user()->notifications as $notification)
    <li>
        {{ $notification->data['message'] }}
        @if(is_null($notification->read_at))
            <strong>(Unread)</strong>
        @endif
    </li>
@endforeach
</ul>
