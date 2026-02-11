<div
    class="box_shadow"
    style="margin-top: 0;"
>
    <div class="container-fluid w90">
        <div class="projecthome">
            <div class="row">
                <div class="col-12">
                    <h2>{!! BaseHelper::clean($title) !!}</h2>
                    @if ($subtitle)
                        <p style="margin: 0 0 10px;">{!! BaseHelper::clean($subtitle) !!}</p>
                    @endif
                </div>
            </div>
            <div class="swiper featured-projects-slider">
                <div class="swiper-pagination"></div>
                <div class="swiper-wrapper">
                    @foreach ($projects as $project)
                        <div class="swiper-slide">
                            {!! Theme::partial('real-estate.projects.item', compact('project')) !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
