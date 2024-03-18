@foreach($days[0]->intervals as $interval)
    <option value="{{$interval->id}}">{{$interval->name}}</option>
@endforeach