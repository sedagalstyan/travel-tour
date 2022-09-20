<!-- Footer -->
<footer>
    <div class="footer-wrapper">
        <div class="contact">
            <h2>{{__('contact_title')}}</h2>
            <div class="contact-info">
                <div class="address"><a href="https://goo.gl/maps/BfYVSTcdGdZVUEdG9" target="_blank">{{__('address')}}</a></div>
                <div class="phone"><a href="tel:010-55-55-55">{{__('phone')}}</a></div>
                <div class="mail"><a href="mailto:contact@traveltour.com">{{__('mail')}}</a></div>
            </div>
            <div class="social-media">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-telegram-plane"></i></a>
            </div>
        </div>
        <div class="footer-destinations">
            <h2>{{__('destination_title')}}</h2>
            <div class="card-container">
                @foreach($destinations as $destination)
                    <div class="card">
                        <a href="{{route('locale.destination', ['locale' => app()->getLocale(), 'slug' => $destination->slug])}}">
                            <div class="background-overlay"></div>
                            <img src="{{ asset('/storage/images/destinations/'.$destination['img'].'') }}" alt="{{$destination['slug']}}">
                            <div class="title">{{$destination['title_'.app()->getLocale().'']}}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="payment">
            <h2>{{__('payment_title')}}</h2>
            <div class="payment-descr">{{__('payment_descr')}}</div>
            <div class="payment-methods">
                <img src="/images/payment/payment-methods.png" alt="payment-methods">
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="copyright">&#169; {{__('copyright')}}</div>
        <div class="author">{{__('created')}}<span class="heart"><i class="fas fa-heart"></i></span><a href="">{{__('by')}}</a></div>
    </div>
</footer>