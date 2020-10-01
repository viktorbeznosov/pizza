@extends('.layouts.site')

@section('content')
    <section class="home-slider owl-carousel img owl-loaded owl-drag" style="background-image: url(http://pizza.loc/assets/images/bg_1.jpg);">


        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-3806px, 0px, 0px); transition: all 0s ease 0s; width: 9515px;"><div class="owl-item cloned" style="width: 1903px;"><div class="slider-item" style="background-image: url(http://pizza.loc/assets/images/bg_3.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center">

                        <div class="col-md-7 col-sm-12 text-center ftco-animate fadeInUp ftco-animated">
                            <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p>
                        </div>

                    </div>
                </div>
            </div></div><div class="owl-item cloned" style="width: 1903px;"><div class="slider-item" style="background-image: url(http://pizza.loc/assets/images/bg_3.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center">

                        <div class="col-md-7 col-sm-12 text-center ftco-animate fadeInUp ftco-animated">
                            <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p>
                        </div>

                    </div>
                </div>
            </div></div><div class="owl-item active" style="width: 1903px;"><div class="slider-item" style="background-image: url(http://pizza.loc/assets/images/bg_3.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center">

                        <div class="col-md-7 col-sm-12 text-center ftco-animate fadeInUp ftco-animated">
                            <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p>
                        </div>

                    </div>
                </div>
            </div></div><div class="owl-item cloned" style="width: 1903px;"><div class="slider-item" style="background-image: url(http://pizza.loc/assets/images/bg_3.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center">

                        <div class="col-md-7 col-sm-12 text-center ftco-animate fadeInUp ftco-animated">
                            <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p>
                        </div>

                    </div>
                </div>
            </div></div><div class="owl-item cloned" style="width: 1903px;"><div class="slider-item" style="background-image: url(http://pizza.loc/assets/images/bg_3.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center">

                        <div class="col-md-7 col-sm-12 text-center ftco-animate fadeInUp ftco-animated">
                            <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
        <div class="owl-nav disabled">
            <button role="presentation" class="owl-prev">
                <span class="ion-md-arrow-back"></span>
            </button>
            <button role="presentation" class="owl-next">
                <span class="ion-chevron-right"></span>
            </button>
        </div>
        <div class="owl-dots disabled">
            <button class="owl-dot active"><span></span></button>
        </div>
    </section>
        
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center fadeInUp ftco-animated">
                <h2 class="mb-4">Cart</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
    </div>
    <div class="container items">
       
    </div>
    <form action="{{ route('cart') }}" method="post">
        <div class="order-wrapper d-flex">
            <input type="submit" value="Order" class="btn btn-primary py-3 px-5">
        </div>
    </form>

</section>

<style>
    .order-wrapper{
        justify-content: center;
    }
    
    .btn.btn-primary {
        background: #fac564;
        border: 1px solid #fac564;
        color: #000;
    }    
    
    .order-goods-item{
        margin-top: 10px;
    }
    
    .order-goods-item .img{
        height: 200px;
        width: 200px;
        object-fit: cover;
    }
    
    .order-goods-item .text{
        padding: 0 20px;
    }
    
    .description{
        flex-basis: 60%;
    }
    
    .dec-inc{
        height: 35px;
        align-self: center;      
    }
    
    .dec-inc input{
        background: #fff;
        text-align: center;
        font-weight: 600;
        width: 35px;
        margin: 0 5px;
    }
    
    .delete{
        cursor: pointer;
        margin-left: 20px;
        align-self: center;
    }
    
    .delete i{
        color: #fac564;
    }
    
    .basket_num_buttons {
        cursor: pointer;
        width: 35px;
        height: 35px;
        font-weight: 600;
        border: 1px solid #000;
        margin: 0 5px;
        display: inline-block;
        color: #FFF;
        background: #000;
        text-align: center;
        cursor: pointer;
        font-size: 19px;
    }
</style>

<script>
    function cartItemTpl(item){
        var tpl = `
            <div class="order-goods-item d-flex" data-id="`+item.id+`">
                <img src="` + item.image + `" class="img" alt="">
                <div class="text description">
                    <h3>`+item.name+`</h3>
                    <p>`+item.description+`</p>  
                    <span>`+item.price+` р.</span>
                </div>
                <div class="dec-inc d-flex">
                    <div class="basket_num_buttons minus">-</div>
                    <input type="text" value="`+item.quantity+`" disabled>
                    <div class="basket_num_buttons plus">+</div>
                </div>
                <div class="delete">
                    <i class="fa fa-2x fa-trash" aria-hidden="true"></i>
                </div>           
            </div>
        `;        
        
        return tpl;
    }
    
    $(document).ready(function(){
        var cart = getCart();
        
        if (cart.length == 0){ 
            $('.order-wrapper').remove();
        } else {
            cart.items.forEach(function (item) {
                $('.items').append(cartItemTpl(item));
                $('div[data-id="'+item.id+'"').find('.delete').on('click', function(){
                    removeFromCart($(this));
                });
                
                $('div[data-id="'+item.id+'"').find('.plus').on('click', function(){
                    cartItemInc($(this));
                });
                var count = $('div[data-id="'+item.id+'"').find('input[type="text"]').val();
                
                if (count > 1){
                    $('div[data-id="'+item.id+'"').find('.minus').on('click', function(){
                        cartItemDec($(this));
                    });
                }
                
            });
        }       
    });
</script>
@endsection