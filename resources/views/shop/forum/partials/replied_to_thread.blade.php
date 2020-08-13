<a href="{{route('forum.show', $notification->data['thread']['id'])}}">

{{ $notification->data['user']['name'] }} commented on <b>{{ $notification->data['thread']['subject'] }}</b>
</a>
