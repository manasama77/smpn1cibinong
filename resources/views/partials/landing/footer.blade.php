<footer id="footer">

    {{-- <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>{{ config('app.name') }}</h3>
                    <p>
                        Jl. Mayor Oking Jayaatmaja No.71 Cibinong Kaabupaten Bogor <br><br>
                        <strong>Email:</strong> <a href="mailto:halo@smpn1cibinong.sch.id">halo@smpn1cibinong.sch.id</a>
                        <br>
                        <strong>No Telepon:</strong> <a href="tel:0218752043">0218752043</a>
                    </p>
                </div>

                <div class="col-lg-2 offset-lg-7 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('home') }}">Beranda</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Profile Sekolah</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Informasi Kegiatan</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Galeri</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Login</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div> --}}

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>{{ config('app.developer') }}</span></strong> 2023. All Rights Reserved
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="https://www.instagram.com/satoecibinong/" class="instagram"><i class="bx bxl-instagram"></i></a>
            {{-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a> --}}
            {{-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> --}}
        </div>
    </div>
</footer>
