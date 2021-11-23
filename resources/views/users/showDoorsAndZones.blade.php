<x-layout title="My Zones">
    <h1>User Zones</h1>
    @foreach($user->zones as $zone)
    <li>{!!$zone->name!!}</li>
    @endforeach

    <h1>User Doors</h1>
    @foreach($user->doors as $door)
    <li>{!!$door->name!!}</li>
    @endforeach
</x-layout>