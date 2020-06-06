<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }


    .Topcontainer {
        position: fixed;
        margin: auto;
        bottom: 0;
        right: -100px;
        width: 300px;
        height: 100px;
        z-index: 201;
    }
    .Topcontainer .top {
        position: absolute;
        margin: auto;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 50px;
        background: crimson;
        border-radius: 50%;
        transition: all 1s;
        z-index: 4;
        box-shadow: 0 0 25px 0 rgba(0, 0, 0, 0.4);
    }
    .Topcontainer .top:hover {
        cursor: pointer;
    }
    .Topcontainer .top::before {
        content: "";
        position: absolute;
        margin: auto;
        top: 22px;
        right: 0;
        bottom: 0;
        left: 22px;
        width: 12px;
        height: 2px;
        background: white;
        transform: rotate(45deg);
        transition: all 0.5s;
    }
    .Topcontainer .top::after {
        content: "";
        position: absolute;
        margin: auto;
        top: -5px;
        right: 0;
        bottom: 0;
        left: -5px;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        border: 2px solid white;
        transition: all 0.5s;
    }
</style>

    <div class="Topcontainer">
        <a href="#app" onclick="totop()">go</a>
        <div class="top"></div>
    </div>


<script type="application/javascript">
    function totop() {
        window.scroll({
            top: 0,
            left: 0,
            behavior: 'smooth'
        });
    }
</script>