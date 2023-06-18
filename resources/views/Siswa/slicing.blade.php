@extends('layouts.master')

@section('content')
    <section class="main-ujian">
        <div class="d-flex flex-row justify-content-between px-5">
            <div class="col-8 px-3">
                <div class="card w-full">
                    <div class="card-body">
                        <h5 class="card-title">Test : UAS BIOLOGI</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Kelas 10 IPA 2</h6>
                        <hr>
                        {{-- Soal --}}
                        <p class="text-muted"><span>Soal <span>1</span> Dari <span>20</span></span></p>
                        <p class="card-text" style='white-space: pre-line;'>Lorem ipsum, dolor sit amet consectetur
                            adipisicing elit. Officiis
                            exercitationem eos nulla molestias perferendis dolores laudantium harum, tempore iure in est.
                            Cupiditate facilis nam accusamus inventore nobis, voluptatum modi labore?</p>
                        <div class="col text-start">
                            <img src="https://cdn1-production-images-kly.akamaized.net/2jNeciXyH193r7jxfoUuzfeLlPg=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1439641/original/042027300_1482131661-reddit.jpg"
                                class="card-img-top" style="width: 50%; max-width: 100%; height:auto;" alt="...">
                        </div>
                        {{-- Container jawaban --}}
                        <div class="col text-start py-4">
                            {{-- Pilihan jawaban --}}
                            <div class="d-flex flex-row mt-2 align-items-start inline">
                                <div class="col-1" style="width: 13px">
                                    <input type="radio" id="radioButton" name="radioGroup" class="mt-1"
                                        style="width: 15px">
                                </div>
                                <div class="col-11">
                                    <div class="d-flex flex-row">
                                        <label for="radioButton" class="ms-3">A. </label>
                                        <p class="ms-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat
                                            optio
                                            odit.</p>
                                    </div>
                                    <img src="https://cdn1-production-images-kly.akamaized.net/2jNeciXyH193r7jxfoUuzfeLlPg=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1439641/original/042027300_1482131661-reddit.jpg"
                                        class="card-img-top ms-3" style="width: 50%; max-width: 100%; height:auto;"
                                        alt="...">

                                </div>
                            </div>
                            {{-- Pilihan jawaban --}}
                            <div class="d-flex flex-row mt-2 align-items-start inline">
                                <div class="col-1" style="width: 13px">
                                    <input type="radio" id="radioButton" name="radioGroup" class="mt-1"
                                        style="width: 15px">
                                </div>
                                <div class="col-11">
                                    <div class="d-flex flex-row">
                                        <label for="radioButton" class="ms-3">A. </label>
                                        <p class="ms-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat
                                            optio
                                            odit.</p>
                                    </div>
                                    <img src="https://cdn1-production-images-kly.akamaized.net/2jNeciXyH193r7jxfoUuzfeLlPg=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1439641/original/042027300_1482131661-reddit.jpg"
                                        class="card-img-top ms-3" style="width: 50%; max-width: 100%; height:auto;"
                                        alt="...">

                                </div>
                            </div>
                            {{-- Pilihan jawaban --}}
                            <div class="d-flex flex-row mt-2 align-items-start inline">
                                <div class="col-1" style="width: 13px">
                                    <input type="radio" id="radioButton" name="radioGroup" class="mt-1"
                                        style="width: 15px">
                                </div>
                                <div class="col-11">
                                    <div class="d-flex flex-row">
                                        <label for="radioButton" class="ms-3">A. </label>
                                        <p class="ms-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat
                                            optio
                                            odit.</p>
                                    </div>
                                    <img src="https://cdn1-production-images-kly.akamaized.net/2jNeciXyH193r7jxfoUuzfeLlPg=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1439641/original/042027300_1482131661-reddit.jpg"
                                        class="card-img-top ms-3" style="width: 50%; max-width: 100%; height:auto;"
                                        alt="...">

                                </div>
                            </div>
                            {{-- Pilihan jawaban --}}
                            <div class="d-flex flex-row mt-2 align-items-start inline">
                                <div class="col-1" style="width: 13px">
                                    <input type="radio" id="radioButton" name="radioGroup" class="mt-1"
                                        style="width: 15px">
                                </div>
                                <div class="col-11">
                                    <div class="d-flex flex-row">
                                        <label for="radioButton" class="ms-3">A. </label>
                                        <p class="ms-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat
                                            optio
                                            odit.</p>
                                    </div>
                                    <img src="https://cdn1-production-images-kly.akamaized.net/2jNeciXyH193r7jxfoUuzfeLlPg=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1439641/original/042027300_1482131661-reddit.jpg"
                                        class="card-img-top ms-3" style="width: 50%; max-width: 100%; height:auto;"
                                        alt="...">

                                </div>
                            </div>
                            {{-- Pilihan jawaban --}}
                            <div class="d-flex flex-row mt-2 align-items-start inline">
                                <div class="col-1" style="width: 13px">
                                    <input type="radio" id="radioButton" name="radioGroup" class="mt-1"
                                        style="width: 15px">
                                </div>
                                <div class="col-11">
                                    <div class="d-flex flex-row">
                                        <label for="radioButton" class="ms-3">A. </label>
                                        <p class="ms-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat
                                            optio
                                            odit.</p>
                                    </div>
                                    <img src="https://cdn1-production-images-kly.akamaized.net/2jNeciXyH193r7jxfoUuzfeLlPg=/1280x720/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1439641/original/042027300_1482131661-reddit.jpg"
                                        class="card-img-top ms-3" style="width: 50%; max-width: 100%; height:auto;"
                                        alt="...">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 px-4 ms-4">
                <div class="card w-full">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between inline align-items-center">
                            <h5 class="card-title">Waktu <span>{{ '(30 Menit)' }}</span></h5>
                            <button class="btn btn-danger btn-sm" style="height: 35px">Selesai</button>
                        </div>
                        <div class="container border border-grey rounded text-center align-items-center ">

                            <h6 class="fs-5 text-black mt-3">00:17:00</h6>
                        </div>
                    </div>
                </div>
                <div class="card w-full">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <h5 class="card-title">Soal</h5>
                        </div>
                        <div class="container border border-grey rounded justify-content-start py-2 px-2">
                            <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                            <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                            <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                            <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                            <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                            <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                            <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                            <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                            <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                            <button class="btn btn-primary btn-sm px-3 mt-2 ms-2">1</button>
                        </div>
                        <div class="d-flex flex-column py-3">
                            <span class="badge bg-primary w-50">Sudah Dijawab</span>
                            <span class="badge bg-danger w-50 mt-2">Belum Dijawab</span>
                            <span class="badge bg-success w-50 mt-2">Soal Saat ini</span>
                            <span class="badge text-primary w-50 mt-2" style="  background-color: #f2f4f7; 
">Belum
                                Dikerjakan</span>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
