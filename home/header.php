<style>
    .header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding: 10px 30px;
        background-color: white;
        box-shadow: 0 0 10px black;
        z-index: 999;
    }

    .header .logo {
        width: 40px;
        height: auto;
    }

    .header .logo img {
        width: 100%;
        height: 100%;
    }

    .header .navbar {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .header .navbar li {
        list-style: none;
        margin: 10px;
    }

    .header .navbar li a {
        color: white;
        background-color: dodgerblue;
        text-decoration: none;
        border-radius: 4px;
        padding: 10px 15px;
    }
</style>
<section class="header" id="header">
    <div class="logo"><img src="/image/sde.jpg" alt=""></div>
    <ul class="navbar">
        <li><a href="/">Home</a></li>
        <li><a href="/mug">LogIn</a></li>
    </ul>
</section>