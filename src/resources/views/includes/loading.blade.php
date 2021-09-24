<div id="loading" class="hidden">
    <div class="loader-container">
        <div class="loader">Loading...</div>
    </div>
</div>

<style>

    #loading {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        height: 100vh;
        width: 100vw;
        background: rgba(0, 0, 0, .6);
        z-index: 9999999;
    }

    #loading.hidden {
        display: none;
    }

    #loading.visible {
        -ms-flex-align: center !important;
        align-items: center !important;
        -ms-flex-pack: center !important;
        justify-content: center !important;
        display: -ms-flexbox !important;
        display: flex !important;
    }

    .loader,
    .loader:before,
    .loader:after {
        background: #ffffff;
        -webkit-animation: load1 1s infinite ease-in-out;
        animation: load1 1s infinite ease-in-out;
        width: 1em;
        height: 4em;
    }

    .loader {
        color: #ffffff;
        text-indent: -9999em;
        margin: 88px auto;
        position: relative;
        font-size: 11px;
        -webkit-transform: translateZ(0);
        -ms-transform: translateZ(0);
        transform: translateZ(0);
        -webkit-animation-delay: -0.16s;
        animation-delay: -0.16s;
    }

    .loader:before,
    .loader:after {
        position: absolute;
        top: 0;
        content: '';
    }

    .loader:before {
        left: -1.5em;
        -webkit-animation-delay: -0.32s;
        animation-delay: -0.32s;
    }

    .loader:after {
        left: 1.5em;
    }

    @-webkit-keyframes load1 {
        0%,
        80%,
        100% {
            box-shadow: 0 0;
            height: 4em;
        }
        40% {
            box-shadow: 0 -2em;
            height: 5em;
        }
    }

    @keyframes load1 {
        0%,
        80%,
        100% {
            box-shadow: 0 0;
            height: 4em;
        }
        40% {
            box-shadow: 0 -2em;
            height: 5em;
        }
    }

</style>
