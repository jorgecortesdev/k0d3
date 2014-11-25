<div class="row">
    <div class="col-sm-12">
        @foreach ($all_tags as $tag)
        <a href="/tags/{{ $tag->id }}/edit"><span class="label label-inline label-sm label-default">{{ $tag->name }}</span></a>
        @endforeach
    </div>
</div>