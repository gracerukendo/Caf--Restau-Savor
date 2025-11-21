  <?php
  
  session_start(); 
/*   // Vérifie si l'utilisateur est connecté
   if(!isset($_SESSION['id_client'])){
    header('Location: Connexion.php?msg=Veuillez vous connecter pour accéder à votre compte');
    exit;
}
 */
// Vérifie si le formulaire de réservation (ou d'événement) est soumis
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
      if (!isset($_SESSION['id_client'])) {
          // Redirection si l'utilisateur n'est pas connecté
          $msg = urlencode("Veuillez vous connecter ou vous inscrire avant d'envoyer une réservation ou un message.");
          header("Location: Inscription.php?msg=$msg");
          exit;
      }

   
}

  require_once 'parties/haeder.php';
  ?>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="hero-content">
          <div class="row align-items-center">

            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
              <div class="content">
                <style>
                  .pp {
                    top: 0%;
                    font-size: 20px;
                    animation-duration: 5s;
                    animation-name: slidein;
                  }

                  @keyframes slidein {
                    from {
                      margin-left: 100%;
                      width: 300%;
                    }

                    to {
                      margin-left: 0%;
                      width: 100%;
                    }
                  }
                  .btn-orange {
                    background-color: #ff7a00; /* orange vif */
                    color: white;
                    border: none;
                  }
                  .btn-orange:hover {
                    background-color: #e06600; /* orange foncé au survol */
                  }
                  .texte-clignotant {
                        font-size: 40px;
                        font-weight: bold;
                        animation: couleurs 2s infinite;
                      }

                      @keyframes couleurs {
                        0%   { color: #ff0000; }  /* rouge */
                        25%  { color: #ff0000; }  /* orange */
                        50%  { color: #288cbeff; }  /* vert */
                        75%  { color: #288cbeff; }  /* bleu */
                        100% { color: #288cbeff; }  /* violet */
                      }
                       .texte-clignotant {
                          font-size: 50px;
                          font-weight: bold;
                          font-family: 'Poppins', sans-serif;
                          border-right: 1px solid ; 
                          white-space: nowrap;
                          overflow: hidden;
                       }
                </style>
                <script>
                  window.onload = function() {
                    const text = "Café-Restau Savor !"; // Ton texte
                    const element = document.getElementById("text");
                    let index = 0;

                    function typeLetter() {
                      if (index < text.length) {
                        element.innerHTML += text[index];
                        index++;
                        setTimeout(typeLetter, 400); // Vitesse d’apparition
                      }
                    }

                    typeLetter();
                  };
                </script>
              
                <p class="pp">Bienvenue au</p>
                <h2 class="hero-title mb-4"> <span class="texte-clignotant" id="text"></span>, <br>en Cuisine Méditerranéenne  Authentique !</h2>
                <p class="hero-subtitle mb-4">
                  Plongez dans un univers de saveurs raffinées où tradition et élégance se rencontrent. Nos plats, préparés avec soin à partir d’ingrédients frais, vous invitent à un voyage culinaire au cœur de la Méditerranée.</p>

                <div class="hero-actions d-flex flex-wrap gap-3 mb-4">
                  <a href="reservation.php" class="btn btn-primary">Réserver une table</a>
                  <a href="#menu" class="btn btn-outline">Voir le Menu</a>
                </div>

                <div class="hero-info d-flex flex-wrap align-items-center gap-4">
                  <div class="info-item d-flex align-items-center">
                    <i class="bi bi-clock me-2"></i>
                    <div>
                      <small class="text-muted">Toujour Ouvert</small>
                      <div class="fw-medium">11:00 AM - 10:30 PM</div>
                    </div>
                  </div>
                  <div class="info-item d-flex align-items-center">
                    <i class="bi bi-geo-alt me-2"></i>
                    <div>
                      <small class="text-muted">Localisation</small>
                      <div class="fw-medium">Ville de Butembo</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
              <div class="hero-images">
                <div class="main-image">
                  <img src="assets/img/restaurant/showcase-2.webp" alt="Signature Mediterranean Dish" class="img-fluid">
                </div>
                <div class="floating-images">
                  <div class="floating-image floating-image-1">
                    <img src="assets/img/restaurant/main-4.webp" alt="Grilled Seafood" class="img-fluid">
                  </div>
                  <div class="floating-image floating-image-2">
                    <img src="assets/img/restaurant/main-2.webp" alt="Mediterranean Dessert" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="about-image">
              <img src="assets/img/restaurant/chef-3.webp" alt="Executive Chef" class="img-fluid rounded">
              <div class="experience-badge">
                <span class="years">25+</span>
                <span class="text">ans d’excellence culinaire</span>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="about-content">
              <div class="section-header">
                <h2>Rencontrez notre Chef Exécutif</h2>
                <p class="subtitle">L’élégance du goût et la passion de la cuisine depuis 1999</p>
              </div>

              <div class="story-text">
                <p>Depuis plus de vingt ans, notre Chef façonne des expériences culinaires uniques où authenticité et créativité se rencontrent.
                Dans notre café-restaurant, chaque plat est une invitation au voyage des sens : des arômes soigneusement travaillés, des saveurs équilibrées et une présentation qui célèbre le plaisir de la table.</p>

                <p>Attaché à la qualité des produits locaux et à la finesse des recettes maison, il allie passion et savoir-faire pour faire de chaque repas un instant de bonheur partagé.</p>
              </div>

              <div class="chef-highlights">
                <div class="row">
                  <div class="col-6">
                    <div class="highlight-item">
                      <i class="bi bi-award"></i>
                      <span>James Beard Award</span>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="highlight-item">
                      <i class="bi bi-star"></i>
                      <span>Michelin Recognition</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="chef-quote">
                <blockquote>
                  « Cuisiner, ce n’est pas seulement nourrir les gens, c’est créer des moments qui rassemblent familles et amis autour d’une même table. »
                </blockquote>
                <cite>- Chef Alessandro Romano</cite>
              </div>

              <div class="cta-buttons">
                <a href="#menu" class="btn btn-primary">Voir le Menu</a>
                <a href="reservation.php" class="btn btn-orange">Réserver une table</a>
              </div>
            </div>
          </div>
        </div>

        <div class="restaurant-gallery" data-aos="fade-up" data-aos-delay="400">
          <div class="row g-4">
            <div class="col-lg-4 col-md-6">
              <div class="gallery-item">
                <img src="assets/img/restaurant/showcase-2.webp" alt="Restaurant Interior" class="img-fluid rounded">
                <div class="gallery-caption">
                  <h4>Savourez avec élégance</h4>
                  <p>Un cadre agréable et sophistiqué pour chaque rencontre</p>
                </div>
              </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-4 col-md-6">
              <div class="gallery-item">
                <img src="assets/img/restaurant/main-4.webp" alt="Signature Dish" class="img-fluid rounded">
                <div class="gallery-caption">
                  <h4>Spécialités du Chef</h4>
                  <p>Des créations saisonnières raffinées, sublimées par notre savoir-faire</p>
                </div>
              </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-4 col-md-6">
              <div class="gallery-item">
                <img src="assets/img/restaurant/misc-7.webp" alt="Wine Selection" class="img-fluid rounded">
                <div class="gallery-caption">
                  <h4>Notre Sélection de Vins</h4>
                  <p>Des vins soigneusement choisis pour sublimer chaque plat</p>
                </div>
              </div>
            </div><!-- End Gallery Item -->
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Menu Section -->
    <section id="menu" class="menu section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Menu</h2>
        <p>Des saveurs qui éveillent vos sens et ravissent chaque instant</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-12">
            <div class="menu-filters">
              <ul class="nav nav-pills justify-content-center" id="menuTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="menu-starters-tab" data-bs-toggle="pill" data-bs-target="#menu-starters" type="button" role="tab">
                    <i class="bi bi-egg-fried me-2"></i>Entrées
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="menu-mains-tab" data-bs-toggle="pill" data-bs-target="#menu-mains" type="button" role="tab">
                    <i class="bi bi-cup-hot me-2"></i>Plats Principaux
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="menu-desserts-tab" data-bs-toggle="pill" data-bs-target="#menu-desserts" type="button" role="tab">
                    <i class="bi bi-cake2 me-2"></i>Desserts
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="menu-drinks-tab" data-bs-toggle="pill" data-bs-target="#menu-drinks" type="button" role="tab">
                    <i class="bi bi-cup me-2"></i>Boissons
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="tab-content" id="menuTabContent">
          <!-- Starters Tab -->
          <div class="tab-pane fade show active" id="menu-starters" role="tabpanel">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/starter-6.webp" class="img-fluid" alt="Starter">
                    <div class="special-badge">Suggestion du Chef</div>
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Anneaux de Calamar Croquants</h4>
                      <div class="dietary-tags">
                        <span class="tag spicy"><i class="bi bi-fire"></i></span>
                      </div>
                    </div>
                    <p>Des calamars dorés et croustillants, servis avec une sauce délicate pour éveiller vos papilles.</p>
                    <div class="menu-item-footer">
                            <a href="reservation.php" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">$15</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/starter-3.webp" class="img-fluid" alt="Starter">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Arancini à la Truffe</h4>
                      <div class="dietary-tags">
                        <span class="tag vegetarian"><i class="bi bi-leaf"></i></span>
                      </div>
                    </div>
                    <p>Boulettes de riz croustillantes, parfumées à la truffe.</p>
                    <div class="menu-item-footer">
                         <a href="reservation.php" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">$16</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/starter-5.webp" class="img-fluid" alt="Starter">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Ceviche de Saumon</h4>
                      <div class="dietary-tags">
                        <span class="tag gluten-free"><i class="bi bi-check-circle"></i></span>
                      </div>
                    </div>
                    <p>Saumon frais mariné aux agrumes, servi en entrée rafraîchissante.</p>
                    <div class="menu-item-footer">
                         <a href="#book-a-table" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">10$</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/starter-7.webp" class="img-fluid" alt="Starter">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Tartare de Bœuf</h4>
                      <div class="dietary-tags">
                        <span class="tag premium"><i class="bi bi-star-fill"></i></span>
                      </div>
                    </div>
                    <p>Bœuf cru finement haché, assaisonné pour révéler toutes ses saveurs.</p>
                    <div class="menu-item-footer">
                      <a href="reservation.php" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">25$</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Main Courses Tab -->
          <div class="tab-pane fade" id="menu-mains" role="tabpanel">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/main-2.webp" class="img-fluid" alt="Main Course">
                    <div class="special-badge">Signature</div>
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Grilled Ribeye Steak</h4>
                      <div class="dietary-tags">
                        <span class="tag premium"><i class="bi bi-star-fill"></i></span>
                      </div>
                    </div>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                    <div class="menu-item-footer">
                        <a href="reservation.php" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">$45</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/main-4.webp" class="img-fluid" alt="Main Course">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Pan-Seared Salmon</h4>
                      <div class="dietary-tags">
                        <span class="tag gluten-free"><i class="bi bi-check-circle"></i></span>
                      </div>
                    </div>
                    <p>Totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae</p>
                    <div class="menu-item-footer">
                        <a href="reservation.php" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">$38</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/main-6.webp" class="img-fluid" alt="Main Course">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Lobster Ravioli</h4>
                      <div class="dietary-tags">
                        <span class="tag premium"><i class="bi bi-star-fill"></i></span>
                      </div>
                    </div>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia consequuntur</p>
                    <div class="menu-item-footer">
                        <a href="reservation.php" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">$42</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/main-8.webp" class="img-fluid" alt="Main Course">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Mushroom Risotto</h4>
                      <div class="dietary-tags">
                        <span class="tag vegetarian"><i class="bi bi-leaf"></i></span>
                      </div>
                    </div>
                    <p>Magni dolores eos qui ratione voluptatem sequi nesciunt neque porro quisquam est qui dolorem</p>
                    <div class="menu-item-footer">
                        <a href="reservation.php" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">$32</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Desserts Tab -->
          <div class="tab-pane fade" id="menu-desserts" role="tabpanel">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/dessert-2.webp" class="img-fluid" alt="Dessert">
                    <div class="special-badge">Popular</div>
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Chocolate Lava Cake</h4>
                      <div class="dietary-tags">
                        <span class="tag vegetarian"><i class="bi bi-leaf"></i></span>
                      </div>
                    </div>
                    <p>Ipsum quia dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt</p>
                    <div class="menu-item-footer">
                        <a href="reservation.php" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">$14</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/dessert-5.webp" class="img-fluid" alt="Dessert">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Crème Brûlée</h4>
                      <div class="dietary-tags">
                        <span class="tag gluten-free"><i class="bi bi-check-circle"></i></span>
                      </div>
                    </div>
                    <p>Ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco</p>
                    <div class="menu-item-footer">
                        <a href="reservation.php" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">$12</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/dessert-7.webp" class="img-fluid" alt="Dessert">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Tiramisu</h4>
                      <div class="dietary-tags">
                        <span class="tag vegetarian"><i class="bi bi-leaf"></i></span>
                      </div>
                    </div>
                    <p>Laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit</p>
                    <div class="menu-item-footer">
                        <a href="reservation.php" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">$13</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/dessert-9.webp" class="img-fluid" alt="Dessert">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Seasonal Fruit Tart</h4>
                      <div class="dietary-tags">
                        <span class="tag vegan"><i class="bi bi-flower1"></i></span>
                      </div>
                    </div>
                    <p>In voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat</p>
                    <div class="menu-item-footer">
                        <a href="reservation.php" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">$11</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Beverages Tab -->
          <div class="tab-pane fade" id="menu-drinks" role="tabpanel">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/drink-3.webp" class="img-fluid" alt="Beverage">
                    <div class="special-badge">House Special</div>
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Signature Cocktail</h4>
                      <div class="dietary-tags">
                        <span class="tag spicy"><i class="bi bi-fire"></i></span>
                      </div>
                    </div>
                    <p>Cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <div class="menu-item-footer">
                          <a href="reservation.php" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">$16</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/drink-6.webp" class="img-fluid" alt="Beverage">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Fresh Fruit Smoothie</h4>
                      <div class="dietary-tags">
                        <span class="tag vegan"><i class="bi bi-flower1"></i></span>
                      </div>
                    </div>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                    <div class="menu-item-footer">
                        <a href="reservation.php" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">$8</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/drink-8.webp" class="img-fluid" alt="Beverage">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Premium Wine Selection</h4>
                      <div class="dietary-tags">
                        <span class="tag premium"><i class="bi bi-star-fill"></i></span>
                      </div>
                    </div>
                    <p>Laudantium totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi</p>
                    <div class="menu-item-footer">
                        <a href="reservation.php" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">$35</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/drink-10.webp" class="img-fluid" alt="Beverage">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Artisan Coffee</h4>
                      <div class="dietary-tags">
                        <span class="tag vegan"><i class="bi bi-flower1"></i></span>
                      </div>
                    </div>
                    <p>Architecto beatae vitae dicta sunt explicabo nemo enim ipsam voluptatem quia voluptas</p>
                    <div class="menu-item-footer">
                        <a href="reservation.php" class="btn btn-orange"> <i class="bi bi-bookmark-star"></i>Réserver une table</a>
                      <span class="price">$6</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-5">
          <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="300">
            <a href="#" class="btn btn-download">
              <i class="bi bi-download me-2"></i>Download Full Menu (PDF)
            </a>
          </div>
        </div>

      </div>

    </section><!-- /Menu Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Témoignages</h2>
        <p>

Nos clients partagent leur expérience

“Chaque visite dans ce café-restaurant est un vrai plaisir. L'ambiance, le service et les plats créatifs font de chaque moment un souvenir mémorable.”</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="testimonial-grid">

          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="100">
            <div class="testimonial-card">
              <div class="testimonial-header">
                <div class="testimonial-image">
                  <img src="assets/img/person/person-f-5.webp" class="img-fluid" alt="Testimonial 1">
                </div>
                <div class="testimonial-meta">
                  <h3>Sophia Martinez</h3>
                  <h4>Directrice Creative </h4>
                  <div class="company-logo">
                    <i class="bi bi-building"></i>
                  </div>
                </div>
              </div>
              <div class="testimonial-body">
                <i class="bi bi-chat-quote-fill quote-icon"></i>
                <p>Grâce à un design soigné et une ambiance immersive, ce café-restaurant offre une expérience unique qui séduit chaque visiteur.</p>
              </div>
            </div>
          </div>

          <div class="testimonial-item featured" data-aos="zoom-in" data-aos-delay="200">
            <div class="testimonial-card">
              <div class="testimonial-header">
                <div class="testimonial-image">
                  <img src="assets/img/person/person-m-5.webp" class="img-fluid" alt="Testimonial 2">
                </div>
                <div class="testimonial-meta">
                  <h3>Alexander Wright</h3>
                  <h4>CEO &amp; Foundateur</h4>
                  <div class="company-logo">
                    <i class="bi bi-buildings"></i>
                  </div>
                </div>
              </div>
              <div class="testimonial-body">
                <i class="bi bi-chat-quote-fill quote-icon"></i>
                <p>Des solutions innovantes et une approche professionnelle ont transformé notre expérience culinaire, plaçant ce lieu en référence du marché.</p>
              </div>
            </div>
          </div>

          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="300">
            <div class="testimonial-card">
              <div class="testimonial-header">
                <div class="testimonial-image">
                  <img src="assets/img/person/person-f-6.webp" class="img-fluid" alt="Testimonial 3">
                </div>
                <div class="testimonial-meta">
                  <h3>Isabella Kim</h3>
                  <h4>Stratège Produit</h4>
                  <div class="company-logo">
                    <i class="bi bi-building-check"></i>
                  </div>
                </div>
              </div>
              <div class="testimonial-body">
                <i class="bi bi-chat-quote-fill quote-icon"></i>
                <p>
« L’introduction de technologies et de méthodes créatives a permis de sublimer la préparation et la présentation des plats.</p>
              </div>
            </div>
          </div>

          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="400">
            <div class="testimonial-card">
              <div class="testimonial-header">
                <div class="testimonial-image">
                  <img src="assets/img/person/person-m-6.webp" class="img-fluid" alt="Testimonial 4">
                </div>
                <div class="testimonial-meta">
                  <h3>James Cooper</h3>
                  <h4>Tech Lead</h4>
                  <div class="company-logo">
                    <i class="bi bi-building-gear"></i>
                  </div>
                </div>
              </div>
              <div class="testimonial-body">
                <i class="bi bi-chat-quote-fill quote-icon"></i>
                <p>Exceptional technical expertise and innovative solutions have streamlined our development processes significantly.</p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Chefs Section -->
    <section id="chefs" class="chefs section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Chefs</h2>
        <p>Notre équipe de passionnés
        Des experts qui transforment chaque plat en expérience culinaire inoubliable.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="main-chef-section" data-aos="fade-up" data-aos-delay="200">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="chef-content">
                <div class="chef-badge">
                  <i class="bi bi-award"></i>
                  <span>Executive Chef</span>
                </div>
                <h2>Eliot Johnson</h2>
                <div class="experience-years">
                  <span class="number">15+</span>
                  <span class="text">ans d’excellence</span>
                </div>
                <p>Depuis plus de 15 ans, Eliot Johnson s’engage à créer des plats qui marient saveurs, créativité et qualité. Chaque assiette raconte une histoire.</p>
                <div class="achievements">
                  <div class="achievement-item">
                    <i class="bi bi-trophy-fill"></i>
                    <span>Prix d’Excellence Culinaire 2023</span>
                  </div>
                  <div class="achievement-item">
                    <i class="bi bi-star-fill"></i>
                    <span>Restaurant recommandé par Michelin</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="chef-image-container" data-aos="zoom-in" data-aos-delay="300">
                <div class="image-frame">
                  <img src="assets/img/restaurant/chef-8.webp" class="img-fluid" alt="Executive Chef">
                  <div class="signature-overlay">
                    <img src="assets/img/misc/signature-1.webp" alt="Chef Signature">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="team-grid" data-aos="fade-up" data-aos-delay="400">
          <div class="row g-4">
            <div class="col-lg-3 col-md-6">
              <div class="team-member" data-aos="flip-left" data-aos-delay="100">
                <div class="member-photo">
                  <img src="assets/img/restaurant/chef-5.webp" class="img-fluid" alt="Team Member">
                  <div class="overlay">
                    <div class="social-icons">
                      <a href="#"><i class="bi bi-instagram"></i></a>
                      <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Elena Vasquez</h4>
                  <span class="position">Chef Pâtissière</span>
                  <p>Passionnée par la pâtisserie, elle crée des desserts qui émerveillent les yeux et les papilles.</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="team-member" data-aos="flip-left" data-aos-delay="150">
                <div class="member-photo">
                  <img src="assets/img/restaurant/chef-9.webp" class="img-fluid" alt="Team Member">
                  <div class="overlay">
                    <div class="social-icons">
                      <a href="#"><i class="bi bi-instagram"></i></a>
                      <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                </div>
                <div class="member-info">
                  <h4>David Thompson</h4>
                  <span class="position">Sous-Chef</span>
                  <p>Il assure la préparation quotidienne des plats avec rigueur et créativité.</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="team-member" data-aos="flip-left" data-aos-delay="200">
                <div class="member-photo">
                  <img src="assets/img/restaurant/chef-2.webp" class="img-fluid" alt="Team Member">
                  <div class="overlay">
                    <div class="social-icons">
                      <a href="#"><i class="bi bi-instagram"></i></a>
                      <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Maria Santos</h4>
                  <span class="position">Responsable Cuisine</span>
                  <p>Organisée et minutieuse, elle veille à la qualité et à la fluidité de chaque service.</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="team-member" data-aos="flip-left" data-aos-delay="250">
                <div class="member-photo">
                  <img src="assets/img/restaurant/chef-4.webp" class="img-fluid" alt="Team Member">
                  <div class="overlay">
                    <div class="social-icons">
                      <a href="#"><i class="bi bi-instagram"></i></a>
                      <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Roberto Kim</h4>
                  <span class="position">Sommelier</span>
                  <p>Expert en vins, il accompagne chaque plat du meilleur accord pour sublimer les saveurs.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Chefs Section -->

    <!-- Book A Table Section -->
    <!-- <section id="book-a-table" class="book-a-table section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">
          <div class="col-lg-6 reservation-form-col" data-aos="fade-right" data-aos-delay="200">
            <div class="reservation-form-container">
              <div class="form-header content">
                <span class="subtitle">Réserver un événement</span>
                <h3>Reserve Your Table Today</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget eros vitae magna eleifend lacinia a eget nisl.</p>
              </div>

            <form action="index.php" method="post" class="php-email-form">
                <div class="row g-3">
                  <div class="col-12 form-group">
                    <label for="name">Nom complet</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required="">
                  </div>
                  <div class="col-12 form-group">
                    <label for="phone">Téléphone</label>
                    <input type="text" id="phone" class="form-control" name="phone" placeholder="Your Phone" required="">
                  </div>
                  <div class="col-12 form-group">
                    <label for="email"> Address Email</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Your Email" required="">
                  </div>
                  <div class="col-12 form-group">
                    <label for="people">Nombre de convives</label>
                    <select name="people" id="people" class="form-select" required="">
                      <option value="">Select guests</option>
                      <option value="1">1 Personne</option>
                      <option value="2">2 Personnes</option>
                      <option value="3">3 Personnes</option>
                      <option value="4">4 Personnes</option>
                      <option value="5">5 Personnes</option>
                      <option value="6">6+ Personnes</option>
                    </select>
                  </div>
                  <div class="col-12 form-group">
                    <label for="date">Date de Reservation </label>
                    <input type="date" id="date" name="date" class="form-control" required="">
                  </div>
                  <div class="col-12 form-group">
                    <label for="time">Temps Reservation</label>
                    <input type="time" id="time" class="form-control" name="time" required="">
                  </div>

                  <div class="col-12 form-group">
                    <label for="message">Massage</label>
                    <textarea id="message" class="form-control" name="message" rows="2" placeholder="Allergies, special occasions, seating preferences"></textarea>
                  </div>
                </div>

                <div class="my-3">
                  <div class="loading">Traitement</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn-book-table">Confirmer la Reservation</button>
                </div>
              </form>
            </div>
          </div>

          <div class="col-lg-6 info-col" data-aos="fade-left" data-aos-delay="300">
            <div class="restaurant-info">
              <div class="info-image">
                <img src="assets/img/restaurant/showcase-4.webp" alt="Restaurant interior" class="img-fluid">
              </div>

              <div class="info-content content">
                <div class="restaurant-contact">
                  <h4> Information du Restaurant</h4>

                  <div class="info-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box">
                      <i class="bi bi-clock"></i>
                    </div>
                    <div class="info-text">
                      <h5>Temps d'ouverture</h5>
                      <p>Lun - jeu: 11:00 AM - 11:00 PM<br>
                        Sam - Dim: 10:00 AM - 12:00 AM</p>
                    </div>
                  </div>

                  <div class="info-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box">
                      <i class="bi bi-geo-alt"></i>
                    </div>
                    <div class="info-text">
                      <h5>Notre Localisation</h5>
                      <p>5625 Riverside Avenue<br>Newport, RI 02840</p>
                    </div>
                  </div>

                  <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box">
                      <i class="bi bi-telephone"></i>
                    </div>
                    <div class="info-text">
                      <h5>Numéro tél</h5>
                      <p>+243 891 638 231</p>
                    </div>
                  </div>

                  <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="icon-box">
                      <i class="bi bi-envelope"></i>
                    </div>
                    <div class="info-text">
                      <h5>Email</h5>
                      <p>gracerukendo2@gmail.com</p>
                    </div>
                  </div>
                </div>

                <div class="reservation-cta" data-aos="fade-up" data-aos-delay="500">
                  <h5>Veux tu appeller ?</h5>
                  <a href="tel:+14015558792" class="phone-button">
                    <i class="bi bi-telephone-fill"></i>
                    Call for Reservations
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section> --><!-- /Book A Table Section -->

    <!-- Location Section -->
    <section id="location" class="location section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <div class="location-content">
              <div class="content-header">
                <h2>Visitez Notre Établissement</h2>
                <p class="subtitle">Situé au cœur du quartier culinaire de la ville
Découvrez Savora, un café-restaurant où le goût authentique rencontre l’élégance moderne</p>
              </div>

              <div class="map-wrapper">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.684949335945!2d-73.98658242357565!3d40.75853057126168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDQ1JzMwLjciTiA3M8KwNTknMDcuNyJX!5e0!3m2!1sen!2sus!4v1654321234567!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="map-overlay">
                  <div class="location-badge">
                    <i class="bi bi-geo-alt"></i>
                    <span>Nous Sommes Là</span>
                  </div>
                </div>
              </div>

              <div class="transportation-info" data-aos="fade-up" data-aos-delay="300">
                <h4>Transportation &amp; Parking</h4>
                <div class="transport-grid">
                  <div class="transport-item">
                    <i class="bi bi-train-front"></i>
                    <div class="details">
                      <strong>Subway</strong>
                      <p>Union Square Station (4, 5, 6, L, N, Q, R, W)</p>
                    </div>
                  </div>
                  <div class="transport-item">
                    <i class="bi bi-p-square"></i>
                    <div class="details">
                      <strong>Valet Parking</strong>
                      <p>Available daily from 5:00 PM</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="250">
            <div class="contact-sidebar">
              <div class="contact-card">
                <div class="card-icon">
                  <i class="bi bi-building"></i>
                </div>
                <h3>Address</h3>
                <p>Butembo<br>Rue Kinshasa, N° 123</p>
              </div>

              <div class="contact-card" data-aos="fade-up" data-aos-delay="350">
                <div class="card-icon">
                  <i class="bi bi-telephone-fill"></i>
                </div>
                <h3>Reservations</h3>
                <p class="phone">+243 098 232 6296</p>
                <p class="note">Reservez 24 - 48H avant l'evennement</p>
              </div>

              <div class="contact-card" data-aos="fade-up" data-aos-delay="450">
                <div class="card-icon">
                  <i class="bi bi-clock-fill"></i>
                </div>
                <h3>Heure Opérationnelle</h3>
                <div class="hours-list">
                  <div class="hour-item">
                    <span class="day">lundi - Mercredi</span>
                    <span class="time">5:00 AM - 21:00 PM</span>
                  </div>
                  <div class="hour-item">
                    <span class="day">Jeudi - Samedi</span>
                    <span class="time">5:00 AM - 21:00 PM</span>
                  </div>
                  <div class="hour-item">
                    <span class="day">Vendredi</span>
                    <span class="time">9:00 AM - 21:00 PM</span>
                  </div>
                  <div class="hour-item closed">
                    <span class="day">Mardi</span>
                    <span class="time">le site est fermé</span>
                  </div>
                </div>
              </div>

              <div class="action-buttons" data-aos="fade-up" data-aos-delay="550">
                <a href="reservation.php" class="btn-primary">Reservation</a>
                <a href="index.php#contact" class="btn-secondary">Orientations</a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Location Section -->

    <!-- Events Section -->
    <section id="events" class="events section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center mb-5">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="150">
            <div class="event-hero-content">
              <h2>Événements Exceptionnels & Dîners Privés</h2>

              <p>Découvrez un espace élégant et raffiné, idéal pour vos réceptions, anniversaires, repas d’affaires ou événements spéciaux.
Chez Savora, nous mettons tout en œuvre pour faire de chaque moment une expérience inoubliable, alliant gastronomie, ambiance et service de qualité.</p>
              <div class="event-stats">
                <div class="stat-item">
                  <span class="stat-number">500+</span>
                  <span class="stat-label">Événements organisés</span>
                </div>
                <div class="stat-item">
                  <span class="stat-number">200</span>
                  <span class="stat-label">Capacité maximale</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
            <div class="event-hero-image">
              <img src="assets/img/restaurant/event-2.webp" alt="Event Space" class="img-fluid">
              <div class="floating-card" data-aos="zoom-in" data-aos-delay="300">
                <i class="bi bi-calendar-check"></i>
                <span>Réservez aujourd’hui !</span>
              </div>
            </div>
          </div>
        </div>

        <div class="event-packages" data-aos="fade-up" data-aos-delay="200">
          <div class="section-header text-center mb-5">
            <h3>Choisissez Votre Formule Parfaite</h3>
            <p>Découvrez nos offres spécialement conçues pour répondre à tous vos besoins, que vous organisiez une fête, un dîner privé ou un événement professionnel.
Nous vous garantissons une expérience élégante, gourmande et parfaitement organisée.</p>
          </div>

          <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="flip-up" data-aos-delay="250">
              <div class="package-card premium">
                <div class="package-header">
                  <div class="package-icon">
                    <i class="bi bi-gem"></i>
                  </div>
                  <h4>Formule Premium</h4>
                  <div class="package-price">
                    <span class="price">30 $ </span>
                    <span class="per">par personne</span>
                  </div>
                </div>

                <div class="package-features">
                  <ul>
                    <li><i class="bi bi-check-circle"></i> Menu gastronomique en 5 services</li>
                    <li><i class="bi bi-check-circle"></i> Sélection de vins premium</li>
                    <li><i class="bi bi-check-circle"></i> Coordinateur d’événement dédié</li>
                    <li><i class="bi bi-check-circle"></i> Tables personnalisées </li>
                    <li><i class="bi bi-check-circle"></i> photographie professionnelle</li>
                  </ul>
                </div>
                <div class="package-capacity">30 à 80 invités</div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="flip-up" data-aos-delay="300">
              <div class="package-card standard featured">
                <div class="popular-badge">Most Popular</div>
                <div class="package-header">
                  <div class="package-icon">
                    <i class="bi bi-star"></i>
                  </div>
                  <h4>Formule Standard</h4>
                  <div class="package-price">
                    <span class="price">15 $</span>
                    <span class="per">par personne
</span>
                  </div>
                </div>
                <div class="package-features">
                  <ul>









                    <li><i class="bi bi-check-circle"></i> Menu complet en 3 services</li>
                    <li><i class="bi bi-check-circle"></i> Cocktail de bienvenue</li>
                    <li><i class="bi bi-check-circle"></i> Assistance à la planification de l’événement</li>
                    <li><i class="bi bi-check-circle"></i> Matériel audio/visuel inclus</li>
                    <li><i class="bi bi-check-circle"></i> Parking gratuit</li>
                  </ul>
                </div>
                <div class="package-capacity"> 20 à 120 invités</div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="flip-up" data-aos-delay="350">
              <div class="package-card essentials">
                <div class="package-header">
                  <div class="package-icon">
                    <i class="bi bi-heart"></i>
                  </div>
                  <h4>Formule Essentielle</h4>
                  <div class="package-price">
                    <span class="price">10 $ </span>
                    <span class="per">par personne</span>
                  </div>
                </div>
                <div class="package-features">
                  <ul>
                    <li><i class="bi bi-check-circle"></i> Buffet complet</li>
                    <li><i class="bi bi-check-circle"></i> Vin maison & bière inclus</li>
                    <li><i class="bi bi-check-circle"></i> Décorations simples</li>
                    <li><i class="bi bi-check-circle"></i> Disposition standard des sièges</li>
                    <li><i class="bi bi-check-circle"></i> Location du lieu pendant 4 heures</li>
                  </ul>
                </div>
                <div class="package-capacity">15 à 60 invités</div>
              </div>
            </div>
          </div>
        </div>

        <div class="event-gallery-grid" data-aos="fade-up" data-aos-delay="200">
          <div class="row g-3">
            <div class="col-lg-3 col-md-6">
              <div class="gallery-item" data-aos="zoom-out" data-aos-delay="250">
                <img src="assets/img/restaurant/event-4.webp" alt="Corporate Event" class="img-fluid">
                <div class="gallery-overlay">
                  <span class="gallery-label">Corporate Events</span>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="gallery-item main-gallery" data-aos="zoom-out" data-aos-delay="300">
                <img src="assets/img/restaurant/event-6.webp" alt="Wedding Reception" class="img-fluid">
                <div class="gallery-overlay">
                  <span class="gallery-label">Wedding Receptions</span>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="gallery-item" data-aos="zoom-out" data-aos-delay="350">
                <img src="assets/img/restaurant/event-9.webp" alt="Birthday Party" class="img-fluid">
                <div class="gallery-overlay">
                  <span class="gallery-label">Birthday Celebrations</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="booking-section" data-aos="fade-up" data-aos-delay="200">
          <div class="row">
            <div class="col-lg-6" data-aos="slide-right" data-aos-delay="250">
              <div class="booking-info">
                <h3>Planifiez Votre Prochain Événement</h3>
                <p>Organiser un moment inoubliable n’a jamais été aussi simple. Que ce soit pour un anniversaire, une réunion professionnelle, un dîner privé ou une célébration spéciale, Café Savora met à votre disposition un espace chaleureux, un service irréprochable et une équipe dédiée pour faire de votre événement une réussite totale.
Profitez de notre expertise, de nos menus personnalisés et d’une coordination soignée du début à la fin.</p>

                <div class="contact-methods">
                  <div class="contact-item">
                    <div class="contact-icon">
                      <i class="bi bi-telephone"></i>
                    </div>
                    <div class="contact-details">
                      <span class="contact-label">Contactez-nous</span>
                      <span class="contact-value">+243 861 614 471</span>
                    </div>
                  </div>
                  <div class="contact-item">
                    <div class="contact-icon">
                      <i class="bi bi-envelope"></i>
                    </div>
                    <div class="contact-details">
                      <span class="contact-label">Email</span>
                      <span class="contact-value">gracerukendo2@gmail.com</span>
                    </div>
                  </div>
                  <div class="contact-item">
                    <div class="contact-icon">
                      <i class="bi bi-clock"></i>
                    </div>
                    <div class="contact-details">
                      <span class="contact-label">Heures de planification</span>
                      <span class="contact-value">Lun–Ven : 9h00 – 18h00</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6" data-aos="slide-left" data-aos-delay="300">
              <div class="quick-booking-form">
                <?php if(isset($_GET['msg']) && !empty($_GET['msg'])): ?>
                  <div class="alert alert-info text-center mb-4" style="
                      background: rgba(255,255,255,0.2);
                      border: 1px solid rgba(255,255,255,0.3);
                      color: #fff;
                      border-radius: 10px;
                      padding: 10px;
                  ">
                    <?= htmlspecialchars($_GET['msg']); ?>
                  </div>
                <?php endif; ?>
                
                <form action="actions/action_reservation.php" method="post" class="php-email-form">
                      <h4>Reserver votre événement</h4>
                      <div class="row">
                        <div class="col-md-6">
                          <input type="text" name="nom" class="form-control" placeholder="Votre nom" required>
                        </div>
                        <div class="col-md-6">
                          <input type="email" name="email" class="form-control" placeholder="Votre Email" required>
                        </div>
                        <div class="col-md-6">
                          <input type="tel" name="phone" class="form-control" placeholder="Numéro de téléphone" required>
                        </div>
                        <div class="col-md-6">
                          <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                          <input type="time" name="time" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                          <select name="guest_count" class="form-select" required>
                            <option value="">Nombre d'invités</option>
                            <option value="15-30">15-30 invités</option>
                            <option value="31-60">31-60 invités</option>
                            <option value="61-100">61-100 invités</option>
                            <option value="100+">100+ invités</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <select name="event_type" class="form-select" required>
                            <option value="">Type d'événement</option>
                            <option value="wedding">Mariage</option>
                            <option value="corporate">Corporate</option>
                            <option value="birthday">Anniversaire</option>
                            <option value="other">Autre</option>
                          </select>
                        </div>
                        <div class="col-12">
                          <textarea name="message" rows="5" class="form-control" placeholder="Parlez à propos de l'événement..."></textarea>
                        </div>
                        <div class="col-12">
                          <div class="loading">Loading</div>
                          <div class="error-message"></div>
                          <div class="sent-message">Votre réservation a été envoyée !</div>
                          <button type="submit" name="btn-submit" class="btn-submit">Envoyer</button>
                        </div>
                      </div>
                  </form>


              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Events Section -->

<?php ?>
    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Galerie</h2>
        <p>Découvrez en images l’ambiance unique de Café Savora : nos plats raffinés, notre intérieur chaleureux, nos événements privés et notre équipe dynamique. Chaque photo reflète notre passion pour l’art culinaire et l’hospitalité.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <ul class="gallery-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">Tout</li>
            <li data-filter=".filter-food"> Plats</li>
            <li data-filter=".filter-interior">Intérieur</li>
            <li data-filter=".filter-events">Événements</li>
            <li data-filter=".filter-staff">Équipe</li>
          </ul><!-- End Gallery Filters -->

          <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <!-- Food Images -->
            <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-food">
              <div class="gallery-wrap">
                <img src="assets/img/restaurant/starter-3.webp" class="img-fluid" alt="Appetizer Platter" loading="lazy">
                <div class="gallery-info">
                  <h4>Gourmet Appetizer Selection</h4>
                  <p>Seasonal ingredients with artisan bread</p>
                  <div class="gallery-links">
                    <a href="assets/img/restaurant/starter-3.webp" class="glightbox" title="Gourmet Appetizer Selection"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-interior">
              <div class="gallery-wrap">
                <img src="assets/img/restaurant/showcase-5.webp" class="img-fluid" alt="Restaurant Interior" loading="lazy">
                <div class="gallery-info">
                  <h4>Main Dining Area</h4>
                  <p>Elegant atmosphere with natural lighting</p>
                  <div class="gallery-links">
                    <a href="assets/img/restaurant/showcase-5.webp" class="glightbox" title="Main Dining Area"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-food">
              <div class="gallery-wrap">
                <img src="assets/img/restaurant/main-7.webp" class="img-fluid" alt="Main Course" loading="lazy">
                <div class="gallery-info">
                  <h4>Signature Main Course</h4>
                  <p>Chef's special with seasonal vegetables</p>
                  <div class="gallery-links">
                    <a href="assets/img/restaurant/main-7.webp" class="glightbox" title="Signature Main Course"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-events">
              <div class="gallery-wrap">
                <img src="assets/img/restaurant/event-4.webp" class="img-fluid" alt="Special Event" loading="lazy">
                <div class="gallery-info">
                  <h4>Wine Tasting Evening</h4>
                  <p>Monthly culinary experience with paired wines</p>
                  <div class="gallery-links">
                    <a href="assets/img/restaurant/event-4.webp" class="glightbox" title="Wine Tasting Evening"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-staff">
              <div class="gallery-wrap">
                <img src="assets/img/restaurant/chef-6.webp" class="img-fluid" alt="Chef Portrait" loading="lazy">
                <div class="gallery-info">
                  <h4>Executive Chef</h4>
                  <p>Creating culinary masterpieces since 2010</p>
                  <div class="gallery-links">
                    <a href="assets/img/restaurant/chef-6.webp" class="glightbox" title="Executive Chef"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-interior">
              <div class="gallery-wrap">
                <img src="assets/img/restaurant/showcase-2.webp" class="img-fluid" alt="Private Dining Room" loading="lazy">
                <div class="gallery-info">
                  <h4>Private Dining Space</h4>
                  <p>Intimate setting for special occasions</p>
                  <div class="gallery-links">
                    <a href="assets/img/restaurant/showcase-2.webp" class="glightbox" title="Private Dining Space"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-food">
              <div class="gallery-wrap">
                <img src="assets/img/restaurant/dessert-5.webp" class="img-fluid" alt="Dessert Display" loading="lazy">
                <div class="gallery-info">
                  <h4>Artisanal Dessert Plate</h4>
                  <p>Handcrafted sweet delicacies</p>
                  <div class="gallery-links">
                    <a href="assets/img/restaurant/dessert-5.webp" class="glightbox" title="Artisanal Dessert Plate"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-events">
              <div class="gallery-wrap">
                <img src="assets/img/restaurant/event-8.webp" class="img-fluid" alt="Celebration Event" loading="lazy">
                <div class="gallery-info">
                  <h4>Anniversary Celebration</h4>
                  <p>Custom events tailored to your special moments</p>
                  <div class="gallery-links">
                    <a href="assets/img/restaurant/event-8.webp" class="glightbox" title="Anniversary Celebration"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-staff">
              <div class="gallery-wrap">
                <img src="assets/img/restaurant/chef-3.webp" class="img-fluid" alt="Service Staff" loading="lazy">
                <div class="gallery-info">
                  <h4>Our Culinary Team</h4>
                  <p>Passionate culinary artists at work</p>
                  <div class="gallery-links">
                    <a href="assets/img/restaurant/chef-3.webp" class="glightbox" title="Our Culinary Team"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- End Gallery Item -->
          </div><!-- End Gallery Container -->
        </div><!-- End Isotope Layout -->

      </div>

    </section><!-- /Gallery Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>N’hésitez pas à nous joindre pour toute question concernant nos services, nos menus, les réservations ou l’organisation d’événements. Notre équipe se fera un plaisir de vous répondre dans les plus brefs délais.</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <div class="contact-info">
              <div class="contact-card">
                <h3>Contact</h3>
                <p>N’hésitez pas à nous joindre pour toute question concernant nos services, nos menus, les réservations ou l’organisation d’événements. Notre équipe se fera un plaisir de vous répondre dans les plus brefs délais.</p>

                <div class="contact-details">
                  <div class="contact-item">
                    <i class="bi bi-envelope"></i>
                    <div>
                      <h4>Email:</h4>
                      <p>gracerukendo2@gmail.com</p>
                    </div>
                  </div>

                  <div class="contact-item">
                    <i class="bi bi-telephone"></i>
                    <div>
                      <h4>Phone:</h4>
                      <p>+243 861 614 471</p>
                    </div>
                  </div>

                  <div class="contact-item">
                    <i class="bi bi-geo-alt"></i>
                    <div>
                      <h4>Address:</h4>
                      <p>RD CONGO, Nord-Kivu</p>
                      <p>Ville de Butembo, Rue Matadi</p>
                    </div>
                  </div>
                </div>

                <div class="social-links">
                  <a href="#"><i class="bi bi-twitter"></i></a>
                  <a href="https://www.facebook.com/profile.php?id=100083551737804"><i class="bi bi-facebook"></i></a>
                  <a href="https://www.instagram.com/grukendo?igsh=MTUyc2t6ajZ3bDNkdA=="><i class="bi bi-instagram"></i></a>
                  <a href="https://www.linkedin.com/in/grace-rukendo-aa10a4397"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="contact-form-wrapper">
              <form action="forms/contact.php" method="post" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Grace Rukendo" required="">
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="gracerukendo2@gmail.com" required="">
                  </div>
                </div>
                <div class="form-group mt-3">
                  <label for="subject">Sujet</label>
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="j'adore ce café resto!" required="">
                </div>
                <div class="form-group mt-3">
                  <label for="message">Message</label>
                  <textarea class="form-control" name="message" rows="4" placeholder="Votre message ici..." required=""></textarea>
                </div>

                <div class="my-3">
                  <div class="loading">Traitement</div>
                  <div class="error-message"></div>
                  <div class="sent-message">votre message a été envoyer. merci!</div>
                </div>

                <div class="text-center">
                  <button type="submit">Envoyer Message</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Contact Section -->

  </main>
  <?php include"parties/footer.php" ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Main JS File -->
      
  <script src="assets/js/main.js"></script>

</body>

</html>