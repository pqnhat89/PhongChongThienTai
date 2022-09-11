@php $carousel = \App\Helpers\Utils::getCarousel(); @endphp

@if (request()->route()->getName() == 'admin')
    <form class="container-fluid pt-5 form-ajax {{ $carousel->first() && $carousel->first()->active ? null : "disabled" }}"
        action="{{ route("admin.carousel") }}" id="carousel">
        <div class="card shadow-lg">
            <div class="card-header">
                <h3 class="text-center font-weight-light">
                    Carousel
                    <input type="checkbox" class="form-toggle" data-toggle="toggle" name="enabled"
                        {{ $carousel->first() && $carousel->first()->active ? "checked" : null }}>
                </h3>
            </div>
            <div class="card-body">
                <div class="form-input">
                    @php $carousel = count($carousel) ? $carousel : [1] @endphp
                    @foreach ($carousel as $v)
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="title">Title</label>
                                    <input class="form-control" name="title[]" type="text" value="{{ $v->title ?? null }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="description">Description</label>
                                    <input class="form-control" name="description[]" type="text" value="{{ $v->description ?? null }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="image">Image</label>
                                    <input class="form-control ckfinder" name="image[]" type="text" value="{{ $v->image ?? null }}">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <label>&nbsp;</label>
                                <a class="btn  btn-danger btn-block w-70 delete_row">x</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-right">
                    <a class="btn btn-success add_row">Add row</a>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">Save Carousel</button>
            </div>
        </div>
    </form>
@else
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($carousel as $k => $v)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $k }}"
                    class="{{ $k==0 ? 'active' : null }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($carousel as $k => $v)
                <div class="carousel-item {{ $k==0 ? 'active' : null }}">
                    <img src="{{ $v->image }}" alt="{{ $v->title }}" class="w-100">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $v->title }}</h5>
                        <p>{{ $v->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
@endif
