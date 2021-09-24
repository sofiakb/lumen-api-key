<html>
    <head>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" rel="stylesheet"/>


        <style>

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            html, body {
                font-family: 'Lato', sans-serif;
                margin: 0;
            }

            .--psf__main-container {
                width: 100%;
                max-width: 960px;
                margin: 0 auto;
                padding: 0 20px;
                box-sizing: border-box;
            }

            @media (min-width: 400px) {
                .--psf__main-container {
                    width: 80%;
                    max-width: 80%;
                    padding: 0;
                }
            }

            .--psf__table-container {
                position: relative;
                padding-top: 60px;
                background-color: #fff;
                margin-top: 60px;
                margin-bottom: 110px;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 0 40px 0 rgba(0, 0, 0, .15);
                -moz-box-shadow: 0 0 40px 0 rgba(0, 0, 0, .15);
                -webkit-box-shadow: 0 0 40px 0 rgba(0, 0, 0, .15);
                -o-box-shadow: 0 0 40px 0 rgba(0, 0, 0, .15);
                -ms-box-shadow: 0 0 40px 0 rgba(0, 0, 0, .15);
            }

            .--psf__table-head {
                position: absolute;
                width: 100%;
                top: 0;
                left: 0;
                box-shadow: 0 5px 20px 0 rgba(0, 0, 0, .1);
                -moz-box-shadow: 0 5px 20px 0 rgba(0, 0, 0, .1);
                -webkit-box-shadow: 0 5px 20px 0 rgba(0, 0, 0, .1);
                -o-box-shadow: 0 5px 20px 0 rgba(0, 0, 0, .1);
                -ms-box-shadow: 0 5px 20px 0 rgba(0, 0, 0, .1);
            }

            .--psf__table {
                width: 100%;
                border-collapse: collapse;
            }

            .--psf__table thead th {
                font-weight: 700;
                font-size: 16px;
                color: #fa4251;
                line-height: 1.4;
                background-color: transparent;
                /*padding-top: 18px;
                padding-bottom: 18px;
                padding-left: 5px;
                padding-right: 5px;*/
                padding: 18px 5px;
            }

            .--psf__table th, .psf__table td {
                font-weight: unset;
                padding-right: 10px;
            }

            .--psf__table th {
                text-align: left;
            }

            .--psf__table-body {
                max-height: 750px;
                overflow: auto;
            }

            .--psf__table-body tr {
                border-bottom: 1px solid #f2f2f2;
            }

            .--psf__table-body td {
                font-weight: 400;
                font-size: 12px;
                color: gray;
                line-height: 1.4;
                /*padding-top: 16px;
                padding-bottom: 16px;
                padding-left: 5px;
                padding-right: 5px;*/
                padding: 16px 5px;
            }

            .--psf__table-body.js-scroll {
                position: relative;
                overflow: hidden;
            }

            .--psf__table-body.ps {
                overflow: hidden !important;
                overflow-anchor: none;
                -ms-overflow-style: none;
                touch-action: auto;
                -ms-touch-action: auto;
            }

            .text-center {
                text-align: center !important;
            }

            .--psf__table-icon-action {
                -ms-flex-align: center !important;
                align-items: center !important;
                -ms-flex-pack: center !important;
                justify-content: center !important;
                /*display: -ms-flexbox !important;*/
                display: inline-flex !important;
                height: 25px;
                width: 25px;
                /*color: #ffffff;*/
                border-radius: 50%;
                margin-left: auto;
                margin-right: auto;
                cursor: pointer;
            }

            .--psf__table-icon-action .material-icons {
                font-size: 14px !important;
            }

        </style>

        <style>
            .blocker {
                background: rgba(0, 0, 0, .5);
            }

            .blocker .modal {
                border-radius: 10px;
                padding-top: 25px;
                box-shadow: 0 0 40px 0 rgba(0, 0, 0, .15);
                -moz-box-shadow: 0 0 40px 0 rgba(0, 0, 0, .15);
                -webkit-box-shadow: 0 0 40px 0 rgba(0, 0, 0, .15);
                -o-box-shadow: 0 0 40px 0 rgba(0, 0, 0, .15);
                -ms-box-shadow: 0 0 40px 0 rgba(0, 0, 0, .15);
            }
        </style>

        {{--<style>
            .gg-trash {
                box-sizing: border-box;
                position: relative;
                display: block;
                transform: scale(var(--ggs, 1));
                width: 10px;
                height: 12px;
                border: 2px solid transparent;
                box-shadow: 0 0 0 2px,
                inset -2px 0 0,
                inset 2px 0 0;
                border-bottom-left-radius: 1px;
                border-bottom-right-radius: 1px;
                margin-top: 4px
            }

            .gg-trash::after,
            .gg-trash::before {
                content: "";
                display: block;
                box-sizing: border-box;
                position: absolute
            }

            .gg-trash::after {
                background: currentColor;
                border-radius: 3px;
                width: 16px;
                height: 2px;
                top: -4px;
                left: -5px
            }

            .gg-trash::before {
                width: 10px;
                height: 4px;
                border: 2px solid;
                border-bottom: transparent;
                border-top-left-radius: 2px;
                border-top-right-radius: 2px;
                top: -7px;
                left: -2px
            }
        </style>
        <style>
            .gg-pen {
                box-sizing: border-box;
                position: relative;
                display: block;
                transform: rotate(-45deg) scale(var(--ggs, 1));
                width: 14px;
                height: 4px;
                border-right: 2px solid transparent;
                box-shadow: 0 0 0 2px,
                inset -2px 0 0;
                border-top-right-radius: 1px;
                border-bottom-right-radius: 1px;
                margin-right: -2px
            }

            .gg-pen::after,
            .gg-pen::before {
                content: "";
                display: block;
                box-sizing: border-box;
                position: absolute
            }

            .gg-pen::before {
                background: currentColor;
                border-left: 0;
                right: -6px;
                width: 3px;
                height: 4px;
                border-radius: 1px;
                top: 0
            }

            .gg-pen::after {
                width: 8px;
                height: 7px;
                border-top: 4px solid transparent;
                border-bottom: 4px solid transparent;
                border-right: 7px solid;
                left: -11px;
                top: -2px
            }
        </style>--}}

    </head>
    <body>


        <div class="--psf__main-container">

            <div class="--psf__table-container">
                {{--            Ajouter une clé--}}
                @isset($keys)
                    <div class="--psf__table-head">
                        <table class="--psf__table">
                            <thead>
                                <tr>
                                    @foreach($headers as $header)
                                        <th style="width: {{ $header->width }}%"
                                            class="{{ isset($header->class) ? $header->class : '' }}">{{ $header->title }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="--psf__table-body js-pscroll ps ps--active-y">
                        <table class="--psf__table">
                            <tbody class="--psf__table-body">
                                @foreach($keys as $row)
                                    <tr data-key="{{ base64_encode(json_encode($row)) }}">
                                        @foreach($row as $index => $col)
                                            @if($index !== 'id')
                                                @if ($col->column === 'active')
                                                    <td style="width: {{ $col->width }}%"
                                                        class="{{ isset($col->class) ? $col->class : '' }}">
                                                        <i class="material-icons"
                                                           style="font-size: 14px">{{ $col->value ? 'done' : 'close' }}</i>
                                                    </td>
                                                @else
                                                    <td style="width: {{ $col->width }}%"
                                                        class="{{ isset($col->class) ? $col->class : '' }}">{{ $col->value }}</td>
                                                @endif
                                            @endif
                                        @endforeach
                                        <td style="width: 10%">
                                            <div class="--psf__table-icon-action" style="color: #0F3551;"
                                                 data-id="{{ $row->id }}"
                                                 data-action="edit">
                                                <i class="material-icons">edit</i>
                                            </div>
                                            <div class="--psf__table-icon-action" style="color: #fa4251"
                                                 data-id="{{ $row->id }}"
                                                 data-action="delete">
                                                <i class="material-icons">delete</i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @endisset
                {{--        </div>--}}
            </div>

        </div>

        @include('ApiKey::includes.modals.edit')

        @include('ApiKey::includes.loading')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
        <script
                src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.20/lodash.min.js"></script>


        <script>

            $(document).ready(function () {
                let tableBody = $('.--psf__table-body.ps');
                if (tableBody && (tableBody = tableBody[0]))
                    new PerfectScrollbar(tableBody);
            })

            const loading = () => {
                $('#loading').toggleClass('hidden visible')
            }

            const isEdit = (key) => {
                const modal = '#modalEditKey'
                $(`${modal} #input-name`).val(_.filter(key, item => item.column === 'name')[0].value)
                $(`${modal} #input-key`).val(_.filter(key, item => item.column === 'key')[0].value)
                $(`${modal} #input-active`).attr('checked', _.filter(key, item => item.column === 'active')[0].value).val(_.filter(key, item => item.column === 'active')[0].value)
                $(`${modal} form#formEditKey`).attr('data-keyID', key.id)
                $(modal).modal('show')
            }

            const isDelete = (keyID) => {
                const url = window.location.href
                if (confirm(`Voulez-vous vraiment supprimer cette clé ?`)) {
                    loading()
                    $.get(`${url}/?method=post&action=destroy&id=${keyID}`, function (data) {
                        if (Boolean(data) === true)
                            window.location.reload()
                    })
                }
            }

            $('.--psf__table-icon-action').click(function () {
                const id = $(this).data('id'), action = $(this).data('action'),
                    key = JSON.parse(atob($(this).parent().parent().data('key')))

                if (action === 'edit')
                    return isEdit(key)
                else if (action === 'delete')
                    return isDelete(parseInt(id))
            })

            $('#modalEditKey .--psf__button#save').click(function () {
                const form = $(`#modalEditKey form#formEditKey`)
                const url = window.location.href, keyID = form.data('keyID') || form.data('keyid'),
                    active = form.find('input#input-active').val(),
                    body = {
                        name: form.find('input#input-name').val(),
                        key: form.find('input#input-key').val(),
                        active: active === false || active === 'false' ? false : true,
                    }

                loading()
                $.get(`${url}/?method=post&action=edit&data=${btoa(JSON.stringify(body))}&id=${keyID}`, function (data) {
                    if (Boolean(data) === true)
                        window.location.reload()
                })
            })

            $('input#input-active').click(function () {
                const current = $(this).val()
                $(this).val(current === false || current === 'false' ? true : false)
            })

        </script>
    </body>
</html>
