@extends('layouts.base')

@section('main')
<div class="container" style="background: #08080842">
    <div class="row" style="padding:100 0 100 0">
        <div class="mx-auto">
            LAS MEJORES DE LA CIUDAD
            <br><br><br>
            <h3 class="" style="font-size: 50px;">Hamburgesas</h3>
            <br><br><br>
            <button class="mx-5" style="padding: 5px">VER MENU HOY</button>
        </div>
    </div>
    <div class="row">
        <div class="mx-auto">
            <div class="row">
                <img class="mx-auto" src="images/Burguer.png" alt="" style="height: 30px;">
            </div>
            <br><br>
            <h2> Nuestra historia </h2>

        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Los orígenes se remontan al 10 de junio de 1960, cuando
                Ibrahim Mata compraron la Hamburgueseria “Soy Yo” con una inversión inicial de 950 dólares. El local
                estaba situado en Lecheria, y la idea de Ibrahim era vender Hamburguesas a domicilio a las personas
                de las residencias cercanas. Aquella experiencia no marchaba como tenían previsto.</p>
        </div>
        <div class="col">
            <p>A pesar de todo, Ibrahim se mantuvo al frente del restaurante
                y tomó decisiones importantes para su futuro, como reducir la carta de productos y establecer un
                reparto a domicilio gratuito. Después de adquirir dos restaurantes más en Barcelona, en 1965
                renombró sus tres locales como <b>Ibra's Burger Grill</p>
        </div>
    </div>
    <div class="row">
        <div class="mx-auto">
            <div class="row">
                <img class="mx-auto" src="images/Burguer.png" alt="" style="height: 30px;">
            </div>
            <br><br>
            <h2> Las más vendidos </h2>

        </div>
    </div>
    @foreach ($product_category as $item_cat)
    <hr>
        <div class="row justify-content-center">
            <h4 class="text-center">{{ $item_cat->name }}</h4>
            <div class="row justify-content-center">
                @foreach ($item_cat->get_products as $item)
                    @if($loop->iteration > 3)
                        @break
                    @endif
                    <div class="col-2">
                        <div class="mx-auto" style="background: transparent">
                            <img class="card-img-top" src="images/5.png" alt="">
                            <div class="text-center">
                                <p class="">{{ $item->name }}</p>
                                <p class=""> {{ $item->price_label }}{{ $item->price }} </p>
                                <span class="">{{$item->description }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
    <div class="row">
        <div style="padding: 30px; margin: 10px">
            <button style="padding: 5px">VER MENU HOY</button>
        </div>
    </div>
</div>
    
@endsection