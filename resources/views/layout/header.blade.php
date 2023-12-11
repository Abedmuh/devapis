@foreach ($call->groupBy('route')->sort() as $user)
<p>This is user {{ $user->count() }}</p>
@endforeach