<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>VBC</title>
    <!-- Favicon -->
    <link rel="icon" href="{{URL::asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <style>
        div#qrcode {
            transition: transform .2s;
        }

        div#qrcode:hover {
            transform: scale(1.3); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
            cursor: pointer;
        }

        #social_media{
            transition: transform .2s;
        }

        #social_media:hover {
            transform: scale(1.3); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
            cursor: pointer;
        }
    </style>
</head>

<body style="background: rgb(222,222,222);">
    <div class="container-fluid">
        @if ($message = Session::get('error'))
        <div class="row mt-2 justify-content-center align-items-center">
            <div class="col-sm-12 col-md-6 alert alert-danger text-center">
                <h2>{{ $message }}</h2>
            </div>
            
        </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        {{-- card area --}}
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card" style="box-shadow: 0px 4px 20px 0px;">
                    <div class="card"><img class="card-img-top w-100 d-block" src="{{ url('storage/'.$card->photo) }}" style="border-radius: 5px 5px 0px 100px;">
                        <div class="card-body">
                            <div class="row text-center my-5">
                                <div class="col"><a class="btn btn-secondary" href="tel:{{ $card->phone }}" style="border-radius: 37px;padding: 12px;box-shadow: 5px 3px 13px #000000;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone fs-1">
                                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                        </svg></a></div>
                                <div class="col"><a class="btn btn-secondary" href="mailto:{{ $card->email }}" style="padding: 12px;border-radius: 33px;box-shadow: 5px 3px 13px #000000;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" class="fs-1">
                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M0 128C0 92.65 28.65 64 64 64H448C483.3 64 512 92.65 512 128V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V128zM48 128V150.1L220.5 291.7C241.1 308.7 270.9 308.7 291.5 291.7L464 150.1V127.1C464 119.2 456.8 111.1 448 111.1H64C55.16 111.1 48 119.2 48 127.1L48 128zM48 212.2V384C48 392.8 55.16 400 64 400H448C456.8 400 464 392.8 464 384V212.2L322 328.8C283.6 360.3 228.4 360.3 189.1 328.8L48 212.2z"></path>
                                        </svg></a></div>
                                <div class="col"><a class="btn btn-secondary" href="https://www.google.com/maps?q={{ $card->address }}" target="_blank" style="border-radius: 33px;padding: 12px;box-shadow: 5px 3px 13px #000000;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pin-map fs-1">
                                            <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"></path>
                                            <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"></path>
                                        </svg></a></div>
                            </div>
                            <div class="row mb-4 px-4">
                                <div class="col-8">
                                    <h4>Mr. {{ $card->name }} {{ $card->famly_name }}</h4>
                                    <h6 style="color: rgba(33,37,41,0.65);">{{ $card->poste }}</h6>
                                </div>
                                <div class="col-4"><img class="img-fluid" src="{{ url('storage/'.$card->logo) }}"></div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <p>{{ $card->description }}</p>
                                </div>
                            </div>
                            @if ($card->phone != null)
                            <hr>
                            <div class="row px-4">
                                <div class="col-1 align-self-start"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone-fill">
                                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                    </svg></div>
                                <div class="col-11">
                                    <h5>Mobile</h5>
                                    <a href="tel:{{ $card->phone }}" class="btn"><p>{{ $card->phone }}</p></a>
                                </div>
                            </div>                                
                            @endif
                            @if ($card->fix != null)
                            <div class="row px-4">
                                <div class="col-1 align-self-start"><i class="fas fa-fax"></i></div>
                                <div class="col-11">
                                    <h5>Work</h5>
                                    <a href="tel:{{ $card->fix }}" class="btn"><p>{{ $card->fix }}</p></a>
                                </div>
                            </div>                                
                            @endif
                            @if ($card->email != null)
                            <hr>
                            <div class="row px-4">
                                <div class="col-1 align-self-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-envelope-fill">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"></path>
                                    </svg>
                                </div>
                                <div class="col-11">
                                    <h5>E-mail</h5>
                                    <a href="mailto:{{ $card->email }}" class="btn"><p>{{ $card->email }}</p></a>
                                </div>
                            </div>                                
                            @endif
                            @if ($card->website != null)
                            <hr>
                            <div class="row mb-4 px-4">
                                <div class="col-1 align-self-start"><i class="fas fa-link"></i></div>
                                <div class="col-11">
                                    <h5>Website</h5>
                                    <a href="https://{{ $card->website }}">
                                        <p>{{ $card->website }}</p>
                                    </a>
                                </div>
                            </div>                                
                            @endif                            
                            {{-- socia meadia --}}
                            <div class="row justify-content-center align-items-center my-5" style="text-align: center;">
                                @if ($card->fb != null)
                                <div id="social_media" class="col"><a href="{{ $card->fb }}"><i class="fab fa-facebook-square fs-1 text-primary"></i></a></div>                                    
                                @endif
                                @if ($card->insta != null)
                                <div id="social_media" class="col"><a href="{{ $card->insta }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" class="fs-1" style="color: var(--bs-code-color);">
                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M224,202.66A53.34,53.34,0,1,0,277.36,256,53.38,53.38,0,0,0,224,202.66Zm124.71-41a54,54,0,0,0-30.41-30.41c-21-8.29-71-6.43-94.3-6.43s-73.25-1.93-94.31,6.43a54,54,0,0,0-30.41,30.41c-8.28,21-6.43,71.05-6.43,94.33S91,329.26,99.32,350.33a54,54,0,0,0,30.41,30.41c21,8.29,71,6.43,94.31,6.43s73.24,1.93,94.3-6.43a54,54,0,0,0,30.41-30.41c8.35-21,6.43-71.05,6.43-94.33S357.1,182.74,348.75,161.67ZM224,338a82,82,0,1,1,82-82A81.9,81.9,0,0,1,224,338Zm85.38-148.3a19.14,19.14,0,1,1,19.13-19.14A19.1,19.1,0,0,1,309.42,189.74ZM400,32H48A48,48,0,0,0,0,80V432a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V80A48,48,0,0,0,400,32ZM382.88,322c-1.29,25.63-7.14,48.34-25.85,67s-41.4,24.63-67,25.85c-26.41,1.49-105.59,1.49-132,0-25.63-1.29-48.26-7.15-67-25.85s-24.63-41.42-25.85-67c-1.49-26.42-1.49-105.61,0-132,1.29-25.63,7.07-48.34,25.85-67s41.47-24.56,67-25.78c26.41-1.49,105.59-1.49,132,0,25.63,1.29,48.33,7.15,67,25.85s24.63,41.42,25.85,67.05C384.37,216.44,384.37,295.56,382.88,322Z"></path>
                                        </svg></a></div>                                    
                                @endif
                                @if ($card->youtube != null)
                                <div id="social_media" class="col"><a href="{{ $card->youtube }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -32 576 576" width="1em" height="1em" fill="currentColor" class="fs-1" style="color: var(--bs-danger);">
                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path>
                                        </svg></a></div>                                    
                                @endif
                                @if ($card->tiktok != null)
                                <div id="social_media" class="col"><a href="{{ $card->tiktok }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" class="fs-1" style="color: var(--bs-black);">
                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"></path>
                                        </svg></a></div>                                    
                                @endif
                            </div>
                            {{-- add to contact --}}
                            <div class="row justify-content-end my-5">
                                <div class="col text-center">
                                    <form action="{{ route('contacts.store') }}" method="post"> 
                                        @csrf    
                                        <input class="d-none" name="card_id" type="text" value="{{ $card->id }}">                                  
                                        <button type="submit" class="btn btn-outline-warning btn-lg" style="border-radius: 100px;height: 75px;width: 75px;" type="button" data-toggle="tooltip" data-placement="top" title="Add To Contact">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="1em" height="1em" fill="currentColor" class="fs-1">
                                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                <path d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <div class="col text-center">
                                    <form action="{{ route('download') }}" method="post"> 
                                        @csrf    
                                        <input class="d-none" name="card_id" type="text" value="{{ $card->id }}">                                  
                                        <button type="submit" class="btn btn-outline-primary btn-lg" style="border-radius: 100px;height: 75px;width: 75px;" type="button" data-toggle="tooltip" data-placement="top" title="Get VCard">
                                            <svg class="fs-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor">
                                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                <path d="M272 288h-64C163.8 288 128 323.8 128 368C128 376.8 135.2 384 144 384h192c8.836 0 16-7.164 16-16C352 323.8 316.2 288 272 288zM240 256c35.35 0 64-28.65 64-64s-28.65-64-64-64c-35.34 0-64 28.65-64 64S204.7 256 240 256zM496 320H480v96h16c8.836 0 16-7.164 16-16v-64C512 327.2 504.8 320 496 320zM496 64H480v96h16C504.8 160 512 152.8 512 144v-64C512 71.16 504.8 64 496 64zM496 192H480v96h16C504.8 288 512 280.8 512 272v-64C512 199.2 504.8 192 496 192zM384 0H96C60.65 0 32 28.65 32 64v384c0 35.35 28.65 64 64 64h288c35.35 0 64-28.65 64-64V64C448 28.65 419.3 0 384 0zM400 448c0 8.836-7.164 16-16 16H96c-8.836 0-16-7.164-16-16V64c0-8.838 7.164-16 16-16h288c8.836 0 16 7.162 16 16V448z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- qr code show --}}
        <div class="row my-5">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="border border-dark p-2 bg-white" id="qrcode"></div>
            </div>
        </div>
    </div>
    {{-- qr code script --}}
    <script type="text/javascript">
        function downloadURI(uri, name) {
            var link = document.createElement("a");
            link.download = name;
            link.href = uri;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            delete link;
        };

        window.onload = function (){
            // console.log('onload');
            let qrcode = new QRCode(document.getElementById("qrcode"),
                {
                    text: "{{ 'http://10.0.1.200/vbc-v2/public/cards/'.$card->id }}",
                    width: 250,
                    height: 250,
                    margin : 25,
                    colorDark : "#000000",
                    colorLight : "#ffffff",
                    correctLevel : QRCode.CorrectLevel.H
                });  
                document.getElementById("qrcode").addEventListener("click", myFunction);
                function myFunction() {
                    let dataUrl = document.querySelector('#qrcode').querySelector('img').src;
                    downloadURI(dataUrl, 'qrcode.png');
                }
            };
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>