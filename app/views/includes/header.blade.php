<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">k0d3</a>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li {{ isset($tab) && $tab == 'add' ? 'class="active"' : '' }}>
                <a href="{{ URL::to('/code/create') }}">Add Code</a>
            </li>
            <li {{ isset($tab) && $tab == 'add-tag' ? 'class="active"' : '' }}>
                <a href="{{ URL::to('/tags/create') }}">Add Tag</a>
            </li>
        </ul>
        <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button class="btn btn-default" type="submit">Submit</button>
        </form>
    </div>
</nav>