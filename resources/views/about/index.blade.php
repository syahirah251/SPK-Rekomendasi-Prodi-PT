@extends('layouts.app')

@section('title', 'About Page')

@section('content')
<section class="about section-padding pb-0" id="about">
    <div class="container">
        <div class="row">

            <div class="col-lg-10 mx-auto col-md-10 col-12">
                <div class="about-info">

                    <h2 >Sistem Pendukung Keputusan <strong>Metode </strong> pada Siswa SMAN Kelas 12 </h2>

                    <p >Total 5 HTML pages are included in this template from TemplateMo
                        website. Please check 2 <a>blog</a> pages, <a>project</a> page, and <a>contact</a> page.
                        <br><br>You are <strong>allowed</strong> to use this template for commercial or non-commercial
                        purpose. You are NOT allowed to redistribute the template ZIP file on template collection
                        websites.</p>
                </div>

                <div class="about-image" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('images/office.png') }}" class="img-fluid" alt="office">
                </div>
            </div>

        </div>
    </div>
</section>

@include('includes.footer')

@endsection
