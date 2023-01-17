<div ng-app="app">
    <div ng-controller="UploadController as vm">
        <div class="container">
            <div class="page-header mt-5">
                <h1 class="text-center">{{ __('listing.upload_images_here') }}</h1>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ __('listing.hurrah') }}</strong> {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ __('listing.warning') }}</strong> {{$errors->first()}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form id="form" method="post" action="{{route('image-collector')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="fileName">Select a file</label>
                    <div class="input-group">
                        <input type="file" id="images" class="form-control" accept="image/png,image/jpeg"
                               name="images[]" multiple>

                    </div>
                </div>
                <div>
                    <button type="reset" class="btn btn-default mt-2"
                            onclick="reset()">{{ __('listing.reset') }}</button>
                    <button type="submit" class="btn btn-primary mt-2"
                            onclick="upload()">{{ __('listing.upload') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('custom-scripts')
    @include('pages.js.javascript')
@endpush
