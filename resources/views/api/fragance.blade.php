<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner p-2">
        @foreach($data['parfum'] as $fragance)
        <div class="carousel-item {{ $loop->first ? " active" : "" }}">
            <div class="d-block fw">
                <div class="card">
                    <img class="card img-fluid bg-image"
                        src="https://cdn.pixabay.com/photo/2018/08/29/14/47/perfume-3640056_1280.jpg">
                    <div class="card-img-overlay">
                        <div class="card-header text-center">
                            <span class="font-weight-bold">{{ $fragance['title'] }} - {{ $fragance['category'] }}</span>
                        </div>
                        <div class="card special-card">
                            <p class="card-body font-weight-bold ">
                                {{ $fragance['description'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    </a>
</div>