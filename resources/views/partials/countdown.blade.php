<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

    #countdown {
        text-align: center;
        display: table;
        margin: auto;
        padding: 21px 40px 21px;
        border-radius: 200px;

        width: auto;
        position: relative;
        z-index: 1;
        right: 0px;
    }

    #countdown ul {
        padding: 0px;
        margin: 0px;
    }

    #countdown h1 {
        letter-spacing: .125rem;
        text-transform: uppercase;
        font-size: 25px;
        font-weight: 600;
        color: #fff;
        margin-bottom: 0px;
    }

    #countdown li {
    display: inline-block;
    font-size: 1.5em;
    list-style-type: none;
    padding: 0px 1.5em;
    text-transform: uppercase;
    /* background-image: linear-gradient(to right, #fc6076, #ff9a44, #ef9d43, #e75516); */
    font-family: "Roboto", serif !important;
    border-radius: 0px;
    padding: 9px 0px;
    width: 230px;
    border-right: 2px solid #ffffff26;
}

    #countdown li:nth-of-type(2) {
               /*background-image: linear-gradient(to right, #fc6076, #ff9a44, #ef9d43, #e75516);*/
    
    }

    #countdown li:nth-of-type(4) {
                /*background-image: linear-gradient(to right, #fc6076, #ff9a44, #ef9d43, #e75516);*/
                border: none;
    
    }

    #countdown li span {
        display: block;
        font-size: 3.5rem;
        font-weight: 900;
        color: #ffffff;
    }

    #countdown li strong {
        color: #fff;
        font-size: 16px;
    }

    #countdown .emoji {
        display: none;
        padding: 1rem;
    }

    #countdown .emoji span {
        font-size: 4rem;
        padding: 0 .5rem;
    }
</style>
<div class="counter-sec">
    <div class="elementor-background-overlay"></div>
<div class="container">
    <div id="countdown">
        <ul>
            <li><span id="days"></span><strong>days</strong></li>
            <li><span id="hours"></span><strong>Hours</strong></li>
            <li><span id="minutes"></span><strong>Minutes</strong></li>
            <li><span id="seconds"></span><strong>Seconds</strong></li>
        </ul>
    </div>
    <div id="content" class="emoji">
        <span> </span>
        <span> </span>
        <span> </span>
    </div>
</div>
</div>
