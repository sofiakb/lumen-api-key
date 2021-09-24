<div id="modalEditKey" class="modal" style="position: relative">

    <div class="modal-body">
        <form id="formEditKey" method="POST">

            <div class="--psf__form-group required">
                <label for="input-key" class="input-label">Clé d'API</label>
                <input type="text" id="input-key" name="input-key">
            </div>

            <div class="--psf__form-group required">
                <label for="input-name" class="input-label">Nom de la clé</label>
                <input type="text" id="input-name" name="input-name">
            </div>

            <div class="--psf__form-group required">
                <label for="input-active" class="input-label">Active</label>
                <input type="checkbox" id="input-active" name="input-active">
            </div>

        </form>
    </div>

    <div class="modal-footer">
        <button class="--psf__button" id="save" style="background: #fa4251; margin-left: 5px; margin-right: 5px">
            Enregistrer
        </button>
        <a href="#" rel="modal:close">
            <button class="--psf__button" id="cancel"
                    style="background: grey; margin-left: 5px; margin-right: 5px">
                Annuler
            </button>
        </a>
    </div>
</div>

<style>

    .--psf__form-group {
        display: block;
        margin-bottom: 20px;
    }

    .--psf__form-group input[type=text] {
        width: 100%;
        border-radius: 10px;
        -webkit-appearance: none;
        outline: none;
        padding: 10px 15px;
        border: 1px solid #fa4251;
    }

    .--psf__form-group .input-label {
        display: block;
        position: relative;
        color: grey;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .--psf__form-group.required .input-label:after {
        content: '*';
        margin-left: 3px;
        color: #fa4251;
    }

    .--psf__button {
        /*width: 100%;*/
        border-radius: 10px;
        -webkit-appearance: none;
        outline: none;
        padding: 10px 15px;
        border: none !important;
        color: #ffffff;
        cursor: pointer;
    }

    .modal-body {
        margin-bottom: 50px;
    }

    .modal-footer {
        position: absolute;
        /*background: #000;*/
        left: 0;
        bottom: -25px;
        right: 0;
        height: 50px;
        z-index: 111111;
        -ms-flex-align: center !important;
        align-items: center !important;
        -ms-flex-pack: center !important;
        justify-content: center !important;
        display: -ms-flexbox !important;
        display: flex !important;
        /*flex-direction: column;*/
    }

</style>
