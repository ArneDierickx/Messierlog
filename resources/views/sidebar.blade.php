<section class="col-lg-3 d-flex flex-column justify-content-around align-items-center" id="sidebar">
    <nav>
        <ul>
            @if(\Illuminate\Support\Facades\Request::path() === 'personal')

                <li><a id="currentpage" href="{{ url("/personal") }}">Personal</a></li>
            @else
                <li><a href="{{ url("/personal") }}">Personal</a></li>
            @endif
            @if(\Illuminate\Support\Facades\Request::path() === 'public')
                <li><a id="currentpage" href="{{ url("/public") }}">Public</a></li>
            @else
                <li><a href="{{ url("/public") }}">Public</a></li>
            @endif
            @if(\Illuminate\Support\Facades\Request::path() ==='statistics')
                <li><a id="currentpage" href="{{ url("/statistics") }}">Statistics</a></li>
            @else
                <li><a href="{{ url("/statistics") }}">Statistics</a></li>
            @endif
        </ul>
    </nav>
    @if(\Illuminate\Support\Facades\Request::path() ==='personal/create')
        <a id="currentpage" href="{{ url("/personal/create") }}">UPLOAD</a>
    @else
        <a href="{{ url("/personal/create") }}">UPLOAD</a>
    @endif
    <div id="filter">
        <p>Filter</p>
        <ul>
            <li>
                <select id="typeOfTelescope" title="Type of telescope">
                    <option selected>Type of telescope</option>
                    <option value="refractor">Refractor</option>
                    <option value="reflector">Reflector</option>
                </select>
            </li>
            <li>
                <select id="messierObject" title="Messier object">
                    <option selected>Messier object</option>
                    @for($i = 1; $i <=110; $i++)
                        <option value="M{{$i}}">M{{$i}}</option>
                    @endfor
                </select>
            </li>
            <li>
                <input id="date" type="date" title="Date" name="date"/>
            </li>
        </ul>
    </div>
</section>