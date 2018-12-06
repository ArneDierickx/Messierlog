<section id="sidebar">
    <nav>
        <ul>
            @if(\Illuminate\Support\Facades\Request::path() === '/')

                <li><a id="currentpage" href="{{ url("/") }}">Personal</a></li>
            @else
                <li><a href="{{ url("/") }}">Personal</a></li>
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
    @if(\Illuminate\Support\Facades\Request::path() ==='create')
        <a id="currentpage" href="{{ url("/create") }}">UPLOAD</a>
    @else
        <a href="{{ url("/create") }}">UPLOAD</a>
    @endif
    <div id="filter">
        <p>Filter</p>
        <ul>
            <li>
                <select title="Type of telescope">
                    <option disabled hidden selected>Type of telescope</option>
                </select>
            </li>
            <li>
                <select title="Messier object">
                    <option disabled hidden selected>Messier object</option>
                </select>
            </li>
            <li>
                <input type="date" title="Date" name="date"/>
            </li>
        </ul>
    </div>
</section>