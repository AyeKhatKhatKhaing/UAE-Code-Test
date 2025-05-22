<!DOCTYPE html>
<html lang="en">
<head>
    <base href="">
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ asset('backend/icon.svg') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('backend/icon.svg') }}" type="image/x-icon">

    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/custom_style.css') }}" rel="stylesheet" type="text/css" />

    @stack('style')
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            @include('layouts.sidebar')
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('layouts.header')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="toolbar" id="kt_toolbar">
                        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">@yield('breadcrumb')
                                </h1>
                                <span class="h-20px border-gray-300 border-start mx-4"></span>
                                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                                    <li class="breadcrumb-item text-muted">
                                        @yield('breadcrumb-info')
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="post flex-column-fluid" id="kt_post">
                        @yield('content')
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
            </svg>
        </span>
    </div>
    <script>var hostUrl = "assets/";</script>
    <script src="{{ asset('backend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/axios.js') }}"></script>
    <script src="{{ asset('backend/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('backend/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('backend/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('backend/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('backend/js/custom/apps/customers/list/list.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.12/tinymce.min.js"></script>

    <script>
        function clearSearch() {
            $('.search-box').val('');

            $('.filter-clear-form').submit();
        }
    </script>
    
    <script>
        $('.show_confirm_delete').click(function(e) {
            e.preventDefault();
            let form = $(this).parent();
            Swal.fire({
                html: `Are you sure you want to delete?`,
                icon: "warning",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Delete",
                cancelButtonText: 'Cancel',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    </script>
    
    <script>
        var editor = {
            path_absolute : "/",
            selector: "textarea.editor",
            height: "250px",
            setup: function (editor) {
                editor.on('change', function (e) {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime nonbreaking save table directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "fontsizeselect | forecolor backcolor | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code link image",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor.path_absolute + 'filemanager?field_name=' + field_name;
            if (type == 'media') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        },
        
    };

    tinymce.init(editor);
    </script>
    <script>
        $('#fileInput').on('change', function (event) {
            const files = event.target.files;
            const preview = $('#preview');
            const maxFileSize = 5 * 1024 * 1024; // 5MB
            let validFiles = [];
            let hasOversized = false;
    
            preview.empty();
    
            Array.from(files).forEach(file => {
                if (file.size > maxFileSize) {
                    hasOversized = true;
                    Swal.fire({
                        icon: 'warning',
                        title: 'File too large',
                        html: `<strong>${file.name}</strong> is larger than 5MB and was not added.`,
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-warning'
                        },
                        buttonsStyling: false
                    });
                } else {
                    validFiles.push(file);
                }
            });
    
            if (hasOversized) {
                $(this).val('');
                return;
            }
    
            // Preview valid files
            validFiles.forEach(file => {
                const fileType = file.type;
                const reader = new FileReader();
    
                reader.onload = function (e) {
                    const col = $('<div class="col-md-8"></div>');
                    const card = $('<div class="border rounded p-2 shadow-sm bg-white"></div>');
    
                    if (fileType.startsWith('image/')) {
                        const img = $(`<img src="${e.target.result}" class="img-fluid rounded" alt="Image Preview">`);
                        card.append(img);
                    } else if (fileType.startsWith('video/')) {
                        const video = $(`
                            <video controls class="w-100 rounded">
                                <source src="${e.target.result}" type="${fileType}">
                                Your browser does not support the video tag.
                            </video>`);
                        card.append(video);
                    }
    
                    col.append(card);
                    preview.append(col);
                };
    
                reader.readAsDataURL(file);
            });
        });
    </script>
    @stack('scripts')
    <x-toastr-message />
</body>
</html>
