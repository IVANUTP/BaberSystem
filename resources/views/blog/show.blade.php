  <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach ($blogs as $blog)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{ asset('storage/' . $blog->imagen) }}"
                                        alt="">

                                </div>
                                <div class="blog_details">

                                    <h2 class="blog-head" style="color: #2d2d2d;">
                                        {{ $blog->titulo }}</h2>

                                    <p>{{ $blog->descripcion }}</p>
                                    <ul class="blog-info-link">
                                        <li>
                                            <p href="#"><i class="fa fa-user"></i>Autor no indispensable</p>
                                        </li>
                                        <li>
                                            <p href="#"><i class="fa fa-comments"></i> 03 Comentarios</p>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
                <x-blog-list />
            </div>
        </div>
    </section>
