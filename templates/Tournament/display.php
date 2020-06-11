<?php
$tournament = $this->get('tournament');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Turnieje</title>
    <?php echo $this->Html->css("style") ?>
    <?php echo $this->Html->css("fontello") ?>
    <?php echo $this->Html->css("gracket") ?>
    <?php echo $this->Html->script("jquery-3.5.1") ?>
    <?php echo $this->Html->script("jquery.gracket") ?>
</head>
<body>
    <?php echo $this->element('navbar') ?>
    <main>
        <section style="width: 100%;">
            <div class="tournament_header">
                <div class="header_link">
                    <button onclick="showOnClick()"></button>
                </div>
                <div class="flex-tournament-header">
                    <div>
                        <i class="icon-down-open" style="opacity: 0;"></i>
                    </div>
                    <div class="tournament_name">
                        <div class="name">
                            Nazwa turnieju
                        </div>
                        <div class="discipline">
                            Dyscyplina
                        </div>
                    </div>
                    <div style="z-index: 20;">
                        <i class="icon-down-open"></i>
                    </div>
                </div>


            </div>
            <div class="tournament_info hidden_info" id="tournament_info">
                <div class="t_desc" id="t_desc">
                    <div>
                        Data: 10.06.2020
                    </div>
                    <div>
                        Deadline: 06.0.6.2020
                    </div>
                    <div>
                        Liczba uczestników: 8/10
                    </div>
                    <div class="join_button">
                        <a href="#">Dołącz</a>
                    </div>
                </div>
                <div class="location" id="location">
                    <div>
                        Lokalizacja
                    </div>
                    <iframe
                        id="googleMap"
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCR1vziUo8-2PhOfYM079eSFzcN_jz_ozc&q=Poznan,Piotrowo+4" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div>
                <div>
                    <div class="my_gracket"></div>
                </div>


                <script type="text/javascript">
                    (function(win, doc, $){


                        // Fake Data
                        win.TestData = [
                            [
                                [ {"name" : "Erik Zettersten", "id" : "erik-zettersten", "seed" : 1, "displaySeed": "D1", "score" : 47 }, {"name" : "Andrew Miller", "id" : "andrew-miller", "seed" : 2} ],
                                [ {"name" : "James Coutry", "id" : "james-coutry", "seed" : 3}, {"name" : "Sam Merrill", "id" : "sam-merrill", "seed" : 4}],
                                [ {"name" : "Anothy Hopkins", "id" : "anthony-hopkins", "seed" : 5}, {"name" : "Everett Zettersten", "id" : "everett-zettersten", "seed" : 6} ],
                                [ {"name" : "John Scott", "id" : "john-scott", "seed" : 7}, {"name" : "Teddy Koufus", "id" : "teddy-koufus", "seed" : 8}],
                                [ {"name" : "Arnold Palmer", "id" : "arnold-palmer", "seed" : 9}, {"name" : "Ryan Anderson", "id" : "ryan-anderson", "seed" : 10} ],
                                [ {"name" : "Jesse James", "id" : "jesse-james", "seed" : 1}, {"name" : "Scott Anderson", "id" : "scott-anderson", "seed" : 12}],
                                [ {"name" : "Josh Groben", "id" : "josh-groben", "seed" : 13}, {"name" : "Sammy Zettersten", "id" : "sammy-zettersten", "seed" : 14} ],
                                [ {"name" : "Jake Coutry", "id" : "jake-coutry", "seed" : 15}, {"name" : "Spencer Zettersten", "id" : "spencer-zettersten", "seed" : 16}]
                            ],
                            [
                                [ {"name" : "Erik Zettersten", "id" : "erik-zettersten", "seed" : 1}, {"name" : "James Coutry", "id" : "james-coutry", "seed" : 3} ],
                                [ {"name" : "Anothy Hopkins", "id" : "anthony-hopkins", "seed" : 5}, {"name" : "Teddy Koufus", "id" : "teddy-koufus", "seed" : 8} ],
                                [ {"name" : "Ryan Anderson", "id" : "ryan-anderson", "seed" : 10}, {"name" : "Scott Anderson", "id" : "scott-anderson", "seed" : 12} ],
                                [ {"name" : "Sammy Zettersten", "id" : "sammy-zettersten", "seed" : 14}, {"name" : "Jake Coutry", "id" : "jake-coutry", "seed" : 15} ]
                            ],
                            [
                                [ {"name" : "Erik Zettersten", "id" : "erik-zettersten", "seed" : 1}, {"name" : "Anothy Hopkins", "id" : "anthony-hopkins", "seed" : 5} ],
                                [ {"name" : "Ryan Anderson", "id" : "ryan-anderson", "seed" : 10}, {"name" : "Sammy Zettersten", "id" : "sammy-zettersten", "seed" : 14} ]
                            ],
                            [
                                [ {"name" : "Erik Zettersten", "id" : "erik-zettersten", "seed" : 1}, {"name" : "Ryan Anderson", "id" : "ryan-anderson", "seed" : 10} ]
                            ],
                            [
                                [ {"name" : "Erik Zettersten", "id" : "erik-zettersten", "seed" : 1} ]
                            ]
                        ];

                        // initializer
                        $(".my_gracket").gracket({ src : win.TestData });

                    })(window, document, jQuery);
                </script>
                <script type="text/javascript">

                    var _gaq = _gaq || [];
                    _gaq.push(['_setAccount', 'UA-36251023-1']);
                    _gaq.push(['_setDomainName', 'jqueryscript.net']);
                    _gaq.push(['_trackPageview']);

                    (function() {
                        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                        ga.src = ('https:' === document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                    })();

                </script>
            </div>
            <div class="discipline sub-cat">
                Sponsorzy
            </div>
            <div class="sponsors">
                <div>
                    <?php echo $this->Html->image('sponsors/politechnika.png', ['alt' => 'put.png']); ?>
                </div>
                <div>
                    <?php echo $this->Html->image('sponsors/rmf.png', ['alt' => 'tenis.png']); ?>
                </div>
                <div>
                    <?php echo $this->Html->image('sponsors/tvn.png', ['alt' => 'tenis.png']); ?>
                </div>
                <div>
                    <?php echo $this->Html->image('sponsors/volks.png', ['alt' => 'tenis.png']); ?>
                </div>
            </div>
            <div class="discipline sub-cat">
                Organizator
            </div>
            <div style="display: flex; align-items: center; flex-direction: column; margin: 10px 0;">
                <div style="text-align: left;">
                    Imie Nazwisko
                </div>
                <div style="text-align: left;">
                    Email
                </div>
            </div>
        </section>
    </main>

    <?php echo $this->Html->script("tournament") ?>
</body>
</html>
