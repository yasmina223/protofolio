
<section class="home align-center" id="home">
    <div class="container">
        <div class="row align-center">
            <div class="home-text">
                <p>Hello, I'm</p>
                <h1> {{$settings[0]->name}}</h1>
                <h2>{{$settings[0]->jop_name}}</h2><a class="btn link-item" href="{{ url("#about") }}">more about me</a>
            </div>
            <div class="home-img"><img src="{{ asset("asset_front/images/feeling-proud.svg") }}" alt="Photo"><img
                    src="{{ asset("asset_front/images/programming.svg") }}" alt="Photo 2"></div>
        </div>
    </div>
</section><!-- Start About Section-->
<section class="about sec-pad" id="about">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2>about me</h2>
            </div>
        </div>
        <div class="row">
            <div class="about-img"><img src="{{ asset("asset_front/images/profile.svg") }}" alt="About Image"><img
                    src="{{ asset("asset_front/images/source_code.svg") }}" alt="About Image"></div>
            <div class="about-text">
                <p>Hello!<br>My name is {{$settings[0]->name}},<br>{{$settings[0]->description}}.
                </p>
                <h3>skills</h3>

                <div class="skills">
                    @foreach ($skills as $s )
                    <div class="skill-item">{{$s->skills}}</div>
                    @endforeach

                </div>
                <div class="about-tabs"><button class="tab-item active" type="button"
                        data-target="#education">online Cources</button><button class="tab-item" type="button"
                        data-target="#experience">experience</button></div>
                        <!-- Start Education-->
                <div class="tab-content active" id="education">
                    <div class="timeline">
                        @foreach ($courses as $c)
                        <div class="timeline-item">
                            <h4>{{$c->name}} -<span>{{$c->description}}</span></h4>
                        </div>
                        @endforeach

                    </div>
                </div><!-- Start Experience-->
                <div class="tab-content" id="experience">
                    <div class="timeline">
                        @foreach ($experiences as $e)

                        <div class="timeline-item"><span class="date">{{$e->from_date}}-{{$e->to_date}}</span>
                            <h4>{{$e->position}} - <span>{{$e->company}}({{$e->status}})</span></h4>
                        </div>
                        @endforeach
                    </div>
                   
                </div><a class="btn" href="{{ url("cv.pdf") }}" target="_blank">download cv</a><a class="btn link-item"
                    href="{{ url("#contact") }}">contact me</a>
            </div>
        </div>
    </div>
</section><!-- Start Contact Section-->
<section class="contact sec-pad" id="contact">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2>contact me</h2>
            </div>
        </div>
        <div class="row">
            <div class="contact-form">
                <form action="{{route('data.store')}}" method="POST" >
                    <div class="row">
                        {{ csrf_field() }}
                        <div class="inp-grp"><input class="inp-control" type="text" name="name" id="name" required
                                placeholder="Name"></div>
                        <div class="inp-grp"><input class="inp-control" type="email" name="email"  id="email" required
                                placeholder="Email"></div>
                        <div class="inp-grp"><input class="inp-control" type="text" name="phone"  id="phone" required
                                placeholder="Phone"></div>
                        <div class="inp-grp"><textarea class="inp-control" required name="message" id="message"
                                placeholder="Message"></textarea></div>
                        <div class="sub-btn"><button class="btn" type="submit">Send Message</button></div>
                    </div>
                </form>
            </div>
            <div class="contact-info">
                <div class="info-item">

                    <h3>email</h3>
                    <p>{{$settings[0]->email}}</p>

                </div>
                <div class="info-item">

                    <h3>phone</h3>
                    <p>{{$settings[0]->phone}}</p>

                </div>

                <div class="info-item">
                    <h3>follow me</h3>
                    <div class="socila">
                        @foreach ($social as $s)
                            <a href="{{$s->link}}" target="_blank">
                                <!--<i class="fab fa-facebook-f"></i>-->
                                <img src="{{ asset($s->image) }}"
                            </a>
                        @endforeach
                            <!--<a href="https://github.com/AhmedNiazy309/" target="_blank">-->
                            <!--<i class="fab fa-github"></i>-->
                            <!--</a>-->
                            <!--<a href="https://www.linkedin.com/in/ahmed-alsolya-ab0782184/" target="_blank">-->
                            <!--    <i class="fab fa-linkedin-in"></i>-->
                            <!--</a>-->
                            <!--<a href="https://codepen.io/DocTorWeB121" target="_blank">-->
                            <!--    <i class="fab fa-codepen"></i>-->
                            <!--</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<div class="portfolio-popup">
    <div class="pp-inner">
        <div class="pp-content">
            <div class="pp-header"><button class="btn pp-close" type="button"><i class="fas fa-times"></i></button>
                <div class="pp-thumb"><img src="{{ asset("asset_front/images/portfolio/1.jpg") }}"></div>
                <h3></h3>
            </div>
            <div class="pp-body"></div>
        </div>
    </div>
</div>
