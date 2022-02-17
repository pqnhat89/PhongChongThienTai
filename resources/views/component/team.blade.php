@php $team = \App\Helpers\Utils::getTeam() @endphp

@if (request()->route()->getName() == 'admin')
    <form class="container-fluid pt-5 form-ajax {{ $team->first() && $team->first()->active ? null : "disabled" }}"
        action="{{ route("admin.team") }}" id="team">
        <div class="card shadow-lg">
            <div class="card-header">
                <h3 class="text-center font-weight-light">
                    Team
                    <input type="checkbox" class="form-toggle" data-toggle="toggle" name="enabled"
                        {{ $team->first() && $team->first()->active ? "checked" : null }}>
                </h3>
            </div>
            <div class="card-body">
                <div class="form-input">
                    @php $team = count($team) ? $team : [1] @endphp
                    @foreach ($team as $v)
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small" for="name">Name</label>
                                    <input class="form-control" name="name[]" type="text" value="{{ $v->name ?? null }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small" for="position">Position</label>
                                    <input class="form-control" name="position[]" type="text" value="{{ $v->position ?? null }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small" for="slogan">Slogan</label>
                                    <input class="form-control" name="slogan[]" type="text" value="{{ $v->slogan ?? null }}">
                                </div>
                            </div>
                            <div class="col-md-2">
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
                                <a class="btn btn-sm btn-danger btn-block w-70 delete_row">x</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-right">
                    <a class="btn btn-success add_row">Add row</a>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">Save Team</button>
            </div>
        </div>
    </form>
@else
<div class="row">
    <!-- Team member -->
    @foreach ($team as $v)
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="image-flip" >
                <div class="mainflip flip-0">
                    <div class="frontside">
                        <div class="card">
                            <div class="card-body text-center">
                                <p><img class="img-fluid" src="{{ $v->image }}" alt="card image"></p>
                                <h4 class="card-title">{{ $v->name }}</h4>
                                <p class="card-text">{{ $v->slogan }}</p>
                                <a href="/" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="backside">
                        <div class="card">
                            <div class="card-body text-center mt-4">
                                <h4 class="card-title">{{ $v->name }}</h4>
                                <p class="card-text">{{ $v->description }}</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a class="social-icon text-xs-center" target="_blank" href="/">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-icon text-xs-center" target="_blank" href="/">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-icon text-xs-center" target="_blank" href="/">
                                            <i class="fa fa-skype"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-icon text-xs-center" target="_blank" href="/">
                                            <i class="fa fa-google"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- ./Team member -->
    @endforeach
</div>
@endif
