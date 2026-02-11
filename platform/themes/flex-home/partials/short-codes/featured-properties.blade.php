<div class="container-fluid w90">
    <div class="homehouse padtop30">
        <div class="row">
            <div class="col-12">
                <h2>{!! BaseHelper::clean($title) !!}</h2>
                @if ($subtitle)
                    <p>{!! BaseHelper::clean($subtitle) !!}</p>
                @endif
            </div>
        </div>
        <div class="projecthome mb-2">
            <div class="swiper featured-properties-slider">
                <div class="swiper-pagination"></div>
                <div class="swiper-wrapper">
                    @foreach ($properties as $property)
                        <div class="swiper-slide">
                            {!! Theme::partial('real-estate.properties.item', ['property' => $property]) !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
