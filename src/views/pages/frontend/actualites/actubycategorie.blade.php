@extends('Blog::layouts.blog')
@section('blog')
<style>
 .actualite.image img {
    width: 141px;
    height: 141px;
}
.actualite.image {
    width: auto;
    height: 95%;
    margin-right: 11px;
}
.actualite-box.d-md-flex {
    margin: 2%;
    background: #ffff;
    /* padding: 1%; */
}
section.actualite {
    background: linear-gradient(
90deg
,#fff 1%,#f6f6f6 37%,#f5f5f5);
}
</style>
    <section class="actualite">
                <div class="container">
                    <div class="sect-title">
                        <h4>Actualités de la categorie {{$categorie->titre}}</h4>
                        <div class="line-wrap">
                            <div class="line"></div><br>
                        </div>
                    </div>
                    <div class="sect-content">
                        <div class="row mb-3 ">
                            @if ($actualite->count() == 0)
                            <div class="col-md-12 text-center">
                                <h4>Aucune actualité correspondant à cette catégorie</h4>
                            </div>
                        @else
                        @foreach ($actualite as $item)
                            <div class="col-md-6">
                                <div class="actualite-box d-md-flex">
                                    <div class="actualite image">
                                        <img src="{{asset('storage/'.$item->image_couverture)}}" alt="">
                                    </div>
                                    <div class="actualite content">
                                        <p>
                                            {!! substr(strip_tags($item->body), 0, 200) !!} ...
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <span class="date_area float-left">
                                                <i class="fa fa-eye"></i> <small> {{$item->nombre_lus}} </small>
                                            </span>
                                            <span class="date_area float-left ">
                                                <small class="badge badge-secondary"> <i class="fa fa-clock"></i> {{\Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y')}}
                                                </small>
                                            </span>
                                            <a href="{{route('actualites-show', $item->uuid)}}" class=""> <small> Lire la suite >> </small></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                        </div>
                        {{-- <div class="text-center ">
                            <a href="#" class="btn btn-outline-danger bouton-voire-plus">Toutes les actualités</a>
                        </div> --}}
                    </div>
                </div>
            </section>
@endsection



