<!DOCTYPE html>
<html lang="en">
    <head>
        <title>jitesoft</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, shrink-to-fit=no">
        <meta name="author" content="Jitesoft">
        <meta property="og:image" content="https://jitesoft.com/favicon.ico">
        <meta name="description" content="Jitesoft is a company specialized in backend development for Web, Games and Applications.">
        <meta name="robots" content="nofollow">
        <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:600" rel="stylesheet">
        <link rel="shortcut icon" href="https://jitesoft.com/favicon.ico" />
    </head>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Source Code Pro', monospace;
            margin: 0;
            line-height: 120%;
            font-size:100%;
            text-align: center;
        }

        .content h2 {
            font-size: 1.7em;
        }

        .content p {
            padding: 20px;
            margin: auto;
            font-size: 1.2em;
            font-family: monospace;
            width: 100%;
            max-width: 320px;
            text-align: center;

        }

        .content h1 {
            font-size: 10vw;
        }

        footer {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 20px;
            text-align: center;
            font-size: 11px;
        }

        a {
            color: #636b6f;
        }

        .hidden {
            display:none;
        }

    </style>

    <body>
        <div class="position-ref full-height">
            <div class="content">
                <h1 class="link welcome">
                    Jitesoft
                </h1>

                <div id="text-welcome" class="">
                    <h2>Welcome.</h2>
                    <p>
                        Jitesoft is a company specialized in backend development for Web, Games and Applications.
                    </p>
                </div>

                <div id="text-contact" class="hidden">
                    <h2>Contact.</h2>
                    <p>
                        Easiest way of contact is through the electronic postal office. The addressee to send the electronic letter to would be <a href='&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#106;&#111;&#104;&#97;&#110;&#110;&#101;&#115;&#64;&#106;&#105;&#116;&#101;&#115;&#111;&#102;&#116;&#46;&#99;&#111;&#109;'>&#74;&#111;&#104;&#97;&#110;&#110;&#101;&#115;</a>.<br>
                        Hope to hear from you!
                    </p>
                </div>

                <div id="text-about" class="hidden">
                    <h2>About.</h2>
                    <p>
                        Jitesoft was started in october 2016 by Johannes Tegnér.<br>
                        We are a company working with both in-house and external projects.<br>
                        The company is specialized within the fields of <i>Game-development</i>, <i>Web-development</i> and <i>Application-development</i>.<br>
                        Feel free to contact <a href='&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#106;&#111;&#104;&#97;&#110;&#110;&#101;&#115;&#64;&#106;&#105;&#116;&#101;&#115;&#111;&#102;&#116;&#46;&#99;&#111;&#109;'>&#74;&#111;&#104;&#97;&#110;&#110;&#101;&#115;</a> for any project queries and we will get back to you as soon as possible!
                    </p>
                </div>

            </div>
        </div>

        <footer>
            <a href="https://github.com/jitesoft" target="_blank">Github</a>
            <a href="https://bitbucket.org/jitesoft" target="_blank">Bitbucket</a>
            <a href="contact" class="link contact">Contact</a>
            <a href="about" class="link about">About</a>
        </footer>

        <script>
            var onClick = function(e) {
                e.preventDefault();

                var _nodes = document.querySelectorAll('div[id^="text-"]');
                var _name = this.classList.item(1);
                var i =_nodes.length;

                for(i;i-->0;) {
                    _nodes.item(i).classList.add("hidden");
                }

                document.querySelector('#text-' + _name).classList.remove('hidden');
            };

            var links = document.querySelectorAll('.link');
            for(var i=links.length;i-->0;) {
                links.item(i).addEventListener('click', onClick);
            }

        </script>
    </body>
</html>

