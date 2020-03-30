 @if(count($errors)>0)
            <ul class="list-group ">
                @foreach ($errors->all() as $item)
                    <li class="list-group-item text-danger">
                        {{ $item }}
                    </li>
                @endforeach
            </ul>
@endif