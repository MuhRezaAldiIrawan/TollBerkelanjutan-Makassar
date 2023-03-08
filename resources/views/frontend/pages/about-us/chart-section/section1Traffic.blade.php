<style>
    @media only screen and (max-width: 767px) {

        /* For tablets: */
        /* .scr-phone {display: inline;} */
        .traffic-phone1 {
            width: 650px;
        }

        .title-phone {
            font-size: 20px;
        }
    }


    a {
        text-decoration: none;
        color: #000000;
    }

    a:hover {
        color: #222222
    }

    /* Dropdown */

    .dropdown {
        display: inline-block;
        position: relative;
    }

    .dd-button {
        display: inline-block;
        border: 2px solid rgb(216, 216, 216);
        border-radius: 4px;
        padding: 10px 30px 10px 20px;
        background-color: #ffffff;
        cursor: pointer;
        white-space: nowrap;
    }

    .dd-button:after {
        content: '';
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid black;
    }

    .dd-button:hover {
        background-color: #eeeeee;
    }


    .dd-input {
        display: none;
    }

    .dd-menu {
        position: absolute;
        z-index: 1;
        top: 100%;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 0;
        margin: 2px 0 0 0;
        box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
        list-style-type: none;
    }

    .dd-input+.dd-menu {
        display: none;
    }

    .dd-input:checked+.dd-menu {
        display: block;
    }

    .dd-menu li {
        padding: 10px 20px;
        cursor: pointer;
        white-space: nowrap;
    }

    .dd-menu li:hover {
        background-color: #f6f6f6;
    }

    .dd-menu li a {
        display: block;
        margin: -10px -20px;
        padding: 10px 20px;
    }

    .dd-menu li.divider {
        padding: 0;
        border-bottom: 1px solid #cccccc;
    }
</style>

<div class="card shadow-sm rounded shadow-sm p-3">
    {{-- header --}}
    <div class="card-body">
    <h3 class="title-phone"><strong>{{ $title }}</strong></h3>
    <h6 id="subtitle">Periode {{ $currentMonthFullName }} {{ $currentYear }}</h6><br>
    {{-- end header --}}

    <div class="row align-items-center">
        {{-- chart --}}
        <div class="container  align-items-center col-12"
            style="overflow: auto; white-space: nowrap; overflow-y: hidden;">
                    {!! $graph->container() !!}
            </div>
        </div>
     </div>
    </div>
</div>


{{-- Function --}}
<script src="{{ $graph->cdn() }}"></script>
{{-- end function --}}

{{ $graph->script() }}