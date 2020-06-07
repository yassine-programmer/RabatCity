

<style>
    a {
        text-decoration: none;
        color: inherit;
    }

    .cta {
        position: relative;
        margin: auto;
        padding: 19px 22px;
        transition: all 0.2s ease;
    }
    .cta:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        border-radius: 28px;
        background: rgba(201, 186, 218, 1);
        width: 56px;
        height: 56px;
        transition: all 0.3s ease;
    }
    .cta span {
        position: relative;
        font-size: 16px;
        line-height: 18px;
        font-weight: 900;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        vertical-align: middle;
    }
    .cta svg {
        position: relative;
        top: 0;
        margin-left: 10px;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke: #111;
        stroke-width: 2;
        transform: translateX(-5px);
        transition: all 0.3s ease;
    }
    .cta:hover:before {
        width: 100%;
        background: rgba(201, 186, 218, 1);
    }
    .cta:hover svg {
        transform: translateX(0);
    }
    .cta:active {
        transform: scale(0.96);
    }
    .MyBanner{
        height: 190px;
        max-width: 100%;
        margin-bottom: 25px;
        border:1px solid #dc3545 !important;
        box-shadow: 1px 1px 20px #dc3545;

    }
</style>


    <div class="row bg-danger MyBanner">
        <div class="col-8">
            <div class="container mt-4">
                <h3 class="text-center text-white">Voulez-vous nous Contacter ? Vous avez des questions ?</h3>
                <h6 class="text-center text-white">Le support Rabat City est disponible pour vous repondre , et lever toute ambiguïté .   </h6>
            </div>
        </div>
        <div class="col-4">
            <div class="container mt-5 ml-4">
                <a href="/#contact" class="text-white cta">
                    <span>Contactez-Nous</span>
                    <svg width="13px" height="10px" viewBox="0 0 13 10">
                        <path d="M1,5 L11,5"></path>
                        <polyline points="8 1 12 5 8 9"></polyline>
                    </svg>
                </a>
            </div>
        </div>

    </div>
