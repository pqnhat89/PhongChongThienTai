@php $logo = \App\Helpers\Utils::getLogo() @endphp

@if (request()->route()->getName() == 'admin')
    <form class="container-fluid pt-5 form-ajax"
        action="{{ route("admin.logo") }}" id="logo">
        <div class="card shadow-lg">
            <div class="card-header">
                <h3 class="text-center font-weight-light">
                    Logo
                </h3>
            </div>
            <div class="card-body">
                <div class="form-input">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="small" for="title">Website Name</label>
                                <input class="form-control" name="name" type="text" value="{{ $logo->name ?? null }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="small" for="slogan">Website Slogan</label>
                                <input class="form-control" name="slogan" type="text" value="{{ $logo->slogan ?? null }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small" for="description">Description</label>
                                <input class="form-control" name="description" type="text" value="{{ $logo->description ?? null }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="small" for="image">Image</label>
                                <input class="form-control ckfinder" name="image" type="text" value="{{ $logo->image ?? null }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">Save Logo</button>
            </div>
        </div>
    </form>
@endif
