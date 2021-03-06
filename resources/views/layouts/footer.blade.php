<footer class="ftco-footer bg-light ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Menu</h2>
                    <ul class="list-unstyled">
                        <li><a href="/" class="py-2 d-block">Home</a></li>
                        <li><a href="/shop" class="py-2 d-block">Product</a></li>
                        <li><a href="/custom" class="py-2 d-block">Custom Order</a></li>
                    </ul>
                </div>
            </div>
            @if (isset(\App\Models\profile::all()->last()->ig))
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">{{\App\Models\profile::all()->last()->address}}</span></li>
                            <li><span class="icon icon-phone"></span><span class="text">{{\App\Models\profile::all()->last()->telepon}}</span></li>
                            <li><span class="icon icon-envelope"></span><span class="text">{{\App\Models\profile::all()->last()->email}}</span></li>
                            <li><a href="https://www.instagram.com/{{\App\Models\profile::all()->last()->ig}}/" target="_blank"><span class="icon icon-instagram"></span><span class="text">{{\App\Models\profile::all()->last()->ig}}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | Team Bluzz x Kelompok7 Team
                </p>
            </div>
        </div>
    </div>
</footer>