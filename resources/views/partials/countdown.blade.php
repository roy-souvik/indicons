<style>
    #countdown {
        text-align: center;
        display: table;
        margin: auto;
        padding: 21px 60px;
        border-radius: 200px;
        position: absolute;
        top: -167px;
        width: auto;
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
        background-color: rgba(0, 0, 0, 0.7);
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
