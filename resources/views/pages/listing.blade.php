<h2 class="text-center">{{ __('listing.collage_table') }}</h2>
<p class="text-center">{{ __('listing.listing_detail') }}</p>
<table class="table">
    <thead>
    <tr>
        <th>{{ __('listing.id') }}</th>
        <th>{{ __('listing.images') }}</th>
        <th>{{ __('listing.created_at') }}</th>
        <th>{{ __('listing.updated_at') }}</th>
        <th>{{ __('listing.action') }}</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($images))
        @foreach($images as $image)
            <tr>
                <td>
                    {{$image->id}}
                </td>
                <td>
                    <img src="{{$image->path}}" alt="collage" width="100px" height="100px">
                </td>
                <td>
                    {{$image->created_at->diffForHumans()}}
                </td>
                <td>
                    {{$image->updated_at->diffForHumans()}}
                </td>
                <td>
                    <a class="btn btn-info text-white" href="{{$image->path}}" target="_blank"
                       download>{{ __('listing.download') }}</a>
                </td>
            </tr>
        @endforeach
    @endif

    </tbody>
</table>
{{$images->links()}}

