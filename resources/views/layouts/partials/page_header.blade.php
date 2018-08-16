@hasSection('hide_title_wrapper')
@else

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Pages</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h1>@yield('page_title')</h1>
                </div>
            </div>
        </div>
    </section>

@endif