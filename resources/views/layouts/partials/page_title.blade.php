@hasSection('hide_title_wrapper')
@else
<section id="page-title">

    <div class="container clearfix">
        <h1>
            @yield('page_title')
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </div>

</section>
@endif